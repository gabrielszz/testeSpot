<!DOCTYPE html>
<html lang="en">

<head><?php include 'includes/head.php';?></head>

<body id="page-top">
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

          <!-- Cabeçalho -->
          <h1 class="h3 mb-2 text-gray-800">Categoria</h1>
          <p class="mb-4"><a href="readme.txt" download>Veja mais informações sobre o meu projeto clicando aqui</a>.</p>

          <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                include 'includes/conexao.php';

                //---------------
                $sql = 'SELECT descricao, status from CATEGORIAS WHERE id = '.$id;
                $result = $conn->query($sql);

                //if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $descricao = $row["descricao"];
                    $status = $row["status"];
                }
            }else{
                $id = '';
                $descricao = '';
                $status = 1;
            }
          ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="categoria.php" class="btn btn-primary btn-icon-split" style="position: relative; float:right;">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Voltar</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  <form id='form' method='post'>  
                    <tr>
                        <td>Id</td>
                        <td>
                            <input class='form-control' type='text' disabled value='<?=$id?>'>
                            <span style='font-size:10px;'>O valor d id é automático e não pode ser alterado.</span>
                        </td>
                        <td>Status</td>
                        <td>
                            <select class='form-control' name='status'>
                            <option value='1' <?php if($status == 1){ echo 'selected';}?> >Ativo</option>
                            <option value='0' <?php if($status == 0){ echo 'selected';}?> >Inativo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td><input class='form-control' type='text' name='descricao' value='<?=$descricao?>'></td>
                        <input class='form-control' type='hidden' value='<?=$id?>' name='id' id="id">
                        <input class='form-control' type='hidden' name='acao' id='acao'>
                    </tr>
                  </form>
                    <tr>
                      <td>
                      <?php if($id >  0){ ?>
                      <button onclick="alterarCategoria()" class="btn btn-primary">Alterar</button>
                      <button onclick="excluirCategoria()" class="btn btn-danger">Excluir</button>
                      <?php }else{ ?>
                      <button onclick="cadastrarCategoria()" class="btn btn-success">Cadastrar</button>
                      <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

      <script type='text/javascript'>

      function cadastrarCategoria(){

        acao = document.getElementById('acao').value = 'cadastrar';

        const formulario = document.querySelector('#form');

        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "categoriaControl.php",
        data: dados,
        success: function( data )
        {
          alert('Cadastrado com sucesso');
        }
      });
      }
      function alterarCategoria(){
        acao = document.getElementById('acao').value = 'alterar';
        const formulario = document.querySelector('#form');
        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "categoriaControl.php",
        data: dados,
        success: function( data )
        {
          //alert('Alterado com sucesso');
          alert(data);
        }
      });
      }
      function excluirCategoria(){
        acao = document.getElementById('acao').value = 'excluir';
        const formulario = document.querySelector('#form');
        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "categoriaControl.php",
        data: dados,
        success: function( data )
        {
          alert('Excluido com sucesso');
        }
      });
      }
    </script>

      <!-- Footer -->
      <?php include 'includes/footer.php';?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>
