<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="..assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logos/HERCULES.png">
  <title>
    Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-50">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                <img width="200px" style="padding: 1px" src="../assets/img/logos/boleiros.png" alt="logo" srcset="">
                  <h3 class="font-weight-bolder text-info text-gradient">Seja bem vindo ao seu sistema de treinamentos</h3>
                  <p class="mb-0">Insira sua senha e seu email para que possamos lhe redirecionar para seu ambiente.</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="sql/login.php">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="senha" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
                    </div>
                    </form>
                  <div class="text-center">
<button type="button" class="btn bg-gradient-success w-100 mt-4 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Cadastres-se
</button>
                  </div>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Esqueceu sua senha?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Fale conosco!</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/boleiros.png')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <?php 
    include ('components/footer.php');
  ?>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do aluno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../proc_cad_usuario_externo.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
                                <label for="name">Nome completo do aluno</label>
                                <input type="hidden" name="id_conta" value="195">
                                <input type="hidden" name="unidade" value="A.F Boleiros">
                                <input type="hidden" name="tipo" value="2">
                                <input type="hidden" name="status" value="online">
                                <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_id">Como ficou sabendo da escola de futebol?</label>
                                <select class="form-control" name="pesquisa" id="pesquisa">
                                <option value="">Selecione</option>
                                <option value="google">Google</option>
                                <option value="amigo">Amigos</option>
                                <option value="Escola">Escola</Option>
                                <option value="Outros">Outros</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_id">Foto de perfil do aluno</label>
                                <input type="file" class="form-control" name="img_id" id="img_id" required>
                            </div>
                        </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="nascimento">Data de Nascimento do aluno</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">RG do Aluno</label>
                                <input type="number" class="form-control" id="rg_aluno" name="rg_aluno" placeholder="RG se não tiver deixar em branco">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF ALUNO</label>
                                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                            </div>
                        </div>
                    </div>
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dados do Responsavel</h5>
                  </div><br>
                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail do responsavel</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contato">Contato do Responsavel colocar DD sem parenteses</label>
                                <input type="text" class="form-control" name="contato" id="contato" oninput="limitarNumero(this, 11)" required>
                            </div>
                        </div>
                    <script>
                        function limitarNumero(input, maxLength) {
                            if (input.value.length > maxLength) {
                                input.value = input.value.slice(0, maxLength);
                            }
                        }
                    </script>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="nascimento">RESPONSAVEL FINANCEIRO</label>
                                <input type="text" class="form-control" id="responsavel" name="responsavel">
                            </div>
                        </div>                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RG">RG DO RESPONSAVEL</label>
                                <input type="number" class="form-control" id="rg_responsavel" name="rg_responsavel" placeholder="RG Responsavel">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF DO RESPONSAVEL</label>
                                <input type="number" class="form-control" id="cpf_responsavel" name="cpf_responsavel" placeholder="CPF Responsavel">
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" onblur="buscarEnderecoPorCep(this.value)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" readonly>
                        </div>
                    </div>

                    <script>
                        function buscarEnderecoPorCep(cep) {
                            // Substitua 'https://viacep.com.br/ws/' pelo seu endpoint de serviço de consulta de CEP, se necessário
                            const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

                            fetch(apiUrl)
                                .then(response => response.json())
                                .then(data => preencherCamposEndereco(data))
                                .catch(error => console.error('Erro ao buscar endereço por CEP:', error));
                        }

                        function preencherCamposEndereco(data) {
                            const enderecoInput = document.getElementById('endereco');

                            if (data.erro) {
                                alert('CEP não encontrado. Por favor, verifique e tente novamente.');
                                enderecoInput.value = '';  // Limpar o campo de endereço em caso de erro
                            } else {
                                enderecoInput.value = `${data.logradouro}, ${data.bairro}, ${data.localidade}, ${data.uf}`;
                            }
                        }
                    </script>
                  
                    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="senha">Digite sua senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                            </div>
                        </div>
                        </div>
                    
                    
                      <div class="col-md-6">
                      <div class="form-group">
                      
  <a href="contratos/boleiros.html" target="_blank" class=""><strong>Termo de Contrato da Escola clique aqui</strong></a>
</div>
  <input type="checkbox" id="aceitarContrato" name="termo" value="aceito" required>
  <label for="aceitarContrato">Eu aceito os termos do contrato</label><br>
<input type="checkbox" id="aceitarContrato" required>
  <label for="aceitarContrato">Declaro ser responsavel legal e ser <br> com idade igual ou acima de 18 anos</label><br>
  <br>
<input type="checkbox" id="aceitarContrato" required>
  <label for="aceitarContrato">Declaro estar ciente que <br> o aluno possui exame e liberação médica <br> para atividades de alto rendimento</label>
  
</div></div>
         


      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</html>