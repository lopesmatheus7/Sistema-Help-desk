<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consumoModalLabel">Cadastrar seu consumo</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../sql/proc_cad_combustivel.php" enctype="multipart/form-data">
      <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">

          <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <input type="date" class="form-control" id="data" name="dia">
          </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <input type="text" placeholder="Fornecedor" class="form-control" id="fornecedor" name="fornecedor">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <div class="form-group">
      <select class="form-select" id="empresa" name="empresa">
                                    <option value="Alutech">ALUTECH</option>
                                    <option value="Kolke">KOLKE</option>
                                    <option value="Outra">OUTROS</option>
                                </select>
        </div>
      </div>
    </div>
    <input type="hidden" name="tipo" style="display: none;" value="1">
    <div class="col-md-6">
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Nome do Projeto" id="projeto" name="projeto">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Finalidade do gasto" id="finalidade" name="finalidade">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <input type="number" step="0.001" placeholder="Quantidade" class="form-control" id="quantidade" name="quantidade" oninput="realizarMultiplicacao()">
    </div>
    </div>
      </div>
      <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <input type="number" step="0.001" placeholder="Valor unitário" class="form-control" id="valor_unitario" name="valor_unitario" oninput="realizarMultiplicacao()">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <input type="text" step="0.01" placeholder="Valor total automático" class="form-control" id="resultado" name="valor_total" readonly>
    </div>
    </div>
      </div>
      <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <input type="number" class="form-control" placeholder="Nº da nota fiscal" id="numeroNota" name="n_nota">
          </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <input  type="file" placeholder="Imagem da notinha" class="form-control" name="arquivo" id="arquivo">
    </div>
    </div>
      </div>
      <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['id'];?>">
                            <input type="hidden" name="usuario_nome" value="<?php echo $_SESSION['nome'];?>">
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
      </div>
      </form> 
    </div>
  </div>


  <!-- Inclua os arquivos JavaScript do Bootstrap -->
  <script>
        function realizarMultiplicacao() {
            var quantidade = parseFloat(document.getElementById('quantidade').value) || 2;
            var valor_unitario = parseFloat(document.getElementById('valor_unitario').value) || 2;
            var resultado = quantidade * valor_unitario;
            resultado = resultado.toFixed(2);
            document.getElementById('resultado').value = resultado;
        }
    </script>
 