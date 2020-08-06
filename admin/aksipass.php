<?php
session_start();

    echo "<h1>Ganti Password</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=password.php>
<div class='form-group'>
    <label>Masukkan Password Lama<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='pass_lama' value='' place-holder=''awdawdwadwd/>
</div>
<div class='form-group'>
    <label>Masukkan Password Baru<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='pass_baru' value=''/>
</div><div class='form-group'>
    <label>Masukkan Lagi Password Baru</label>
      <input class='form-control' type='text' name='pass_ulangi' value=''/>
</div>
<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

?>

