<?php

require_once __DIR__.'/vendor/autoload.php';
require './app/Entity/Associados.php';

define('TITLE', 'Editar');
define('BUTTON', 'Salvar');


use \App\Entity\Associado;

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

$associado =  Associado::getAssociado($_GET['id']);

if(!$associado instanceof Associado) {
  header('location: index.php?status=error');
  exit;
}

if (isset($_POST['name'], $_POST['crm'], $_POST['phone'], $_POST['specialty'])) {
  $associado->nome = $_POST['name'];
  $associado->crm = $_POST['crm'];
  $associado->telefone = $_POST['phone'];
  $associado->especialidade = $_POST['specialty'];
  $associado->editar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__. '/includes/header.php';
include __DIR__. '/includes/forms.php';
include __DIR__. '/includes/footer.php';