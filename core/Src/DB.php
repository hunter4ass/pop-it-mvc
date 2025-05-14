<?php

namespace Src;

use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{
    public static function connect(array $settings): void
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $settings['host'],
            'database'  => $settings['database'],
            'username'  => $settings['username'],
            'password'  => $settings['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
