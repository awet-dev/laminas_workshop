<?php

namespace Questioner;

use Laminas\Db\Adapter\Adapter;

return new Adapter([
    'driver'   => 'Mysqli',
    'database' => 'change_to_your_dbName',
    'username' => 'user_name',
    'password' => 'user_password',
]);