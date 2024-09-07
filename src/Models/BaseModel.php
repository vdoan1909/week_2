<?php

namespace Src\Models;

use Doctrine\DBAL\DriverManager;

class BaseModel
{
    protected $connection;
    protected $table;

    public function __construct()
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'host' => $_ENV['DB_HOST'],
            'driver' => 'pdo_mysql',
            'charset' => $_ENV['DB_CHARSET'],
        ];

        $this->connection = DriverManager::getConnection($connectionParams);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function all()
    {
        $query = $this->connection->createQueryBuilder();
        $data = $query
            ->select('*')
            ->from($this->table)
            ->fetchAllAssociative();
        return $data;
    }

    public function find($id)
    {
        $query = $this->connection->createQueryBuilder();
        $data = $query
            ->select('*')
            ->from($this->table)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
        return $data;
    }

    public function insert(array $data)
    {
        if (empty($data)) {
            return false;
        }

        $query = $this->connection->createQueryBuilder()->insert($this->table);

        $placeholders = [];
        $i = 0;

        foreach ($data as $key => $value) {
            $placeholders[$key] = '?';
            $query->setParameter($i++, $value);
        }

        $query->values($placeholders);
        $query->executeQuery();

        return true;
    }

    public function update($id, array $data)
    {
        if (empty($data)) {
            return false;
        }

        $query = $this->connection->createQueryBuilder()->update($this->table);

        $placeholders = [];
        $i = 0;

        foreach ($data as $key => $value) {
            $placeholders[$key] = '?';
            $query->setParameter($i++, $value);
        }

        foreach ($placeholders as $key => $value) {
            $query->set($key, $value);
        }

        $query->where('id = ?')->setParameter($i, $id);

        $query->executeQuery();

        return true;
    }

    public function delete($id)
    {
        $query = $this->connection->createQueryBuilder()->delete($this->table);

        $query->where('id = ?')
            ->setParameter(0, $id);

        return $query->executeQuery();
    }
}
