<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

require_once 'db.php';

session_start();

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
        $nameTypeAcc = 'сберегающий';
    } else if ($typeAcc === 'usual') {
        $isUsualType = 1;
        $nameTypeAcc = 'обычный';
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
            'owner' => $owner,
            'email' => $email,
            'password' => $passwordHash,
            'money' => welcomeBonus, //приветственныый бонус
            'isUsualType' => $isUsualType,
        ]);
        $_SESSION['id'] = $pdo->lastInsertId();
        $_SESSION['owner'] = $owner;
        echo json_encode([
            'ok' => true,
            'owner' => $owner,
            'email' => $email,
            'type' => $typeAcc,
            'id' => $id = $pdo->lastInsertId(),
            'message' =>   "Добро пожаловать, $owner, в I-COIN. Желаем успешных торгов, роста капитала просто удачи. <br>
                            Начислили вам приветсвенный бонус 10$, теперь у вас 10$. Тип аккаунта: $nameTypeAcc, ваш id: $id.",
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