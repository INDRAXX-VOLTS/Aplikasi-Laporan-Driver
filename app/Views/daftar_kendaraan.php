<!-- Example view file -->
<!-- app/Views/daftar_kendaraan.php -->

<?php $this->extend('layout/template'); ?>

<?php $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModals">Tambah Daftar Kendaraan</a>
    <style>
        /* Your custom CSS styles can go here */
    </style>
</head>
<body>
    <h1>Daftar Kendaraan</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis Kendaraan</th>
                <th scope="col">Nama Kendaraan</th>
                <th scope="col">BP Kendaraan</th>
                <th scope="col">Foto Kendaraan</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;foreach ($daftar_kendaraan as $index => $kendaraan): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $kendaraan['jenis_kendaraan'] ?></td>
                    <td><?= $kendaraan['nama_kendaraan'] ?></td>
                    <td><?= $kendaraan['bp_kendaraan'] ?></td>
                    <td>
                      <?php $z = explode(",",$kendaraan['foto_kendaraan']);foreach($z as $gambar){ if(strlen($gambar)<5){break;}?>
                      <img src="/uploads/<?= esc( $gambar ) ?>" width="100px" alt="Gambar">
                      <?php }?>
                    </td>
                    <td><?= $kendaraan['status'] ?></td>
                    <td align="center"><button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss<?=$i;?>">Edit</button></td>
                    <td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals<?=$i;?>">Delete</button></td>
                </tr>
                    <div class="modal fade" id="exampleModals<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="<?=site_url('delete_kendaraan')?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data </h5>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="text" value="<?= $kendaraan['id']; ?>" name="del"style="display:none">
                            <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    
                    <div class="modal fade" id="exampleModalss<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="<?=site_url('edit_kendaraan')?>" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Data </h5>
                          </div>
      
      
                          <div class="modal-body"> 
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jenis Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="jenis_kendaraan" class="form-control" placeholder=""  value="<?= $kendaraan['jenis_kendaraan'] ?>" required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="nama_kendaraan" class="form-control" placeholder="" value="<?=$kendaraan['nama_kendaraan']?>" required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">BP Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="bp_kendaraan" class="form-control" placeholder="" value="<?=$kendaraan['bp_kendaraan']?>" required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Status</label>
                            <div class="col-sm-6">
                                <select name="status" class="form-control" placeholder=""  required>
                                  <option value="Tidak Dipakai">Tidak Dipakai</option>
                                  <option value="Dipakai">Dipakai</option>
                                </select >
                            </div>
                            </div>  
                            
                              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text" value="<?= $kendaraan['id']; ?>" name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-warning" value="EDIT">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
            <?php $i++;endforeach; ?>
        </tbody>
    </table>
    
    <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="<?=site_url('add_kendaraan')?>" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                          </div>
      
      
                          <div class="modal-body"> 
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jenis Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="jenis_kendaraan" class="form-control" placeholder=""   required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Nama Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="nama_kendaraan" class="form-control" placeholder=""  required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">BP Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="" name="bp_kendaraan" class="form-control" placeholder=""  required>
                            </div>
                            </div> 
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Status</label>
                            <div class="col-sm-6">
                                <select name="status" class="form-control" placeholder=""  required>
                                  <option value="Tidak Dipakai">Tidak Dipakai</option>
                                  <option value="Dipakai">Dipakai</option>
                                </select >
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Foto Kendaraan <small>(4:3)</small></label>
                            <div class="col-sm-6">
                                <input type="file" name="foto_kendaraan[]" class="form-control" placeholder="" required multiple>
                            </div>
                            </div>  
                              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text"  name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-primary" value="ADD">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
</body>
</html>

<?php $this->endSection() ?>
