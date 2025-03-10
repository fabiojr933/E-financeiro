<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/dist/css/adminlte.min.css">
</head>
<style>
    .login-box {
        margin: 0 auto;
        margin-top: 40px;
        /* ou qualquer largura desejada */
    }
</style>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?php echo URL_BASE ?>assets/index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">

            <?php $this->verMSG();
            $this->verERRO();
            ?>

            <form action="<?php echo URL_BASE ?>login/logar" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Senha" name="senha_hash">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">

                    </div>
                </div>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <button class="btn btn-block btn-primary">
                        <i class=""></i> Login
                    </button>
                    <a href="<?php echo URL_BASE ?>login/cadastrar" class="btn btn-block btn-danger">
                        <i class=""></i> Cadastrar
                    </a>
                </div>
            </form>


        </div>
    </div>
</div>
<script src="<?php echo URL_BASE ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/dist/js/adminlte.min.js"></script>

</html>