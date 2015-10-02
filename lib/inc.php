<?php

require_once(__DIR__.'/db.class.php');

//http://php.net/manual/en/function.spl-autoload-register.php
spl_autoload_register(function ($class) {
    require_once(__DIR__.'/' . $class . '.class.php');
});
