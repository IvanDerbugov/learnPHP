<?php
require_once __DIR__ . '/../error-config.php';

function calculateAverageScore(array $scores): ?array
{
    if (count($scores) === 0) {
        return null;
    }
    $sum = 0;
    foreach ($scores as $estimation) {
        $sum += $estimation;
    }
    return [
        'scores' => array_values($scores),
        'average' => $sum / count($scores),
    ];
}

$currentResult = null;
if (isset($_GET['estimation'])) {
    $estimations = array_filter($_GET['estimation'], fn($v) => $v !== '');
    $currentResult = calculateAverageScore($estimations);
}
?>
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

        .history-section {
            margin-top: 1.5rem;
        }

        .history-section h2 {
            margin: 0 0 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .history-item {
            padding: 0.75rem 1rem;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .history-item__average {
            font-weight: 600;
            color: #4f46e5;
        }

        .history-item__meta {
            margin-top: 0.25rem;
            font-size: 0.8rem;
            color: #64748b;
        }

        #clearHistory {
            margin-top: 0.75rem;
            background: #fff;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        #clearHistory:hover {
            background: #fef2f2;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.12);
        }
    </style>
</head>

<body>
    <div class="page">
        <h1>Средний балл</h1>

        <?php
        if ($currentResult === null && isset($_GET['estimation'])) {
            echo '<p class="result result--empty">нет оценок</p>';
        } elseif ($currentResult !== null) {
            echo '<p class="result">средний балл: ' . $currentResult['average'] . '</p>';
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

        <section class="history-section" id="historySection" hidden>
            <h2>Предыдущие результаты</h2>
            <div class="history-list" id="historyList"></div>
            <button type="button" id="clearHistory" hidden>
                очистить предыдущие результаты
            </button>
        </section>
    </div>

    <script>
        const STORAGE_KEY = 'learn-php/averageScoreHistory'

        const btnAddInput = document.getElementById('addInput')
        const div = document.getElementById('wrapper-inputs')
        const historySection = document.getElementById('historySection')
        const historyList = document.getElementById('historyList')
        const clearHistoryBtn = document.getElementById('clearHistory')
        const newInput = '<div class="input-row"><label>Оценка</label><input type="number" name="estimation[]"></div>'

        btnAddInput.addEventListener('click', (e) => {
            e.preventDefault()
            div.insertAdjacentHTML('beforeend', newInput)
        })

        function loadHistory() {
            try {
                const raw = localStorage.getItem(STORAGE_KEY)
                return raw ? JSON.parse(raw) : []
            } catch {
                return []
            }
        }

        function saveHistory(items) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items))
        }

        function formatDate(iso) {
            return new Date(iso).toLocaleString('ru-RU', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
            })
        }

        function isSameEntry(a, b) {
            return a.average === b.average && JSON.stringify(a.scores) === JSON.stringify(b.scores)
        }

        function renderHistory() {
            const history = loadHistory()

            if (history.length === 0) {
                historySection.hidden = true
                clearHistoryBtn.hidden = true
                historyList.innerHTML = ''
                return
            }

            historySection.hidden = false
            clearHistoryBtn.hidden = false
            historyList.innerHTML = history.map((item) => `
                <div class="history-item">
                    <div class="history-item__average">средний балл: ${item.average}</div>
                    <div>оценки: ${item.scores.join(', ')}</div>
                    <div class="history-item__meta">${formatDate(item.date)}</div>
                </div>
            `).join('')
        }

        function appendCurrentResult() {
            const newResult = <?php echo $currentResult !== null
                ? json_encode($currentResult, JSON_UNESCAPED_UNICODE)
                : 'null'; ?>;

            if (!newResult) {
                return
            }

            const history = loadHistory()
            const entry = { ...newResult, date: new Date().toISOString() }

            if (history.length > 0 && isSameEntry(history[0], entry)) {
                return
            }

            history.unshift(entry)
            saveHistory(history)
        }

        appendCurrentResult()
        renderHistory()

        clearHistoryBtn.addEventListener('click', () => {
            localStorage.removeItem(STORAGE_KEY)
            renderHistory()
        })
    </script>
</body>

</html>