<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="card no-print">
        <div class="card-body">
          <form action="/" method="get">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Data Inicio</label>
                  <input type="date" class="form-control" name="data_inicio" value="<?php echo $data['data_inicio'] ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Data Final</label>
                  <input type="date" class="form-control" name="data_final" value="<?php echo $data['data_final'] ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <button type="submit" class="btn btn-info" style="margin-top: 30px">Gerar Relatório</button>
              </div>
            </div>
          </form>
        </div>
        <h5 style="text-align: center;" class="mb-2">Dados baseado no mês atual</h5>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info ">
            <div class="inner">
            <h3><?php echo 'R$ ' . number_format($Total_Entrada->total ?? 0, 2, ',', '.'); ?></h3>

              <p>Total de entradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
            <h2>R$: <?php echo number_format($Total_Saida->total ?? 0, 2, ',', '.'); ?></h2>

              <p>Total de saidas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">Relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6">
          <div class="small-box bg-success">
            <div class="inner">
            <h2>R$: <?php echo number_format($Total_contas_a_receber->total ?? 0, 2, ',', '.'); ?></h2>

              <p>Total contas a receber</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">Relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
            <h2>R$: <?php echo number_format($Total_contas_a_pagar->total ?? 0, 2, ',', '.'); ?></h2>

              <p>Total contas a pagar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">Relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-success">
            <div class="inner">
            <h2>R$: <?php echo number_format($Total_contas_recebida->total ?? 0, 2, ',', '.'); ?></h2>

              <p>Total contas recebidas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">Relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>        

        <div class="col-lg-2 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
            <h2>R$: <?php echo number_format($Total_contas_pagas->total ?? 0, 2, ',', '.'); ?></h2>

              <p>Total contas pagas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo URL_BASE ?>assets/#" class="small-box-footer">Relatorio <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

  </section>
</div>