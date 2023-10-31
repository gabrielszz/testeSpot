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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Categoria</h1>
          <p class="mb-4"><a href="readme.txt" download>Veja mais informações sobre o meu projeto clicando aqui</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="form-categoria.php" class="btn btn-success btn-icon-split" style="position: relative; float:right;">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Cadastrar nova</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th style="width:340px;">Descrição</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Descrição</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    
                    include 'includes/conexao.php';
                    $sql = "SELECT * FROM CATEGORIAS";
                    $result = $conn->query($sql);

                    //var_dump($result);

                    //if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $descricao = $row["descricao"];
                        $status = $row["status"];
                        if($status == 1){ 
                            $statusNome = 'Ativo';
                        }else{
                            $statusNome = 'Inativo';
                        }
                    ?>
                    <tr>
                      <td><?=$id?></td>
                      <td><?=$descricao?></td>
                      <td><?=$statusNome?></td>
                      <td>
                      <form name ='formstatus' method='post' id='formstatus'>
                        <input class='form-control' type='hidden' name='id' id='id' value='<?=$id;?>'>
                        <input class='form-control' type='hidden' name='status' id='status' value='<?=$status;?>'>
                        <input class='form-control' type='hidden' name='acao' id='acao' value='status'>
                        </form>
                        <form name ='form<?=$id;?>' method='post' id='form<?=$id;?>'>
                        <input class='form-control' type='hidden' name='id' id='id' value='<?=$id;?>'>
                        <input class='form-control' type='hidden' name='status' id='status' value='<?=$status;?>'>
                        <input class='form-control' type='hidden' name='acao' id='acao' value='excluir'>
                        </form>
                        <button class="btn btn-warning" onclick='atvDstvCategoria(<?=$id;?>);'>ativar/desativar</button>
                        <a href="form-categoria.php?id=<?=$id;?>" class="btn btn-info">editar</a>
                        <a href="#" data-toggle="modal" data-target="#excluirModal<?=$id;?>" class="btn btn-danger">excluir</a>
                      </td>

                      <!-- Excluir Modal-->
                     <div class="modal fade" id="excluirModal<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Certeza que deseja excluir?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Esta exclusão é permanente e não pode ser desfeita. Caso haja algum produto relacionado a esta categoria ele será desassociado.</div>
                                <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="excluirCategoria(<?=$id;?>);">Excluir Categoria</button>
                                
                               
                            </div>
                        </div>
                    </div>
                    </tr>

                    <?php 
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- end container-fluid -->

      </div>
      <!-- End of Main Content -->

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



  <script type="text/javascript">

    function excluirCategoria(id){
        acao = document.getElementById('acao').value = 'excluir';
        const formulario = document.querySelector('#form'+id);
        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "categoriaControl.php",
        data: dados,
        success: function( data )
        {
          alert('Categoria excluída com sucesso');
          window.location.reload();
        }
      });
    }
    function atvDstvCategoria(){
        acao = document.getElementById('acao').value = 'status';

        const formulario = document.querySelector('#formstatus');

        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "categoriaControl.php",
        data: dados,
        success: function( data )
        {
          alert("status alterado");
          window.location.reload();
        }
      });
    }
    </script>
</body>

</html>
