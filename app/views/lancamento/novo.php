<div class="content-wrapper">
    <div class="content-header">
      
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-footer clearfix">
                    <a href="<?php echo URL_BASE ?>lancamento/index" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> Voltar</a>
                </div>


                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Preencha os dados abaixo</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo URL_BASE ?>lancamento/salvar" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descrição" name="descricao" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Valor</label>
                                            <input type="text" class="form-control" placeholder="valor" name="valor">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="data">Data pagamento</label>
                                            <input type="date" class="form-control" name="data_pag" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control select2bs4" id="tipo_fluxo" onchange="alteraTipo()" style="width: 100%;" name="tipo">
                                                <option value="Entrada">Entrada</option>
                                                <option value="Saida">Saida</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nembro</label>
                                            <select class="form-control select2bs4" style="width: 100%;" name="id_nembro">
                                                <?php foreach ($fluxo_nembro as $nemb) {  ?>
                                                    <option value="<?php echo $nemb->id ?>"><?php echo $nemb->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Condição de pagamento</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="id_condicao" name="id_condicoes_pagamento" onchange="alteraTipo2()">
                                                <?php foreach ($fluxo_pagamento as $pag) {  ?>
                                                    <option value="<?php echo $pag->id ?>"><?php echo $pag->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="id_carteira">
                                        <div class="form-group">
                                            <label>Escolha a carteira</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="id_carteira" name="id_carteira">
                                                <?php foreach ($fluxo_carteira as $cart) {  ?>
                                                    <option value="<?php echo $cart->id ?>"><?php echo $cart->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="id_cartao">
                                        <div class="form-group">
                                            <label>Escolha o cartão</label>
                                            <select class="form-control select2bs4" style="width: 100%;" id="id_cartao" name="id_cartao">
                                                <?php foreach ($fluxo_cartao as $crt) {  ?>
                                                    <option value="<?php echo $crt->id ?>"><?php echo $crt->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="col-md-12" id="id_entrada">
                                    <div class="form-group">
                                        <label>Fluxo financeiro de entrada</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="id_entrada" name="id_fluxo_financeiro">
                                            <?php foreach ($fluxo_entrada as $entrada) {  ?>
                                                <option value="<?php echo $entrada->id ?>"><?php echo $entrada->nome ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="id_saida">
                                    <div class="form-group">
                                        <label>Fluxo financeiro de saida</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="id_saida" name="id_fluxo_financeiro">
                                            <?php foreach ($fluxo_saida as $saida) {  ?>
                                                <option value="<?php echo $saida->id ?>"><?php echo $saida->nome ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Observação</label>
                                        <input type="text" class="form-control" placeholder="Observacao" name="observacao" required>
                                    </div>
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


<script>
    function alteraTipo() {
        let tipo = document.getElementById('tipo_fluxo').value;
        let entrada = document.getElementById('id_entrada');
        let saida = document.getElementById('id_saida');

        if (tipo === 'Entrada') {
            saida.hidden = true;
            saida.querySelector("select").disabled = true; // Desativa o campo para não ser enviado
            entrada.hidden = false;
            entrada.querySelector("select").disabled = false; // Ativa o campo correto
        } else {
            entrada.hidden = true;
            entrada.querySelector("select").disabled = true;
            saida.hidden = false;
            saida.querySelector("select").disabled = false;
        }
    }

    // Garante que a função é chamada na carga da página
    document.addEventListener("DOMContentLoaded", alteraTipo);
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputValor = document.querySelector('input[name="valor"]');

        inputValor.addEventListener("input", function() {
            // Remove tudo que não for número
            var valor = this.value.replace(/\D/g, "");

            // Converte para número e formata em reais
            if (valor) {
                valor = (parseFloat(valor) / 100).toLocaleString("pt-BR", {
                    style: "currency",
                    currency: "BRL",
                });
            }

            // Atualiza o campo com o valor formatado
            this.value = valor;
        });
    });
</script>