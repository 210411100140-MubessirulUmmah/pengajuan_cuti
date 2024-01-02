<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("fakultas/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('edit')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Diedit!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Diedit !",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Dihapus !",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Status Cuti Berhasil Diubah!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Status Cuti Gagal Diubah!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("fakultas/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("fakultas/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cuti</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
            
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Cuti Mahasiswa</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>NPM</th>
                                                <th>Nama Lengkap</th>
                                                <th>Prodi</th>
                                                <th>Fakultas</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Perihal Cuti</th>
                                                <th>Alasan Diterima</th>
                                                <th>Cetak</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                        $no = 0;
                                        foreach($cuti as $i)
                                        :
                                        $no++;
                                        $id_cuti = $i['id_cuti'];
                                        $id_user = $i['id_user'];
                                        $npm = $i['username'];
                                        $nama_lengkap = $i['nama_lengkap'];
                                        $prodi = $i['prodi'];
                                        $tgl_diajukan = $i['tgl_diajukan'];
                                        $mulai = $i['mulai'];
                                        $berakhir = $i['berakhir'];
                                        $alasan_verifikasi = $i['alasan_verifikasi'];
                                        $fakultas = $i['fakultas'];
                                        $surat_kebenaran = $i['surat_kebenaran'];
                                        $id_status_cuti = $i['id_status_cuti'];
                                        $perihal_cuti = $i['perihal_cuti'];

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $npm ?></td>
                                                <td><?= $nama_lengkap ?></td>
                                                <td><?= $prodi ?></td>
                                                <td><?= $fakultas ?></td>
                                                <td><?= $tgl_diajukan ?></td>
                                                <td><?= $mulai ?></td>
                                                <td><?= $berakhir ?></td>
                                                <td><?=$perihal_cuti?></td>
                                                <td><?= $alasan_verifikasi?></td>
                                                <td>
                                                    <a href="<?= base_url();?>Cetak/surat_cuti_pdf/<?=$id_cuti?>"
                                                        target="_blank" class="btn btn-info">
                                                        Cetak Surat
                                                    </a>
                                                </td>
                                                
                                                


                                            </tr>
                                            <!-- Modal Edit Cuti -->
                                            <div class="modal fade" id="edit<?= $id_cuti ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Cuti
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Cuti/edit_cuti_admin"
                                                                method="POST">
                                                                <input type="text" value="<?=$id_cuti?>" name="id_cuti"
                                                                    hidden>
                                                
                                                                <p>Status Pembayaran</p>
                                                                <select name="bukti_pembayaran" class="form-control" required>
                                                                    <option value="<?=$bukti_pembayaran?>"><?=$bukti_pembayaran?></option>
                                                                    <option value="Lunas">Lunas</option>
                                                                    <option value="Belum Lunas">Belum Lunas</option>
                                                                </select><br>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus Cuti -->
                                            <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
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

    <?php $this->load->view("fakultas/components/js.php") ?>
</body>

</html>