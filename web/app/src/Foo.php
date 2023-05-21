<?php

/**
 * I belong to a file
 */

namespace App\Acme;

use App\Acme\Services\TestHelper;

/**
 * I belong to a class
 */
class Foo
{
    private TestHelper $testHelper;

    public function __construct()
    {
        $this->testHelper = new TestHelper();
    }

    /**
     * Gets the name of the application.
     */
    public function getName(): string
    {
        return $this->testHelper->testAction();
    }

    public function getTestData(): string
    {
        try {
            $dsn = 'mysql:host=mysql;dbname=test;charset=utf8;port=3306';
            $pdo = new \PDO($dsn, 'root', 'root');
            $data = json_encode($pdo->query('SELECT * FROM test_table')->fetchAll(), JSON_PRETTY_PRINT);
        } catch (\PDOException $e) {
            $data = $e->getMessage();
        }

        return $data;
    }
}
