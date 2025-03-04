<div class="content-wrapper">
  <div class="content-header">
    <div class="cartoesiner-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>assets/#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
      </div>
    </div>
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
                  <input type="text" class="form-control" placeholder="Nome" name="titular" value="<?php echo $cartoes->titular ?>">
                  <input type="text" class="form-control" hidden  name="id" value="<?php echo $cartoes->id ?>">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome do cartão</label>
                      <input type="text" class="form-control" placeholder="cartao" name="nome" value="<?php echo $cartoes->nome ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Minimal</label>
                      <select class="form-control select2" style="width: 100%;" name="tipo">
                      <option value="Debito" <?php echo ($cartoes->tipo == "Debito") ? "selected" : ""; ?>>Débito</option>
                      <option value="Credito" <?php echo ($cartoes->tipo == "Credito") ? "selected" : ""; ?>>Crédito</option>
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