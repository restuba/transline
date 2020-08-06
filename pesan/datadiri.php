<?php
    $kursi = $_POST['kursi'];
    $trayek_kode = $_POST['trayek_kode'];
    $tanggal = $_POST['tanggal'];
 ?>
<form class="" action="pesan.php?tahap=3" method="post">
    <input type="hidden" name="trayek_kode" value="<?php echo $trayek_kode;?>"/>
    <input type="hidden" name="tanggal" value="<?php echo $tanggal;?>"/>
    <?php
    foreach ($kursi as $key) {
    ?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $key; ?>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="kursi[]" value="<?php echo $key ?>">
                    <div class="form-group form-inline">
                        <input required class="form-control" type="text" name="nama[]" placeholder="Nama" />
                        <input required class="form-control" type="text" name="hp[]" placeholder="No Hp" />
                        <input required class="form-control" type="email" name="email[]" placeholder="Email" />
                    </div>

                    <div class="form-group">
                        <input required class="form-control" type="text" name="alamat[]" placeholder="Alamat" / width="10em">
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <a href="index.php"><button type="button" class="btn btn-danger">Batal</button></a>
    <button type="submit" class="btn btn-warning"">Lanjutkan</button>
</form>
