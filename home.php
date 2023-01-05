<?php
include('cdn.html');
require('config.php');

$sql_mhs = "SELECT * FROM mahasiswa";
$mhs = mysqli_query($conn, $sql_mhs);

$sql_dsn = "SELECT * FROM dosen";
$dsn = mysqli_query($conn, $sql_dsn);

$sql_matkul = "SELECT * FROM matkul";
$mtkl = mysqli_query($conn, $sql_matkul);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALO DUNIA</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-3 mb-3">SISTEM KRS UIN SUKA</h3>
        <div class="text-center">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#mahasiswa">MAHASISWA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#dosen">DOSEN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#matkul">MATA KULIAH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#jadwal">JADWAL</a>
                        </li>
                    </ul>

                    <!-- MAHASISWA -->
                    <div class="tab-content">
                        <div id="mahasiswa" class="container tab-pane active">
                            <div class="mt-3">
                                <h3 class="text-center">Data Mahasiswa</h3>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary pull-right" onclick="addmhs()">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                            <table class="table table-striped table-bordered" id="tablemahasiswa">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($mhs->num_rows > 0) {
                                        while ($row = $mhs->fetch_assoc()) {
                                            echo "
                                                <tr>
                                                    <td>" . $no++ . "</td>
                                                    <td>" . $row['nim'] . "</td>
                                                    <td>" . $row['nama'] . "</td>
                                                    <td>" . $row['status'] . "</td>
                                                    <td>
                                                        <a class='btn btn-primary btn-sm' href=''>
                                                            <i class='bi bi-pencil-square'></i>
                                                            Edit
                                                        </a>
                                                        <a class='btn btn-danger btn-sm' href=''>
                                                            <i class='bi bi-trash-fill'></i>
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- DOSEN -->

                        <div id="dosen" class="container tab-pane">
                            <div class="mt-3">
                                <h3 class="text-center">Data Dosen</h3>
                            </div>
                            <table class="table table-striped table-bordered" id="tabledosen">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($dsn->num_rows > 0) {
                                        while ($dosen = $dsn->fetch_assoc()) {
                                            echo "
                                                <tr>
                                                    <td>" . $no++ . "</td>
                                                    <td>" . $dosen['nip'] . "</td>
                                                    <td>" . $dosen['name'] . "</td>
                                                </tr>
                                            ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- MATKUL -->

                        <div id="matkul" class="container tab-pane">
                            <div class="mt-3">
                                <h3 class="text-center">Data Mata Kuliah</h3>
                            </div>
                            <table class="table table-striped table-bordered" id="tablematkul">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Mata Kuliah</th>
                                        <th class="text-center">Semester</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($mtkl->num_rows > 0) {
                                        while ($matkul = $mtkl->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $matkul['nama_matkul'] ?></td>
                                                <td><?= $matkul['semester'] ?></td>
                                                <td><?= $matkul['status'] ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- JADWAL -->

                        <div id="jadwal" class="container tab-pane">
                            <div class="mt-3">
                                <h3 class="text-center">Data Jadwal</h3>
                            </div>
                            <table class="table table-striped table-bordered" id="tablejadwal">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD MAHASISWA -->
    <div class="modal" tabindex="-1" id="modalMhs">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var modalMhs = $('#modalMhs');

    $(document).ready(function() {
        $('#tablemahasiswa').DataTable();
        $('#tabledosen').DataTable();
        $('#tablematkul').DataTable();
        $('#tablejadwal').DataTable();
    });

    function addmhs() {
        modalMhs.modal('show');
    }
</script>