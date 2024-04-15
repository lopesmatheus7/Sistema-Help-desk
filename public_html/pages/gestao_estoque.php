<?php 
      include ('../components/navdashboard.php');     
  ?>
   
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 
    <!-- Navbar -->
    <?php include ('../sql/cards_estoque.php');?>
            
            <?php include ('../sql/lista_do_estoque.php');?>
            <!--MODAL CADASTRO-->
            <div class="modal fade" id="CadastroModal" tabindex="-1" role="dialog" aria-labelledby="CadastroModalLabel" aria-hidden="true">
              <?php 
                include '../modals/cadastro_estoque.php';
              ?>            
              <!--END MODAL CADASTRO-->
            </div>
          </div>
        </div>
      </div>
      <?php 
        include ('../components/footer.php')
      ?>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>