<?php

require_once __DIR__.'/vendor/autoload.php';
require './app/Entity/Associados.php';

define('BUTTON', 'Associar');
define('TITLE', 'Cadastrar');


use \App\Entity\Associado;

if (isset($_POST['name'], $_POST['crm'], $_POST['phone'], $_POST['specialty'])) {
  $associado = new Associado;
  $associado->nome = $_POST['name'];
  $associado->crm = $_POST['crm'];
  $associado->telefone = $_POST['phone'];
  $associado->especialidade = $_POST['specialty'];
  $associado->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__. '/includes/header.php';
include __DIR__. '/includes/forms.php';
include __DIR__. '/includes/footer.php';