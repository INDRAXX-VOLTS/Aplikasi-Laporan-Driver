<?php $this->extend('layout/template'); ?>

<?php $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver</title>
    <a href="<?= site_url('tambah_driver') ?>" class="btn btn-primary mb-3">Tambah Driver</a>
    <style>
        /* Your custom CSS styles can go here */
    </style>
</head>
<body>
    <h1>Driver</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">id_Driver</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($driver as $index => $driver1): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $driver1['id_Driver'] ?></td>
                    <td><?= $driver1['username'] ?></td>
                    <td><?= $driver1['password'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php $this->endSection() ?>

