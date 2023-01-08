<?php

namespace Ant\Tracker\DataMappers;

use Ant\Tracker\Registry;

class DataMapper
{
    /**
     * @var Registry
     */
    protected Registry $registry;

    /**
     *
     */
    public function __construct()
    {
        $this->registry = Registry::instance();
    }

    /**
     * @param string $query
     * @param array $options
     * @return array
     */
    protected function select(string $query, array $options = []): array
    {
        $sqlConfig = $this->registry->getConfig()['sql'];
        $pdo = new \PDO($sqlConfig['dsn'], $sqlConfig['username'], $sqlConfig['password']);
        $pdoStmt = $pdo->prepare($query);
        $pdoStmt->execute($options);
        return $pdoStmt->fetchAll();
    }

    /**
     * @param string $query
     * @param array $options
     * @return void
     */
    protected function edit(string $query, array $options): void
    {
        $sqlConfig = $this->registry->getConfig()['sql'];
        $pdo = new \PDO($sqlConfig['dsn'], $sqlConfig['username'], $sqlConfig['password']);
        $pdoStmt = $pdo->prepare($query);
        $pdoStmt->execute($options);
    }
}