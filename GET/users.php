<?
require_once __DIR__ . '/../error-config.php';
$users = [];
if (isset($_GET['users'])) {
    $users = $_GET['users'];

    echo 'users: ';
    var_dump($users);
    echo "<br/>" . '------' . "<br/>";
    echo 'the array $users has ' . count($users);
    if (count($users) === 1) {
        echo ' element:';
    } else {
        echo ' elements:';
    }
    echo "<br/>";

    // foreach ($users as $user) {
    //     echo $user . "<br/>";
    // };
    for ($i = 0; $i < count($users); $i++) {
        echo ($i + 1) . ') ' . $users[$i] . "<br/>";
    }
};