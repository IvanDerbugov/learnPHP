<?
require_once __DIR__ . '/../error-config.php';
$userName = 'user name don\'t definet';
$userAge = 'user age don\'t definet';

if (isset($_POST['userName']) && $_POST['userName'] != '') {//в POST строки всегда
    $userName = $_POST['userName'];
    //method added user name in database
    echo 'User ' . '\'' . $userName . '\'' . ' added in database' . "<br/>";

    if (isset($_POST['userAge']) && $_POST['userAge'] !== '') {
        //method added Age user in database
        echo 'Age from user ' . '\'' . $userName . '\'' . ' added in database';
    } else {
        echo $userAge . "<br/>";
    } 
} else {
    echo $userName . "<br/>";
    echo $userAge . "<br/>";
};
echo "<br/>" . '======' . "<br/>";
var_dump($_POST); //строки
