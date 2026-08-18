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
} else {
    echo 'users not found';
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin-top: 20px;
        }
        form, form>div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
    </style>
</head>

<body>
    <form action="">
        <div id="container-inputs">
            <input type="text" name="users[]">
        </div>
        <button id="add" type="button">add input</button>
        <button type="submit">submit</button>
    </form>
    <a href="/learn-php/GET/users.php">to main</a>

    <script>
        const add = document.getElementById('add')
        const containerInputs = document.getElementById('container-inputs')

        add.addEventListener('click', (e) => {
            e.preventDefault()
            const newInput = document.createElement('input')
            newInput.type = 'text'
            newInput.name = 'users[]'
            containerInputs.append(newInput)
        })
    </script>
</body>

</html>