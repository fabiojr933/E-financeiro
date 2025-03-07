<div class="content-wrapper">
    <div class="content-header">
      
    </div>
    <section class="content">
        <div class="container-fluid">
        <div class="card">                        
              <div class="card-footer clearfix">
              <a href="<?php echo URL_BASE ?>fornecedor/index" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> Voltar</a>
              </div>


              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Preencha os dados abaixo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo URL_BASE ?>fornecedor/salvar" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control"  placeholder="Nome" name="nome" required>
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        


          </div>
          <!--/.col (left) -->
            </div>
            </div> 
        </div>
    </section>
</div>