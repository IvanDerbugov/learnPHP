<?
abstract class Messenger{
    function __construct(protected $name) {}
    abstract function sendMessage($message, $recipient);
    function closeProgram () {
        echo 'Выход из программы...';
        echo <<<JS
            <script>
            setTimeout(() => {
                alert('Программа закрыта');
            }, 1500);
            </script>
        JS;
    }
}

class Vanyafon extends Messenger {
    function sendMessage($message, $recipient) {
        echo "сообщение {$message} отправлено {$recipient}";
    }
}



$userId_1 = new Vanyafon('Ivan');
if(isset($_GET['exit'])) {
    $userId_1->closeProgram();
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanyafon</title>
</head>
<body>
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div style="font-size: 2em; color: blue;">Vanyafon</div>
        <div id="exit" style="cursor: pointer">Выйти</div>
    </div>

    <script>
        const exit = document.getElementById('exit');
        exit.addEventListener('click', () => window.location.href='?exit=1');
    </script>
   
</body>
</html>