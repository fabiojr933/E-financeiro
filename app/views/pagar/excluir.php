<div class="content-wrapper">
  <div class="content-header">

  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-footer clearfix">
          <a href="<?php echo URL_BASE ?>pagamento/novo" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Novo</a>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de pagamentos</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-striped table-sm" id="example1">
              <thead>
                <tr>
                  <th style="width: 10%;">Id</th>
                  <th>Fornecedor</th>
                  <th>Tipo</th>
                  <th>Valor</th>
                  <th>Vencimento</th>
                  <th class="d-flex justify-content-end">Ações</th> <!-- Alinha o cabeçalho à direita -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaContasPagar as $pag) { ?>
                  <tr>
                    <td><?php echo $pag->id ?></td>
                    <td><?php echo $pag->fornecedor ?></td>
                    <td><small class="badge badge-<?php echo $pag->pago == 1 ? "info" : "danger" ?>"><?php echo ($pag->pago == 0 ? 'Pendente' : 'Pago') ?></small></td>
                    <td><small class="badge badge-danger"><?php echo $pag->valor ?></small></td>
                    <td><?php echo (new DateTime($pag->vencimento))->format('d/m/Y'); ?></td>
                    <td class="d-flex justify-content-end">
                    <button type="button" onclick="document.getElementById('id_pag').value = '<?php echo  $pag->id ?>'" data-toggle="modal" data-target="#modal-default" class="btn btn-danger btn-sm me-1"><i class="fas fa-trash-alt"></i></button>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </section>
</div>



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo URL_BASE ?>pagar/excluir" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Deseja realmente excluir ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_pag" name="id" value="" />
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-primary">Sim</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--
<script>
    function confirmaExclusao(id_receita) {
        var conf = confirm('Deseja realmente excluir ?', 'Atenção');
        if (conf) {
            $.ajax({
                url: '',
                method: 'get',
                success: function(response) {
                    window.location.href = '';
                },
                error: function(error) {
                    // Lógica em caso de erro
                    console.error(error);
                }
            });
        }
    }
</script>  -->