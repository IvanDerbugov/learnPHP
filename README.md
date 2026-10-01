# learnPHP

Учебный репозиторий: процедурный PHP, массивы, функции, HTML-формы, циклы, ООП, основы JS (`fetch` / AJAX).

**Демо:** [https://derbugov.ru/learn-php/](https://derbugov.ru/learn-php/)

## Что уже есть (примеры на сервере)

| Тема | Файл | Ссылка |
|------|------|--------|
| Форма, POST, `display.php` | `index.php` | [/learn-php/index.php](https://derbugov.ru/learn-php/index.php) |
| Цикл, query/prompt | `cycles.php` | [/learn-php/cycles.php](https://derbugov.ru/learn-php/cycles.php) |
| `$_POST`, цикл, **fetch без перезагрузки** | `formСycles/cycles2.html` | [/learn-php/formСycles/cycles2.html](https://derbugov.ru/learn-php/formСycles/cycles2.html) |
| Обработчик для формы / AJAX | `formСycles/handlerForCycles.php` | вызывается из `cycles2.html` |
| Типы, операции, match | `type-data.php`, `operations.php`, `match.php` | [type-data](https://derbugov.ru/learn-php/type-data.php), [operations](https://derbugov.ru/learn-php/operations.php), [match](https://derbugov.ru/learn-php/match.php) |
| PHP в разметке | `php-with-html.php` | [/learn-php/php-with-html.php](https://derbugov.ru/learn-php/php-with-html.php) |
| Биты | `bit-mask.php`, `bit-secret.php` | [bit-mask](https://derbugov.ru/learn-php/bit-mask.php) |

## Локально

Клонируй репозиторий и открой через PHP built-in server или свой хост (как на derbugov).

Точка входа в браузере: `index.html` — оглавление со ссылками.

## Ещё примеры

Ссылки ведут на тот же префикс, что и таблица выше: `https://derbugov.ru/learn-php/…`.

### Переменные, типы, константы, циклы

| Тема | Файл |
|------|------|
| `isset`, `??` | `variables/isset1.php` |
| `gettype` | `types/get-type.php` |
| `const`, `define`, магические константы | `consts/const.php`, `consts/check-const.php` |
| `while` / `endwhile` | `cycle-while.php` |
| `print_r`, `var_export` | `var_export.php` |
| `__DIR__` | `dir.php` |

### Массивы

| Тема | Файл |
|------|------|
| Индексные массивы | `arrays/arr.php`, `arrays/arr2.php` |
| `is_array`, `count` / `sizeof`, сортировка | `arrays/is_array.php`, `arrays/sizeof-count.php`, `arrays/sort.php` |
| Группировка, ссылки, цена телефона | `arrays/group-variables.php`, `arrays/arr-link.php`, `arrays/get-price-phone.php` |
| Статьи | `arrays/articles.php` |
| Вложенный массив | `multi-arr1.php` |
| Ассоциативные: обход `for` / `foreach` | `associative-arrays/associative-arr.php`, `associative-arrays/for-arr.php`, `associative-arrays/foreach.php` |
| Вывод таблицы и списка телефонов | `associative-arrays/render-table-arr.php`, `associative-arrays/render-phones-only-php.php` |

Папка `associative arrays` (с пробелом) повторяет файлы из `arrays/`.

### Функции

| Тема | Файл |
|------|------|
| `static` внутри функции | `functions/area-ariable.php` |
| Средний балл | `functions/averageScore.php` |
| Замыкание (`use`) | `functions/closure.php` |
| Стрелочная функция | `functions/arrows.php` |
| Генератор (`yield`) | `functions/generator.php` |

### GET, POST, загрузка файла

| Тема | Файл |
|------|------|
| Параметры в URL | `GET/check-dada-url.php`, `GET/users.php` |
| Форма, чекбоксы, radio | `POST/form.html`, `POST/checkbox.php`, `POST/radio-btns.php`, `POST/user.php` |
| Загрузка файла на сервер | `upload/files-to-server.html` → `upload/handler.php` |

### ООП

| Тема | Файл |
|------|------|
| Класс, свойства, несколько объектов | `OOP/houses.php` |
| Конструктор, константы класса | `OOP/books.php` |
| Свойства в конструкторе, метод | `OOP/person.php` |
| Константы, heredoc, пол | `OOP/retirenment.php` |
| `public` / `protected`, `static`, наследование | `OOP/modifier.php` |
| Анонимный класс | `OOP/anonymous-class.php` |

В `OOP/modifier.php`: счёт `Account`, перевод между счетами, наследник `SavingsAccount` с процентом. `protected $sum` виден в классе и в наследнике, снаружи — нет. `self::$bankName` — обращение к статическому свойству класса.

### Прочее

| Тема | Файл |
|------|------|
| WebSocket (черновик) | `webSocket.html`, `webSocket2.html` |
| Слова | `words/words.html` |
| Проверка, что ответ идёт с PHP, а не из кэша | `cache-check.php` |
