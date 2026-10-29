<header class="container flex">
    <img src="img/coin-cash.svg" alt="монета">
    <nav>
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">О проекте</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </nav>
    <div>
        <? if (isset($_SESSION['id'])) { ?>
            <div class="flex wrap-logged-in">
                <svg class="user-btn" id="user-btn" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                    viewBox="0 0 16 16" fill="none">
                    <path
                        d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"
                        fill="#000000" />
                    <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#000000" />
                </svg>

                <div class="wrap-logged-in__user-modal">
                    <button type="button" class="user-modal-close">X</button>
                    <p>Привет, <?= $_SESSION['owner'] ?></p>
                    <p>Баланс: <?= $money?>$</p>
                    <a href="service/logout.php" id="sign-out" class="sign-out">Выйти</a>
                </div>
            </div>
        <? } else { ?>
            <div id="buttons-sign" class="flex buttons-sign">
                <button type="button" id="login-btn">Войти</button>
                <button id="registration-btn">Регистрация</button>
            </div>
        <? } ?>
    </div>
</header>