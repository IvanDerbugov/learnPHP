<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Средний балл</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #1a1a2e;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 50%, #e0e7ff 100%);
            padding: 2rem 1rem;
        }

        .page {
            max-width: 420px;
            margin: 0 auto;
        }

        h1 {
            margin: 0 0 1.25rem;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .result {
            margin: 0 0 1.25rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            background: #fff;
            border: 1px solid #c7d2fe;
            font-weight: 500;
        }

        .result--empty {
            color: #64748b;
            border-color: #e2e8f0;
        }

        #form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1.5rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(99, 102, 241, 0.12);
        }

        #wrapper-inputs {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .input-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .input-row label {
            flex-shrink: 0;
            width: 4.5rem;
            font-size: 0.9rem;
            color: #475569;
        }

        .input-row input {
            flex: 1;
            padding: 0.5rem 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-row input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        button {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-family: inherit;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        }

        button:hover {
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        #addInput {
            background: #f1f5f9;
            color: #334155;
        }

        #addInput:hover {
            background: #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        button[type="submit"] {
            background: #6366f1;
            color: #fff;
        }

        button[type="submit"]:hover {
            background: #4f46e5;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
        }
    </style>
</head>

<body>
    <div class="page">
        <h1>Средний балл</h1>

        <?php
        require_once __DIR__ . '/../error-config.php'; //вывод ошибок и логирование
        function getAverageScore($scores)
        {
            $sum = 0; //область видимости - функция, не как в JS - фигурные скобки
            foreach ($scores as $estimation) {
                $sum += $estimation;
            }
            if (count($scores) === 0) {
                echo '<p class="result result--empty">нет оценок</p>';
                return;
            }
            $result = $sum / count($scores); //при делении на 0 ошибку выбивает
            echo "<p class=\"result\">средний балл: $result</p>";
        }
        if (isset($_GET['estimation'])) {
            $estimations = array_filter($_GET['estimation'], fn($v) => $v !== ''); //фильтр допускающий нуль и не допускающий ''
            getAverageScore($estimations);
        }
        ?>

        <form method="GET" id="form">
            <div id="wrapper-inputs">
                <div class="input-row">
                    <label>Оценка</label>
                    <input type="number" name="estimation[]">
                </div>
            </div>
            <div class="buttons">
                <button type="button" id="addInput">
                    добавить поле для оценки
                </button>
                <button type="submit">
                    посчитать средний балл
                </button>
            </div>
        </form>
    </div>

    <script>
        const btnAddInput = document.getElementById('addInput')
        const div = document.getElementById('wrapper-inputs')
        const newInput = '<div class="input-row"><label>Оценка</label><input type="number" name="estimation[]"></div>'

        btnAddInput.addEventListener('click', (e) => {
            e.preventDefault()
            div.insertAdjacentHTML('beforeend', newInput)
        })
    </script>
</body>

</html>
