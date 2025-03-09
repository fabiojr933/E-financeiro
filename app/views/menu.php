<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo URL_BASE ?>" class="brand-link">
    <img src="<?php echo URL_BASE ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Financeiro</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="<?php echo URL_BASE ?>assets/#" class="d-block"><?php echo isset($_SESSION[SESSION_LOGIN]['nome']) ? $_SESSION[SESSION_LOGIN]['nome'] : "Visitante"; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?php echo URL_BASE ?>assets/#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Cadastros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>nembro/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nembros</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>carteira/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Carteiras</p>
              </a>
            </li>           
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>cartoes/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cartões</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>pagamento/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cond pagamentos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>fornecedor/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fornecedores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>cliente/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cliente</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>fluxo/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fluxo financeiro</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?php echo URL_BASE ?>assets/#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Lançamento
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>lancamento/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Novo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>lancamento/deletar" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Excluir</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?php echo URL_BASE ?>" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Contas a receber
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>receber/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Novo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>receber/baixa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Receber</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>receber/cancelamento" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Canc. recebimento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>receber/deletar" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Excluir</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="<?php echo URL_BASE ?>" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Contas a pagar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>pagar/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Novo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>pagar/baixa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pagar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>pagar/cancelamento" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Canc. pagamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL_BASE ?>pagar/deletar" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Excluir</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>