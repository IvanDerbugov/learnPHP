<?php
/**
 * Одноразовая диагностика кэша: откройте в браузере и несколько раз обновите страницу.
 * Если время и unix-метка каждый раз меняются — ответ действительно идёт с PHP,
 * проблема с bit-mask скорее в OPcache именно этого файла или в том что на сервер попала старая версия файла.
 */
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
header('Content-Type: text/plain; charset=UTF-8');
echo gmdate('Y-m-d H:i:s') . " UTC\n";
echo 'uniq ' . uniqid('', true) . "\n";
