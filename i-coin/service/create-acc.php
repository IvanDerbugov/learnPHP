<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

require_once 'db.php';

const welcomeBonus = 10;

if (
    isset($_POST['owner'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['type'])
    && $_POST['owner'] !== ''
    && $_POST['email'] !== ''
    && $_POST['password'] !== ''
    && $_POST['type'] !== ''
) {
    $owner = trim($_POST['owner']);
    $email = trim($_POST['email']);
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $typeAcc = $_POST['type'];

    if ($typeAcc === 'savings') {
        $isUsualType = 0;
    } else if ($typeAcc === 'usual') {
        $isUsualType = 1;
    } else {
        echo json_encode([
            'ok' => false,
            'message' => 'неизвестный тип аккаунта'
        ]);
    }

    try {
        $sql = 'INSERT INTO accounts (owner, email, password, money, isUsualType)
            VALUES (:owner, :email, :password, :money, :isUsualType)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            //TODO разобраться с багом почему при создании акка неуспешно, ID под него всё равно резервируется и в последствии пропускается номер ID для следующего
            'owner' => $owner,
            'email' => $email,
            'password' => $passwordHash,
            'money' => welcomeBonus, //приветственныый бонус
            'isUsualType' => $isUsualType,
        ]);
        echo json_encode([
            'ok' => true,
            'owner' => $owner,
            'email' => $email,
            'type' => $typeAcc,
            //TODO сделать функцию с более информативным приветствием
            'message' => 'создался',
        ], JSON_UNESCAPED_UNICODE);
    } catch (PDOException $error) {
        //не уникальное значение почты
        if ($error->errorInfo[1] === 1062) {
            $message = 'Такая почта уже зарегана';
        } else {
            $message = 'Не удалось создать счёт';
        }
        echo json_encode([
            'ok' => false,
            'message' => $message
            //опасно светить данные базы
            // . $error->getMessage()
        ]);
    }
}