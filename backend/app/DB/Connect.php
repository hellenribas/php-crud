<?php

namespace App\DB;

use \PDO;
use \PDOException;

class Connect
{
  const HOSTNAME = 'db';
  const DB = 'anestesia_carioca_db';
  const USER = 'anestesia_carioca';
  const PASSWORD = 'anestesia';
  const PORT = '3306';
  private $table;
  private $connection;


  public function __construct($table = null) {
    $this->table = $table;
    $this->connectDB();
  }

  protected function connectDB()
  {
    try {
      $this->connection = new PDO('mysql:host='.self::HOSTNAME.'port='.self::PORT.';dbname='.self::DB, self::USER, self::PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $Erro) {
      die('ERROR: '.$Erro->getMessage());
    }
  }

  public function execute($query, $values = []) {
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($values);
      return $statement; 
    } catch (PDOException $Erro) {
      die('ERROR: '.$Erro->getMessage());
    }
  }

  public function insert($array) {
    $fields = array_keys($array);
    $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES(?, ?, ?, ?)';
    $this->execute($query, array_values(($array)));
    return $this->connection->lastInsertId();
  }

  public function select($where = null, $order = null, $limit = null, $fields = '*') {
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    return $this->execute($query);

  }

  public function update($where, $array) {
    $fields = array_keys($array);

    $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;
    $this->execute($query, array_values(($array)));
    return true;
  }

  public function delete($where) {
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
    $this->execute($query);
    return true;
  }
}
