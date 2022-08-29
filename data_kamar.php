<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

include('koneksi_database.php');


?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CMS Puskesmas - Data Kamar</title>

        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="cms-puskesmas-admin-portal.php">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-plus-square"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">CMS Puskesmas</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="cms-puskesmas-admin-portal.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Home</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="data_pasien.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pasien</span>
                    </a>
                    <a class="nav-link" href="data_dokter.php">
                        <i class="fas fa-fw fa-user-md"></i>
                        <span>Data Dokter</span>
                    </a>
                    <a class="nav-link" href="data_layanan.php">
                        <i class="fas fa-fw fa-paper-plane"></i>
                        <span>Data Layanan</span>
                    </a>
                    <a class="nav-link" href="data_obat.php">
                        <i class="fas fa-fw fa-medkit"></i>
                        <span>Data Obat</span>
                    </a>
                    <a class="nav-link" href="data_kamar.php">
                        <i class="fas fa-fw fa-bed"></i>
                        <span>Data Kamar</span>
                    </a>
                    <a class="nav-link" href="data_rekaman_medis.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Rekaman Medis</span>
                    </a>
                </li>


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo "<span class='mr-2 d-none d-lg-inline text-gray-600 small'>" . $_SESSION['username'] . "</span>";?>
                                    <?php 
                                        $username = $_SESSION['username'];
                                        $query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
                                    ?>
                                    <?php $d = mysqli_fetch_array($query);?>
                                    <img class="img-profile rounded-circle" src="assets/uploaded_pics/<?php echo $d['image'];?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Content Row -->

                        <div class="row">
                            <!-- Area data kamar -->
                            <div class="col-xl-12 col-lg-7">

                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        Data Kamar
                                        <div class="bg-success text-white">
                                            <a href="tambah_data_kamar.php" class="btn btn-md btn-primary float-right">Tambah</a>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <!--ALERT MESSAGE-->
                                        <?php 
                                            if(isset($_GET['alert'])){
                                                if($_GET['alert']=='berhasil_ditambah'){
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h4><i class="icon fa fa-check"></i> Success</h4>
                                                        Berhasil ditambah
                                                    </div>								
                                                    <?php
                                                }elseif($_GET['alert']=="berhasil"){
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h4><i class="icon fa fa-check"></i> Success</h4>
                                                        Berhasil disimpan
                                                    </div> 								
                                                    <?php
                                                }elseif($_GET['alert']=="berhasil_dihapus"){
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h4><i class="icon fa fa-check"></i> Success</h4>
                                                        Berhasil dihapus
                                                    </div>
                                                    <?php
                                                }else if($_GET['alert']=="gagal_dihapus"){
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h4><i class="icon fa fa-exclamation-triangle"></i> Peringat!</h4>
                                                        Gagal dihapus
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        ?>

                                        <table id="tabel-kamar" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Kode Kamar</th>
                                                    <th>Jenis Kamar</th>
                                                    <th>Tarif Per Malam</th>
                                                    <th>Fasilitas</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $batas = 10;
                                                    $halaman = ISSET($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                                    $halaman_awal = ($halaman>1) ? ($halaman*$batas) - $batas : 0;			
                                                    
                                                    $previous = $halaman - 1;
                                                    $next = $halaman + 1;
                                                    
                                                    $data = mysqli_query($conn,"SELECT * FROM kamar");
                                                    $jumlah_data = mysqli_num_rows($data);
                                                    $total_halaman = ceil($jumlah_data / $batas);

                                                    $data_kamar = mysqli_query($conn, "SELECT * FROM kamar LIMIT $halaman_awal, $batas");

                                                    $nomor = $halaman_awal+1;


                                                    while($d = mysqli_fetch_array($data_kamar)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $d['kode_kamar']; ?></td>
                                                            <td><?php echo $d['jenis_kamar']; ?></td>
                                                            <td><?php echo "Rp. " . number_format($d['tarif_permalam'],2);?></td>
                                                            <td><?php echo $d['fasilitas'];?></td>
                                                            <!--action-->
                                                            <td>
                                                                <a href="#" class="btn btn-md btn-primary text-white" data-toggle="modal" data-target="#modalViewKamar<?php echo $d['kode_kamar'];?>"><span class="fas fa-fw fa-eye"></span></a>
                                                                <a href="#" class="btn btn-md btn-success text-white" data-toggle="modal" data-target="#modalKamar<?php echo $d['kode_kamar'];?>"><span class="fas fa-fw fa-edit"></span></a>
                                                                <a href="#" class="btn btn-md btn-danger text-white" data-toggle="modal" data-target="#modalDeleteKamar<?php echo $d['kode_kamar']; ?>"><span class="fas fa-fw fa-trash"></span></a>
                                                            </td>
                                                        </tr>


                                                        <!-- Modal view Data Kamar -->
                                                        <div class="modal fade" id="modalViewKamar<?php echo $d['kode_kamar']; ?>" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!--Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">View Data Kamar</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        
                                                                            <?php
                                                                                $kamarid = $d['kode_kamar'];

                                                                                $query_edit = mysqli_query($conn, "SELECT * FROM kamar WHERE kode_kamar='$kamarid'");
                                                                                while($row = mysqli_fetch_array($query_edit)){
                                                                                ?>
                                                                                    <p>Kode Kamar: <?php echo $d['kode_kamar'];?></p>
                                                                                    <p>Jenis Kamar: <?php echo $d['jenis_kamar'];?></p>
                                                                                    <p>Tarif: <?php echo "Rp. " . number_format($row['tarif_permalam'],2);?></p>
                                                                                    <p>Fasilitas: <?php echo $d['fasilitas'];?></p>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                                                    </div>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Modal update Data Obat -->
                                                        <div class="modal fade" id="modalKamar<?php echo $d['kode_kamar']; ?>" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!--Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Update Data Kamar</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="action_edit_kamar.php" method="POST" enctype="multipart/form-data">
                                                                            <?php
                                                                                $kamarid = $d['kode_kamar'];

                                                                                $query_edit = mysqli_query($conn, "SELECT * FROM kamar WHERE kode_kamar='$kamarid'");
                                                                                while($row = mysqli_fetch_array($query_edit)){
                                                                                ?>
                                                                                    <div class="form-group">
                                                                                        <label>Kode Kamar</label>
                                                                                        <input type="text" readonly name="kamar_id" class="form-control" value="<?php echo $row['kode_kamar'];?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Jenis Kamar</label>
                                                                                        <input type="text" name="jenis_kam" class="form-control" value="<?php echo $row['jenis_kamar']; ?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Tarif Per Malam</label>
                                                                                        <input type="text" name="tarifperm" class="form-control" value="<?php echo $row['tarif_permalam'] ?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Fasilitas</label>
                                                                                        <input type="text" name="fasilitas_kam" class="form-control" value="<?php echo $row['fasilitas']; ?>" required>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit" class="btn btn-success">Update</button>
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                                    </div>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Modal delete Data Kamar -->
                                                        <div class="modal fade" id="modalDeleteKamar<?php echo $d['kode_kamar']; ?>" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!--Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Delete Data Kamar</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="action_delete_obat.php" method="GET">
                                                                            <p>Apakah kamu yakin untuk menghapus data ini?</p>
                                                                            <div class="modal-footer">
                                                                                <a class="btn btn-danger" name="delete_kamar" href="action_delete_kamar.php?kode_kamar=<?php echo $d['kode_kamar'];?>">Delete</a>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }

                                                    ?>
                                            </tbody>
                                        </table>
                                        <!--pagination-->
                                        <nav>
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item">
                                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'";}?>>Previous</a>
                                                </li>
                                                <?php
                                                    for($x=1;$x<=$total_halaman;$x++){
                                                        ?> 
                                                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                        <?php
                                                    }
                                                ?>		
                                                <li class="page-item">
                                                <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'";} ?>>Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&copy; 
                                <?php
                                    $copyYear = 2022;
                                    $currYear = date('Y');
                                    echo $copyYear . (($copyYear != $currYear) ? '-' . $currYear : '');
                                ?>
                                CMS Puskesmas
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" di bawah ini jika kamu siap untuk akhiri sesi.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets/js/demo/chart-area-demo.js"></script>
        <script src="assets/js/demo/chart-pie-demo.js"></script>

    </body>

</html>