<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../sql/proc_cad_clientes.php" enctype="multipart/form-data">
      <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="name" class="form-control" id="name" name="nome" placeholder="Nome da unidade">
      </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <input type="email" class="form-control"  id="email" name="email" placeholder="E-mail">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <div class="form-group">
        <input type="file" class="form-control" name="img_id" id="img_id" placeholder="Foto de perfil">
        </div>
      </div>
    </div>
    <input type="hidden" name="tipo" style="display: none;" value="1">
    <div class="col-md-6">
      <div class="form-group has-success">
        <input type="text" placeholder="Escreva o endereço da unidade" name="endereco" class="form-control"/>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <input type="password" placeholder="Digite sua senha" name="senha" class="form-control is-valid"/>
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
