<?
$userName = 'user name don\'t definet';
$userName = 'user age don\'t definet';

if (isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    //method added user name in database
    echo 'User ' . $userName . ' added in database' . "<br/>";

    if (isset($_POST['userAge'])) {
        //method added Age user in database
        echo 'Age from user ' . $userName . 'added in database';
    } else {
        echo $userAge . "<br/>";
    } 
} else {
    echo $userName . "<br/>";
    echo $userAge . "<br/>";
}
