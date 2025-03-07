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
                        <form action="<?php echo URL_BASE ?>pagar/salvar" method="post">
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
                                            <label for="data">Data vencimento</label>
                                            <input type="date" class="form-control" name="vencimento" required>
                                        </div>
                                    </div>
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
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fornecedor</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="id_fornecedor">
                                            <?php foreach ($fluxo_fornecedor as $for) {  ?>
                                                <option value="<?php echo $for->id ?>"><?php echo $for->nome ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>                    

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fluxo financeiro de saida</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="id_saida" name="id_fluxo_financeiro">
                                            <?php foreach ($fluxo_saida as $saida) {  ?>
                                                <option value="<?php echo $saida->id ?>"><?php echo $saida->nome ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
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