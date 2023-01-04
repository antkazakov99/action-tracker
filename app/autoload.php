<?php

/**
 * @param string $class
 * @return void
 * @throws JsonException
 */
function autoload(string $class) {
    $autoloadConfigPath = __DIR__ . '/autoload.json';
    if (file_exists($autoloadConfigPath)) {
        $autoloadClassesJson = file_get_contents($autoloadConfigPath);
        $autoloadClasses = json_decode($autoloadClassesJson, true, 512, JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE);
        if (array_key_exists($class, $autoloadClasses)) {
            include __DIR__ . "/lib/" . $autoloadClasses[$class];
        }
    }
}

spl_autoload_register('autoload');