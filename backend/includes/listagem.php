<?php
  $result = '';
  foreach($associados as $associado){
    $hrefEdit = "editar.php?id=$associado->id";
    $hrefDelete = "excluir.php?id=$associado->id";
    $result .= "<tr>
                  <td>$associado->id</td>
                  <td>$associado->nome</td>
                  <td>$associado->crm</td>
                  <td>$associado->telefone</td>
                  <td>$associado->especialidade</td>
                  <td>
                  <a href=$hrefEdit>
                    <button type='button' class='btn btn-success'>Editar</button>
                  </a>
                  <a href=$hrefDelete>
                    <button type='button' class='btn btn-danger'>Excluir</button>
                  </a>
                  </td>
                </tr>
                ";
  }
?>

<main class="d-flex justify-content-center flex-column">
  <section class="d-flex justify-content-center flex-column">
    <table class="table bg-light mt-3 align-middle table-responsive">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>CRM</th>
          <th>TELEFONE</th>
          <th>ESPECIALIDADE</th>
          <th>AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?=$result?>
      </tbody>
    </table>
    <section class="d-flex justify-content-center flex-column">
    <a href="cadastro.php" class="d-flex justify-content-center">
      <button type='button' class="btn btn-primary" >Associe-se</button>
    </a>
  </section>
  </section>
</main>