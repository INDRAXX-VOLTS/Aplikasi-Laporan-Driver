<!-- Example view file -->
<!-- app/Views/driver.php -->

<?php $this->extend('layout/template'); ?>

<?php $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver</title>
    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModals">Tambah Driver</a>
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
                <th scope="col">ID Driver</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; foreach ($drivers as $index => $driver): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $driver['id_driver'] ?></td>
                    <td><?= $driver['username'] ?></td>
                    <td><?= $driver['password'] ?></td> <!-- Display plaintext password -->
                    <td align="center">
                        <button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss<?=$i;?>">Edit</button>
                    </td>
                    <td align="center">
                        <button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals<?=$i;?>">Delete</button>
                    </td>
                </tr>
                <div class="modal fade" id="exampleModals<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="<?=site_url('delete_driver')?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="text" value="<?= $driver['id']; ?>" name="del" style="display:none">
                                    <input type="submit" class="btn btn-sm bg-danger" value="DELETE">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalss<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="<?=site_url('edit_driver')?>" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">EDIT Data</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row" style="margin-left:-120px;">
                                        <label class="col-sm-2 col-form-label" style="margin-left: 150px;">ID Driver</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="id_driver" class="form-control" value="<?= $driver['id_driver'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-left:-120px;">
                                        <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control" value="<?=$driver['username']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-left:-120px;">
                                        <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Password</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="password" class="form-control" value="<?=$driver['password']?>" required> <!-- Display plaintext password -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="text" value="<?= $driver['id']; ?>" name="del" style="display:none">
                                    <input type="submit" class="btn btn-sm bg-warning" value="EDIT">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?=site_url('add_driver')?>" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">ID Driver</label>
                            <div class="col-sm-6">
                                <input type="text" name="id_driver" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Username</label>
                            <div class="col-sm-6">
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Password</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="text" value="" name="del" style="display:none">
                        <input type="submit" class="btn btn-sm bg-primary" value="ADD">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php $this->endSection() ?>
