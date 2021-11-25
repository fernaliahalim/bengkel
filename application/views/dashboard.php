<style>
    .footage_menu{
        text-decoration:none;
        color:#9E9E9E;
    }

    .form-group{
        margin:10px;
    }

    *{padding:0;margin:0;}

    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#4CAF50;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        font-size:40px;
    }

    .my-float{
        margin-top:22px;
    }

    .float-print{
        position:fixed;
        width:60px;
        height:60px;
        bottom:110px;
        right:40px;
        background-color:#3F51B5;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        font-size:40px;
    }

    .my-float-print{
        margin-top:15px;
    }
    
</style>

<body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Aplikasi Inventaris Barang</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <i class="px-3 bi-person-fill" style="color:#FFF"> <?= $this->session->userdata('maindata_nama'); ?></i>
            </div>
        </div>
    </header>

    <div class="container-fluid">
    <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'dashboard' ? 'active' : ''; ?>" aria-current="page" href="<?= base_url(); ?>dashboard">
                <span class="bi-house-fill"></span>
                Beranda
                </a>
            </li>
            <?php if($this->session->userdata('maindata_role') == 1){ ?>
                <li class="nav-item">
                    <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'list_user' ? 'active' : ''; ?>" href="<?= base_url(); ?>user/list_user">
                    <span class="bi-people-fill"></span>
                    Daftar User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'jenis_kendaraan' ? 'active' : ''; ?>" href="<?= base_url(); ?>jenis_kendaraan">
                    <span class="bi-truck"></span>
                    Jenis Kendaraan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'tipe_kendaraan' ? 'active' : ''; ?>" href="<?= base_url(); ?>tipe_kendaraan">
                    <span class="bi-gear-wide"></span>
                    Tipe Kendaraan
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'product_category' ? 'active' : ''; ?>" href="<?= base_url(); ?>product_category">
                <span class="bi-grid-3x3-gap-fill"></span>
                Data Kategori Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'product' ? 'active' : ''; ?>" href="<?= base_url(); ?>product">
                <span class="bi-box-seam"></span>
                Data Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'pengadaan_barang' ? 'active' : ''; ?>" href="<?= base_url(); ?>pengadaan_barang">
                <span class="bi-file-earmark-text-fill"></span>
                Pengadaan Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'customer' ? 'active' : ''; ?>" href="<?= base_url(); ?>customer">
                <span class="bi-people-fill"></span>
                Customer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'transaction' ? 'active' : ''; ?>" href="<?= base_url(); ?>transaction">
                <span class="bi-cart-dash-fill"></span>
                Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'transaction_list' ? 'active' : ''; ?>" href="<?= base_url(); ?>transaction/show_list">
                <span class="bi-list-task"></span>
                List Transaksi
                </a>
            </li>
            <li>
                <hr/>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == 'user' ? 'active' : ''; ?>" href="<?= base_url(); ?>user">
                <span class="bi-gear-fill"></span>
                Pengaturan Akun
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>home/sign_out">
                <span class="bi-box-arrow-in-left"></span>
                Logout
                </a>
            </li>
        </ul>
      </div>
    </nav>

    