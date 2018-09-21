<?php 

spl_autoload_register(
function ($class) {
    @include_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
}, true);