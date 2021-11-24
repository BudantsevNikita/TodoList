<?php

namespace Core;

use PDO;
use Core\Connection;

class Model
{
  private $db;

  public function __construct()
  {
    $this->db = Connection::connect();
  }

  protected function findOne($query, array $param = [])
  {
    $statement = $this->db->prepare($query);
    $statement->execute($param);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  protected function findAll($query, array $param = [])
  {
    print_r($query);
    $statement = $this->db->prepare($query);
    $statement->execute($param);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  protected function add($query, array $param = [])
  {
    $statement = $this->db->prepare($query);
    $statement->execute($param);
  }
}