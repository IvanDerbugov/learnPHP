<?
require_once __DIR__ . '/../error-config.php';
echo '$_FILES: ' . "<br/>";
var_dump($_FILES); //сюда прилетают все данные с форм enctype =multipart/form-data
echo "<br/>" . '$_POST: ' . "<br/>";
var_dump($_POST); // но тут будет пустто, тк сервер направил бинарный файл в суперглобальный массив $_FILES сразу из-за html атрибута

if ($_FILES) {
    switch ($_FILES['filename']['error']) { // код ошибки: 0 = UPLOAD_ERR_OK, дальше константы ниже
        case UPLOAD_ERR_OK:
            $name = $_FILES['filename']['name'];
            echo "<br/>" . "<br/>" . '=============' . "<br/>";

            $path = __DIR__ . '/files/'; //путь для сохранения
            function saveFile()
            {
                global $path, $name;
                move_uploaded_file($_FILES['filename']['tmp_name'], $path . $name);
            }
            if (is_dir($path)) {
                saveFile();
            } else {
                mkdir($path, 0755, true);
                saveFile();
            }
            echo "<br/>" . 'Файл успешно загружен';
            phpinfo();
            break;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<br/>" . 'Файл слишком большой';
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "<br/>" . 'Файл загружен частично';
            break;
        case UPLOAD_ERR_NO_FILE:
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "<br/>" . 'Файл не загружен';
            break;
    }
}
?>