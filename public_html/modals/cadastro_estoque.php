<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar produto</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../sql/proc_estoque.php">
      <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="name" class="form-control" id="produto" name="produto" placeholder="Nome do produto">
      </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <input type="name" class="form-control"  id="marca" name="marca" placeholder="Marca do produto">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="name" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
      </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <input type="name" class="form-control"  id="n_serie" name="n_serie" placeholder="Nº de série">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="name" class="form-control" id="patrimonio" name="patrimonio" placeholder="Nº do patrimônio">
      </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
      </div>
      </form> 
    </div>
  </div>