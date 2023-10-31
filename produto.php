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
          <h1 class="h3 mb-2 text-gray-800">Produto</h1>
          <p class="mb-4"><a href="readme.txt" download>Veja mais informações sobre o meu projeto clicando aqui</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>-->
              <a href="form-produto.php" class="btn btn-success btn-icon-split" style="position: relative; float:right;">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Cadastrar novo</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th style="width:340px;">Descrição</th>
                      <th>Categoria</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Descrição</th>
                      <th>Categoria</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    
                    include 'includes/conexao.php';
                    $sql = "SELECT * FROM PRODUTOS";
                    $result = $conn->query($sql);

                    //var_dump($result);

                    //if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $descricao = $row["descricao"];
                        $categoria = $row["categoria_id"];

                        //--------------------------------
                        $sql2 = "SELECT * FROM CATEGORIAS where id = ".$categoria;
                        $result2 = $conn->query($sql2);
    
                        $categoriaNome = 'nenhuma associada';

                        if ($result->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                                $categoriaNome = $row2["descricao"];
                            }   
                        }
                        ?>
                    <tr>
                      <td><?=$id?></td>
                      <td><?=$descricao?></td>
                      <td><?=$categoriaNome?></td>
                      <td>
                        <form name ='form<?=$id;?>' method='post' id='form<?=$id;?>'>
                        <input class='form-control' type='hidden' name='id' id='id' value='<?=$id;?>'>
                        <input class='form-control' type='hidden' name='categoria' id='categoria' value='<?=$categoria;?>'>
                        <input class='form-control' type='hidden' name='acao' id='acao' value='excluir'>
                        </form>
                        <a href="form-produto.php?id=<?=$id;?>" class="btn btn-info">editar</a>
                        <a href="#" data-toggle="modal" data-target="#excluirModal<?=$id;?>" class="btn btn-danger">excluir</a>
                      </td>
                    </tr>

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
                                <div class="modal-body">Esta exclusão é permanente e não pode ser desfeita.</div>
                                <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="excluirProduto(<?=$id;?>);">Excluir Produto</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
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

  function excluirProduto(id){
        acao = document.getElementById('acao').value = 'excluir';
        const formulario = document.querySelector('#form'+id);
        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "produtoControl.php",
        data: dados,
        success: function( data )
        {
          alert('Produto excluído com sucesso');
        }
      });
    }

    function atvDstvCategoria(){
        acao = document.getElementById('acao').value = 'categoria';
        const formulario = document.querySelector('#form');
        var dados = jQuery(formulario).serialize();
        jQuery.ajax({
        type: "POST",
        url: "produtoControl.php",
        data: dados,
        success: function( data )
        {
          alert('categoria alterado');
          window.location.reload();
        }
      });
    }

    </script>
</body>

</html>
