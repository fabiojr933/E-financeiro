<div class="content-wrapper">
  <div class="content-header">
  
  </div>
  <section class="content">
    <div class="cartoesiner-fluid">
      <div class="card">
        <div class="card-footer clearfix">
          <a href="<?php echo URL_BASE ?>cartoes/index" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>


        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Preencha os dados abaixo</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo URL_BASE ?>cartoes/salvar" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Titular</label>
                  <input type="text" class="form-control" placeholder="Nome" name="titular">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome do cartão</label>
                      <input type="text" class="form-control" placeholder="cartao" name="nome">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Escolha</label>
                      <select class="form-control select2bs4" style="width: 100%;" name="tipo">
                        <option>Debito</option>
                        <option>Credito</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

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