<?php

namespace App\Entity;

use \App\DB\Connect;

use \PDO;

 
class Associado {
  public $id;
  public $nome;
  public $crm;
  public $telefone;
  public $especialidade;

  public function cadastrar() {
    $DB = new Connect('Associados');
    $this->id = $DB->insert([
      'nome' => $this->nome,
      'crm' => $this->crm,
      'telefone' => $this->telefone,
      'especialidade' => $this->especialidade,
    ]);
    return true;
  }

  public function editar() {
    return (new Connect('Associados'))->update("id = $this->id",[
      'nome' => $this->nome,
      'crm' => $this->crm,
      'telefone' => $this->telefone,
      'especialidade' => $this->especialidade,
    ]);
  }

  public function excluir() {
    return (new Connect('Associados'))->delete("id = $this->id");
  }

  public static function getAssociados($where = null, $order = null, $limit = null) {
    return (new Connect('Associados'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getAssociado($id) {
    return (new Connect('Associados'))->select("id = $id")
      ->fetchObject(self::class);
  }

  
}


// class Associados extends Connect
// {

//   public function getAssoc() {
//     $BDFetch = $this->connectDB()->prepare("SELECT * FROM anestesia_carioca_db.Associados");
//     $BDFetch->execute();
//     $
//   }
//   {
//     // code...
//   }
// }
