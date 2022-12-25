<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Registry;

class DataMapper
{
    private Registry $registry;
    public function __construct()
    {
        $this->registry = Registry::instance();
    }
    protected function select(string $query, array $options = []): array|bool
    {
        $sqlConfig = $this->registry->getConfig()['sql'];
        $pdo = new \PDO($sqlConfig['dsn'], $sqlConfig['username'], $sqlConfig['password']);
        $pdoStmt = $pdo->prepare($query);
        $pdoStmt->execute($options);
        return $pdoStmt->fetchAll();
    }
    protected function edit(string $query, array $options): void
    {
        $sqlConfig = $this->registry->getConfig()['sql'];
        $pdo = new \PDO($sqlConfig['dsn'], $sqlConfig['username'], $sqlConfig['password']);
        $pdoStmt = $pdo->prepare($query);
        $pdoStmt->execute($options);
    }
}