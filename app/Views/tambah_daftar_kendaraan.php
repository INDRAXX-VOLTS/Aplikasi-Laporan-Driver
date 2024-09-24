<!-- Example view file -->
<!-- app/Views/tambah_daftar_kendaraan.php -->

<?php $this->extend('layout/template'); ?>

<?php $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar Kendaraan</title>
    <style>
        /* Your custom CSS styles can go here */
    </style>
</head>
<body>
    <h1>Form Tambah Daftar Kendaraan</h1>
    <form action="/add_kendaraan" class="container pt-4" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="jenis_kendaraan">Jenis Kendaraan:</label>
            <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
        </div>
        <div  class="form-group pt-3">
            <label for="nama_kendaraan">Nama Kendaraan:</label>
            <input type="text" id="nama_kendaraan"  class="form-control"  name="nama_kendaraan" required>
        </div>
        <div   class="form-group pt-3">
            <label for="bp_kendaraan">BP Kendaraan:</label>
            <input type="text" id="bp_kendaraan"  class="form-control"  name="bp_kendaraan" required>
        </div>
        <div   class="form-group pt-3">
            <label for="foto_kendaraan">Foto Kendaraan:</label>
            <input type="file" id="foto_kendaraan"  class="form-control"  name="foto_kendaraan" required>
        </div><br>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</body>
</html>

<?php $this->endSection() ?>
