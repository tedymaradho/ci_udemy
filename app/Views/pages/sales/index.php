<?php
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi Penjualan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container-fluid">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="<?= base_url('adminlte') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Transaksi Penjualan</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content pt-2">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col-md-6 -->
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body pt-1">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="no_faktur" class="col-form-label">No Faktur</label>
                                            <input type="text" class="form-control" name="no_faktur" id="no_faktur"
                                                value="<?= $no_faktur ?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="tanggal" class="col-form-label">Tanggal</label>
                                            <input type="text" class="form-control" name="tanggal" id="tanggal"
                                                value="<?= date('d/m/Y') ?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="jam" class="col-form-label">Jam</label>
                                            <input type="text" class="form-control" name="jam" id="jam"
                                                value="<?= date('H:i:s') ?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="kasir" class="col-form-label">Kasir</label>
                                            <input type="text" class="form-control" name="kasir" id="kasir">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body bg-black pt-1">
                                    <h1 class="display-4 text-right text-white font-weight-bold mb-0 mt-2">Rp. 121.223
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 input-group">
                                            <input type="text" class="form-control" placeholder="Barcode/Kode Barang"
                                                name="barcode">
                                            <div class="input-group-append">
                                                <button class="input-group-text btn btn-secondary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="input-group-text btn btn-secondary">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Nama Product"
                                                name="nama_product">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="Kategori"
                                                name="kategori">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="Satuan" name="satuan">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="Harga" name="harga">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="number" min="1" value="1" class="form-control"
                                                placeholder="Qty" name="qty">
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Tambah
                                            </button>
                                            <button class="btn btn-warning">
                                                <i class="fas fa-recycle"></i> Batal
                                            </button>
                                            <button class="btn btn-success">
                                                <i class="fas fa-credit-card"></i> Bayar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered tables-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Kode/Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-sm p-0">✖️</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body bg-black pt-1">
                                    <h1 class="text-center text-white font-weight-bold mb-0 mt-2">Satu Juta Lima Ratus
                                        Ribu
                                        Rupiah
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>