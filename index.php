<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php';?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Menu -->
    <?php include 'includes/menu.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Barra do topo -->
        <?php include 'includes/barra-topo.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Teste SPOT - Gabriel Souza</h1>
            <a href="readme.txt" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" download>
                <i class="fas fa-download fa-sm text-white-50"></i> Download readme.txt</a>
          </div>

          <!-- Content Row -->


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <!-- Color System -->
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Páginas</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <!----------------------->
                  <div class="row">
                <div class="col-lg-6 mb-4">
                <a href ='produto.php'>

                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Produtos
                    </div>
                  </div>
</a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href ='categoria.php'>
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Categorias
                    </div>
                  </div>
</a>
                </div>
              </div>
                </div>
              </div>
              

            </div>

            <div class="col-lg-6 mb-4">



              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sobre o teste</h6>
                </div>
                <div class="card-body">
                  <p>Meu projeto foi desenvolvido em cima de um template bootstrap para otimizar o tempo, e focar no essencial pedido.</p>
                  <p>Os campos da base de dados foram nomeados conforme exibido na documentação.</p>
                  <p>As pastas referentes ao tema são as seguintes: img, css, js, scss, vendor. 
                    As restantes são implementações feitas por mim, para melhor avaliação segue a pasta do tema
                     zipada dentro da pasta raiz.</p>

                     <p>Para testes deixei alguns produtos já cadastrados na base.</p>

                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'includes/footer.php';?>


    </div>
    <!-- End of Content Wrapper -->
  </div>
</body>

</html>
