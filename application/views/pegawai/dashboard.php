<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $cuti['total_cuti'] ?></h3>

                                    <p>Data Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $cuti_acc['total_cuti'] ?></h3>

                                    <p>Data Cuti Diterima</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $cuti_reject['total_cuti'] ?></h3>

                                    <p>Data Cuti Ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $cuti_confirm['total_cuti'] ?></h3>

                                    <p>Data Cuti Menunggu Konfirmasi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php
                                        // echo var_dump($cuti_pegawai[0]['mulai']);
                                        // echo var_dump($cuti_pegawai[0]['berakhir']);
                                        if ($cuti_pegawai == null) {
                                            echo 'Belum Ada';
                                        } else {
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($cuti_pegawai[0]['berakhir']);
                                            $datediff = $your_date - $now;

                                            $date_akhir = round($datediff / (60 * 60 * 24));



                                            $now = time(); // or your date as well
                                            $your_date = strtotime($cuti_pegawai[0]['mulai']);
                                            $datediff = $now - $your_date;

                                            $date_mulai = round($datediff / (60 * 60 * 24));



                                            if ($date_mulai >= 0 and $date_akhir >= 0) {
                                                echo $date_akhir . ' Hari Lagi';
                                            } else {
                                                echo "Belum Ada";
                                            }
                                        }

                                        ?></h3>

                                    <p>Sisa Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_pegawai/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">
                        Syarat Permohonan Cuti
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <ul>Telah berkuliah minimal dua semester</ul>
                                <ul>Cuti kuliah maksimal dua semester</ul>
                                <ul>Cuti kuliah harus disetujui oleh pihak kampus</ul>
                                <ul>Ada mata kuliah yang tertunda</ul>
                                <ul>Memberi laporan saat akan berkuliah kembali</ul>
                                <ul>Membayar SPP Pokok sebesar 25% di semester yang akan dicutikan di BUK</ul>
                                <ul>Tidak mengisi KRS di semester yang akan dicutikan</ul>
                                <ul>Yang terakhir wajib mengisi Form</ul>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        Setelah Mengisi Form
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Bawa Semua berkas persyaratan kepada BAK : <br>
                                <ul>Bukti Pembayaran ke BUK</ul>
                                <ul>Surat Persetujuan Orang Tua/Wali <a href="https://docs.google.com/document/d/1zbRhF8NthJsHAsNeMtw5UI2U-n0NRCwv/edit?usp=drive_link">disini</a> </ul>
                                <ul>Surat Pernyataan Kebenaran Data <a href="https://docs.google.com/document/d/1cuC4aYbyCUrJ_s2Om29FRL_3zEJYEXve/edit?usp=drive_link">disini</a> </ul>
                            </p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>
