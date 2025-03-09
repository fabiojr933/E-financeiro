<div class="content-wrapper">
  <div class="content-header">

  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-footer clearfix">
          <a href="<?php echo URL_BASE ?>receber/novo" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Novo</a>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de recebers</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-striped table-sm" id="example1">
              <thead>
                <tr>
                  <th style="width: 10%;">Id</th>
                  <th>Cliente</th>
                  <th>Tipo</th>
                  <th>Valor</th>
                  <th>Vencimento</th>
                  <th class="d-flex justify-content-end">Ações</th> <!-- Alinha o cabeçalho à direita -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaContasReceberPendente as $rec) { ?>
                  <tr>
                    <td><?php echo $rec->id ?></td>
                    <td><?php echo $rec->cliente ?></td>
                    <td><small class="badge badge-<?php echo $rec->pago == 1 ? "info" : "danger" ?>"><?php echo ($rec->pago == 0 ? 'Pendente' : 'Pago') ?></small></td>
                    <td><small class="badge badge-danger"><?php echo $rec->valor ?></small></td>
                    <td><?php echo (new DateTime($rec->vencimento))->format('d/m/Y'); ?></td>
                    <td class="d-flex justify-content-end">
                      <button type="button"   onclick="preencherCampos('<?php echo $rec->id; ?>', '<?php echo $rec->valor; ?>')"
                        data-toggle="modal" data-target="#modal-default" class="btn btn-info btn-sm me-1"><i class="fas fa-credit-card"></i></button>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="<?php echo URL_BASE ?>receber/recebimento" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Forma de receber</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="col-md-12">
            <div class="form-group">
              <label>Condição de receber</label>
              <select class="form-control select2bs4" style="width: 100%;" id="id_condicao" name="id_condicao_pagamento" onchange="alteraTipo2()">
                <?php foreach ($fluxo_pagamento as $rec) {  ?>
                  <option value="<?php echo $rec->id ?>"><?php echo $rec->nome ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-12" id="id_carteira">
            <div class="form-group">
              <label>Escolha a carteira</label>
              <select class="form-control select2bs4" style="width: 100%;" id="id_carteira" name="id_carteira">
                <?php foreach ($fluxo_carteira as $cart) {  ?>
                  <option value="<?php echo $cart->id ?>"><?php echo $cart->nome ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-12" id="id_cartao">
            <div class="form-group">
              <label>Escolha o cartão</label>
              <select class="form-control select2bs4" style="width: 100%;" id="id_cartao" name="id_cartao">
                <?php foreach ($fluxo_cartao as $crt) {  ?>
                  <option value="<?php echo $crt->id ?>"><?php echo $crt->nome ?></option>
                <?php } ?>
              </select>
            </div>
          </div>     

          <input type="hidden" id="id_rec" name="id" value="" />
          <input type="hidden" id="valor_reco" name="valor_reco" value="" />
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
          <button type="submit" class="btn btn-primary">Receber</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
function preencherCampos(id, valor) {
    document.getElementById('id_rec').value = id;
    document.getElementById('valor_reco').value = valor;
}
</script>

<script>
  function alteraTipo2() {
    var select = document.getElementById('id_condicao');
    var nome = select.options[select.selectedIndex].text.toUpperCase();

    var cartao = document.getElementById('id_cartao');
    var carteira = document.getElementById('id_carteira');

    if (nome == 'DINHEIRO' || nome == 'A VISTA' || nome == 'VISTA') {
      cartao.hidden = true;
      cartao.querySelector("select").disabled = true; // Desativa o campo
      carteira.hidden = false;
      carteira.querySelector("select").disabled = false;
    } else {
      carteira.hidden = true;
      carteira.querySelector("select").disabled = true;
      cartao.hidden = false;
      cartao.querySelector("select").disabled = false;
    }
  }
  alteraTipo2();
</script>