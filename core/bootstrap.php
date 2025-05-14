<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Src\DB;
use Src\Application;
use Src\Settings;

// Загрузка конфигов
const DIR_CONFIG = '/../config';

function getConfigs(string $path = DIR_CONFIG): array {
    $settings = [];
    foreach (scandir(__DIR__ . $path) as $file) {
        $name = explode('.', $file)[0];
        if (!empty($name)) {
            $settings[$name] = include __DIR__ . "$path/$file";
        }
    }
    return $settings;
}

$config = getConfigs(); // теперь у нас есть $config['db'], $config['path'] и т.д.

// Подключение к БД
DB::connect($config['db'] ?? []);

// Регистрация маршрутов
require_once __DIR__ . '/../routes/web.php';

// Возврат объекта приложения
return new Application(new Settings($config));
