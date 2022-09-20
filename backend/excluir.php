<?php

require_once __DIR__.'/vendor/autoload.php';
require './app/Entity/Associados.php';

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

if (isset($_POST['excluir'])) {

  $associado->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__. '/includes/header.php';
include __DIR__. '/includes/delete.php';
include __DIR__. '/includes/footer.php';