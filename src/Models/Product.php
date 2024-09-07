<?php
namespace Src\Models;

class Product extends BaseModel
{
    protected $table = 'products';

    public function getAllProducts()
    {
        $query = $this->connection->createQueryBuilder();

        $data = $query->select('pr.id', 'pr.name', 'pr.image', 'pr.price', 'pr.description', 'pr.catalogue_id', 'cata.name as catalogue_name')
            ->from($this->table, 'pr')
            ->join('pr', 'catalogues', 'cata', 'cata.id = pr.catalogue_id')
            ->fetchAllAssociative();

        return $data;
    }

    public function getOneProduct($id)
    {
        $query = $this->connection->createQueryBuilder();

        $data = $query->select('pr.id', 'pr.name', 'pr.image', 'pr.price', 'pr.description', 'pr.catalogue_id', 'cata.name as catalogue_name')
            ->from($this->table, 'pr')
            ->join('pr', 'catalogues', 'cata', 'cata.id = pr.catalogue_id')
            ->where('pr.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();

        return $data;
    }
    
    public function getProductsByName($name)
    {
        $query = $this->connection->createQueryBuilder();

        $data = $query->select('pr.id', 'pr.name', 'pr.image', 'pr.price', 'pr.description', 'cata.name as catalogue_name')
            ->from($this->table, 'pr')
            ->join('pr', 'catalogues', 'cata', 'cata.id = pr.catalogue_id')
            ->where('pr.name like :name')
            ->setParameter('name', '%' . $name . '%')
            ->fetchAllAssociative();

        return $data;
    }

    public function getProductsByCatalogue($catalogue_id)
    {
        $query = $this->connection->createQueryBuilder();

        $data = $query->select('pr.id', 'pr.name', 'pr.image', 'pr.price', 'pr.description', 'cata.name as catalogue_name')
            ->from($this->table, 'pr')
            ->join('pr', 'catalogues', 'cata', 'cata.id = pr.catalogue_id')
            ->where('cata.id = :catalogue_id')
            ->setParameter('catalogue_id', $catalogue_id)
            ->fetchAllAssociative();

        return $data;
    }
}
