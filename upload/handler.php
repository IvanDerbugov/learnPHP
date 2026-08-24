<?
require_once __DIR__ . '/../error-config.php';
echo '$_FILES: ' . "<br/>";
var_dump($_FILES); //сюда прилетают все данные с форм enctype =multipart/form-data
echo "<br/>" . '$_POST: ' . "<br/>";
var_dump($_POST); // но тут будет пустто, тк сервер направил бинарный файл в суперглобальный массив $_FILES сразу из-за html атрибута

if ($_FILES && $_FILES['filename']['error'] == UPLOAD_ERR_OK) { // или можно было $_FILES['filename']['error'] == 0 (UPLOAD_ERR_OK == 0)
    $name = $_FILES['filename']['name'];
    echo "<br/>"  . "<br/>" . '============='  . "<br/>";
    move_uploaded_file($_FILES['filename']['tmp_name'], __DIR__ . '/files/' . $name);
}
?>