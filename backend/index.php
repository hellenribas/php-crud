<?php

require __DIR__.'/vendor/autoload.php';

require './app/Entity/Associados.php';
use \App\Entity\Associado;

$associados = Associado::getAssociados();

include __DIR__. '/includes/header.php';
include __DIR__. '/includes/listagem.php';
include __DIR__. '/includes/footer.php';

