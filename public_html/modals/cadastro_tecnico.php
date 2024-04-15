<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar técnico</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../sql/proc_cad_usuario.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo">
                                <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">
                                <input type="hidden" name="tipo" value="2">
                                <input type="hidden" name="id_turma" value="1">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_id">Foto de perfil</label>
                                <input type="file" class="form-control" name="img_id" id="img_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="senha">Digite sua senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
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