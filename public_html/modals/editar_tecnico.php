<div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar técnico <?php echo isset($id_usuario) ? "ID do Usuário: " . $id_usuario : ''; ?></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../sql/proc_edit_usuario.php" enctype="multipart/form-data">
                <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">
                    <input type="hidden" name="id" id="edit_user_id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo">
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
                                <select class="form-select" id="tipo" name="tipo">
                                    <option value="">SELECIONE</option>
                                    <option value="0">Administrador</option>
                                    <option value="2">Técnico</option>
                                    <option value="3">Estoquista</option>
                                </select>
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
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Função para preencher automaticamente os campos do formulário
    function preencherFormulario(usuario) {
        $("#name").val(usuario.nome);
        $("#email").val(usuario.email);
        $("#img_id").val(usuario.img_id);
        $("#tipo").val(usuario.tipo);
        $("#data_nascimento").val(usuario.data_nascimento);
        $("#cpf").val(usuario.cpf);
        // Preencha outros campos conforme necessário
    }

    // Adicionar um ouvinte de evento ao modal mostrado
    $('#EditarModal').on('shown.bs.modal', function () {
        // Obter os dados do usuário com o ID correspondente
        var usuario = <?php echo json_encode($user_data); ?>;
        preencherFormulario(usuario);
    });
</script>