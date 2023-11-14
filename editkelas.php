<?php
    include_once('config.php');
    //ini proses select data
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id != ""){
        $sel = mysqli_query($conn, "select * from tbkelas where idkelas=$id");
        $data = mysqli_fetch_array($sel);
    }

    //ini proses update data
    if(isset($_POST['update'])){
        extract($_POST);
        $up = mysqli_query($conn,"update tbkelas set nama_kelas='$nama_kelas', jurusan='$jurusan' where idkelas=$id");
        if($up){
            ?>
                 <script>
                    alert('Update Berhasil');
                 location.href='?hal=tampilkelas';
            </script>
         <?php
        }
    }
 ?>   
<a href="?hal=tampilkelas">Kembali ke Tampil Kelas</a>
<br>
<br>
<form action="?hal=editkelas" method="post">
      <table>
             <input type="hidden" name="id" value="<?=$data['idkelas']?>">
             <tr>
                <td>Nama Kelas</td>
                <td>
                    <input type="text" value="<?=$data['nama_kelas']?>"name="nama_kelas" placeholder="Nama_kelas" required>
                         </td>    
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>
                     <select name="jurusan" required>
                             <option> value="">==pilih jurusan==</option>
                             <option <?=$data['jurusan']=='akuntansi'?'selected':''?> value="akuntansi">akuntansi</option>
                             <option <?=$data['jurusan']=='manajemen perkantoran'?'selected':''?> value="manajemen perkantoran">manajemen perkantoran</option> 
                             <option <?=$data['jurusan']=='bisnis daring'?'selected':''?> value="bisnis daring">bisnis daring</option>
                             <option <?=$data['jurusan']=='desain komunikasi visual'?'selected':''?> value="desain komunikasi visual">desain komunikasi visual</option>
                             <option <?=$data['jurusan']=='rekayasa perangkat lunak'?'selected':''?> value="rekayasa perangkat lunak">rekayasa perangkat lunak</option>
                        </select> 
                      </td>
                </tr>
                <tr>
                      <td>
                            <button type="submit" name="update" value="simpan">Simpan</button>
                        </td>
                        <td>
                        <button type="reset">Reset</button>
                    </td>
                </td>
                </tr>
            </table>

        </form>
  