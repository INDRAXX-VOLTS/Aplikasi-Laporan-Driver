<!-- Example view file -->
<!-- app/Views/laporan.php -->

<?php $this->extend('layout/template'); ?>

<?php $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Driver</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <style>
        @media print {
            img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <h1>Laporan Driver</h1>
    <?php if($role == 2) { ?>
        <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModals">Tambah Laporan Driver</a>
    <?php } ?>
    <button onclick="window.print()" class="btn btn-info mb-3">Print</button>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Driver</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kendaraan</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Foto</th>
                <th scope="col">Jarak Tempuh</th>
                <?php if($role==2){?><th scope="col">Edit</th><?php }?>
                <?php if($role==1){?><th scope="col">Delete</th><?php }?>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;foreach ($laporans as $index => $laporan): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $laporan['username'] ?></td>
                    <td><?= $laporan['tanggal'] ?></td>
                    <td><?= $laporan['nama_kendaraan'] ?></td>
                    <td><?= $laporan['tujuan'] ?></td>
                    <td>
                      <?php 
                      $z = explode(",",$laporan['foto']);
                      //print($laporan['foto']);
                      foreach($z as $gambar){ if(strlen($gambar)<5){break;}
                      ?>
                      <img src="/uploads/<?= esc( $gambar ) ?>" width="200px" alt="Gambar">
                      <?php }?>
                    </td>
                    <td><?= $laporan['jarak_tempuh'] ?></td>
                    <?php if($role==2){?><td align="center"><button type="button" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#exampleModalss<?=$i;?>">Edit</button></td><?php }?>
                    <?php if($role==1){?><td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals<?=$i;?>">Delete</button></td><?php }?>
                </tr>
                    <div class="modal fade" id="exampleModals<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="<?=site_url('delete_laporan')?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data </h5>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="text" value="<?= $laporan['lap']; ?>" name="del"style="display:none">
                            <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    
                    <div class="modal fade" id="exampleModalss<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="<?=site_url('edit_laporan')?>" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT Data </h5>
                          </div>
      
      
                          <div class="modal-body"> 
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Driver</label>
                            <div class="col-sm-6">
                                <input name="" class="form-control" value="<?=$username?>" placeholder=""   readonly>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Tanggal</label>
                            <div class="col-sm-6">
                                <input type="date" name="tanggal" class="form-control" placeholder="" value="<?=$laporan['tanggal']?>"   required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Kendaraan</label>
                            <div class="col-sm-6">
                                <select name="id_kendaraan" class="form-control" placeholder=""  required>
                                  <?php foreach($kendaraan as $k){?>
                                  <option value="<?=$k['id']?>"><?=$k['nama_kendaraan']?></option>
                                  <?php }?>
                                </select >
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jumlah Tujuan</label>
                            <div class="col-sm-6">
                                <input type="number" id="jumlah<?=$i?>" name="jumlah" class="form-control" placeholder=""  required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jarak Tempuh</label>
                            <div class="col-sm-6">
                                <input type="" name="jarak_tempuh" class="form-control" placeholder="" value="<?=$laporan['jarak_tempuh']?>" required>
                            </div>
                            </div> 
                              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="text" value="<?= $laporan['lap']; ?>" name="del"style="display:none">
                          <input  type="submit" class="btn btn-sm bg-warning" value="EDIT">
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                    <script>
                    $(document).ready(function(){
                        // Function to add input tag
                        $("#jumlah<?=$i?>").change(function(){
                            var total=$("#jumlah<?=$i?>").val();
                            var str="";
                            for(var i=0;i<total;i++){
                              str+='<div class="form-group row" style="margin-left:-120px;"><label class="col-sm-2 col-form-label" style="margin-left: 150px;">Tujuan '+(i+1)+'</label><div class="col-sm-6"><input type="" name="tujuan'+i+'" class="form-control" placeholder=""  required></div></div> ';
                              str+='<div class="form-group row" style="margin-left:-120px;"><label class="col-sm-2 col-form-label" style="margin-left: 150px;">Foto '+(i+1)+'</label><div class="col-sm-6"><input type="file" name="foto'+i+'" class="form-control" placeholder=""  required></div></div> ';
                            }
                            $("#group<?=$i?>").html(str);
                        });
                    });
                    </script>
            <?php $i++;endforeach; ?>
        </tbody>
    </table>
    
    <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <form method="post" action="<?=site_url('add_laporan')?>" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                          </div>
      
      
                          <div class="modal-body"> 
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Driver</label>
                            <div class="col-sm-6">
                                <input name="" class="form-control" value="<?=$username?>" placeholder=""   readonly>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Tanggal</label>
                            <div class="col-sm-6">
                                <input type="date" name="tanggal" class="form-control" placeholder=""   required>
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Kendaraan</label>
                            <div class="col-sm-6">
                                <select name="id_kendaraan" class="form-control" placeholder=""  required>
                                  <?php foreach($kendaraan as $k){?>
                                  <option value="<?=$k['id']?>"><?=$k['nama_kendaraan']?></option>
                                  <?php }?>
                                </select >
                            </div>
                            </div>  
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jumlah Tujuan</label>
                            <div class="col-sm-6">
                                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder=""  required>
                            </div>
                            </div>
                            <div id="group">
                            </div>
                            <div class="form-group row" style="margin-left:-120px;">
                            <label class="col-sm-2 col-form-label" style="margin-left: 150px;">Jarak Tempuh <small>(KM)</small></label>
                            <div class="col-sm-6">
                                <input type="number" name="jarak_tempuh" class="form-control" placeholder=""  required>
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
                    <script>
                    $(document).ready(function(){
                        // Function to add input tag
                        $("#jumlah").change(function(){
                            var total=$("#jumlah").val();
                            var str="";
                            for(var i=0;i<total;i++){
                              str+='<div class="form-group row" style="margin-left:-120px;"><label class="col-sm-2 col-form-label" style="margin-left: 150px;">Tujuan '+(i+1)+'</label><div class="col-sm-6"><input type="" name="tujuan'+i+'" class="form-control" placeholder=""  required></div></div> ';
                              str+='<div class="form-group row" style="margin-left:-120px;"><label class="col-sm-2 col-form-label" style="margin-left: 150px;">Foto '+(i+1)+'</label><div class="col-sm-6"><input type="file" name="foto'+i+'" class="form-control" placeholder=""  required></div></div> ';
                            }
                            $("#group").html(str);
                        });
                        
                        $('#example').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'csv', 'pdf',
                            ]
                        });
                    });
                    </script>
</body>
</html>

<?php $this->endSection() ?>
