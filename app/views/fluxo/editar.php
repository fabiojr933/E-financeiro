<div class="content-wrapper">
  <div class="content-header">

  </div>
  <section class="content">
    <div class="fluxoiner-fluid">
      <div class="card">
        <div class="card-footer clearfix">
          <a href="<?php echo URL_BASE ?>fluxo/index" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>


        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Preencha os dados abaixo</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo URL_BASE ?>fluxo/salvar" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Descrição</label>
                  <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $fluxo->nome ?>">
                  <input type="text" class="form-control" hidden name="id" value="<?php echo $fluxo->id ?>">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tipo</label>
                      <select class="form-control select2bs4" style="width: 100%;" name="tipo">
                        <option value="Entrada" <?php echo ($fluxo->tipo == "Entrada") ? "selected" : ""; ?>>Entrada</option>
                        <option value="Saida" <?php echo ($fluxo->tipo == "Saida") ? "selected" : ""; ?>>Saida</option>
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