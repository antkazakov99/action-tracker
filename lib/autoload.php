<?php

function autoload($class) {
    $autoloadConfigPath = __DIR__ . '/autoload.json';
    if (file_exists($autoloadConfigPath)) {
        $autoloadClassesJson = file_get_contents($autoloadConfigPath);
        $autoloadClasses = json_decode($autoloadClassesJson, true, 512, JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE);
        if (array_key_exists($class, $autoloadClasses)) {
            include __DIR__ . "/" . $autoloadClasses[$class];
        }
    }
}

function autoloadXml($class) {
    $autoloadConfigPath = __DIR__ . '/autoload.xml';
    $xmlElement = simplexml_load_file($autoloadConfigPath);
    $filePath = '';
    $namespaces = explode('\\', $class);
    var_dump($namespaces);
    foreach ($namespaces as $namespace) {
        var_dump($xmlElement->children(), $namespace);
        if($xmlElement->children($namespace)) {
            $xmlElement = $xmlElement->children($namespace);
            $path = $xmlElement->attributes('directory');
            //var_dump($path);
            $filePath .= '/' . $path;
        } else {
            break;
        }
    }
    $filePath .= '/' . end($namespaces) . '.php';
    var_dump($filePath);
    // include_once __DIR__ . $filePath;
}

spl_autoload_register('autoload');