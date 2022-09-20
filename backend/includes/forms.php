<main class="d-flex justify-content-center align-items-center flex-column">
      <h1 class="mt-3"><?=TITLE?></h1>
      <form method="post" class="d-flex justify-content-evenly align-items-center flex-column">
        <div class="form-group">
          <label>
            Nome:
            <input type="text" name='name' class="form-control" />
          </label>
        </div>
        <div class="form-group">
        <label>
          CRM:
          <input type="text" name='crm' class="form-control"/>
        </label>
        </div>
        <div class="form-group">
        <label>
          Telefone:
          <input type="text" name='phone' class="form-control" />
        </label>
        </div>
        <div class="form-group">
        <label>
          Especialidade:
          <input type="text" name='specialty' class="form-control" />
        </label>
        </div>
        <div class="form-group mt-3">
          <button class="btn btn-primary" type='submit'><?=BUTTON?></button>
        </div>
      </form>
    </main>