<?
require_once __DIR__ . '/../error-config.php';
    echo '$_FILES: '  . "<br/>";
    var_dump($_FILES); //сюда прилетают все данные с форм enctype =multipart/form-data
    echo "<br/>" . '$_POST: '  . "<br/>";
    var_dump($_POST); // но тут будет пустто, тк сервер направил бинарный файл в суперглобальный массив $_FILES сразу из-за html атрибута
?>
