<?php

    $trayek_kode = $_POST['trayek_kode'];
    $tanggal = $_POST['tanggal'];

    $query = 'SELECT kursi FROM tbpesan WHERE trayek_kode = :kode AND tanggal = :tanggal AND waktupesan > DATE_SUB(NOW(), INTERVAL 3 HOUR) AND konfirmasi=0';
    $hasil = $db->prepare($query);
    $hasil->bindParam(':kode', $trayek_kode);
    $hasil->bindParam(':tanggal', $tanggal);
    $hasil->execute();
    $data = $hasil->fetchAll();

    $jumlahKursi = 9; 
    $kursiTersedia = $jumlahKursi - sizeof($data);
    function checkdisabled($value)
    {
        global $data;

        foreach ($data as $key) {
            if ($value == $key['kursi']) {
                echo "disabled =''";            }
        }
    }
    
?>
<form class="" action="pesan.php?tahap=2" method="post">
    <input type="hidden" name="trayek_kode" value="<?php echo $trayek_kode;?>"/>
    <input type="hidden" name="tanggal" value="<?php echo $tanggal;?>"/>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">Tersedia</div>
              <div class="panel-body">
                <?php echo $kursiTersedia; ?> Kursi
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">Pilih Kursi Anda</div>
              <div class="panel-body">
                  <table class="table table-bordered">
                      <tr>
                          <td>
                              <input type="checkbox" name="kursi[]" value="1A" <?php checkdisabled('1A')?> >&nbsp;1A
                              <input type="checkbox" name="kursi[]" value="1B" disabled="">Sopir
                          </td>
                          
                         
                      </tr>

                      <tr>
                          <td>
                              <input type="checkbox" name="kursi[]" value="2A" <?php checkdisabled('2A')?>>&nbsp;2A
                              <input type="checkbox" name="kursi[]" value="2B" <?php checkdisabled('2B')?>>&nbsp;2B
                          </td>
                         
                          
                      </tr>

                      <tr>
                          <td>
                              <input type="checkbox" name="kursi[]" value="3A" <?php checkdisabled( '3A')?>>&nbsp;3A
                              <input type="checkbox" name="kursi[]" value="3B" <?php checkdisabled( '3B')?>>&nbsp;3B
                          </td>
                          
                      </tr>

                   

                      <tr>
                          <td>
                              <input type="checkbox" name="kursi[]" value="6A" <?php checkdisabled( '6A')?>>&nbsp;6A
                              <input type="checkbox" name="kursi[]" value="6B" <?php checkdisabled( '6B')?>>&nbsp;6B
                          </td>
                        
                          
                      </tr>

                      <tr>
                          <td>
                              <input type="checkbox" name="kursi[]" value="7A" <?php checkdisabled( '7A')?>>&nbsp;7A
                              <input type="checkbox" name="kursi[]" value="7B" <?php checkdisabled( '7B')?>>&nbsp;7B
                          </td>
                          
                      </tr>

                      
                  </table>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">Aksi</div>
              <div class="panel-body">
                <a href="index.php"><button type="button" class="btn btn-danger">Batal</button></a>
                <button type="submit" class="btn btn-warning">Lanjutkan</button>
              </div>
            </div>
        </div>
    </div>
</form>
