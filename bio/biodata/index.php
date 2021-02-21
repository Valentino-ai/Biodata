<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Biodata</title>
    <link href="css/utama.scss" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&amp;display=swap" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="KeyFrames/vendor/bootstrap/css/bootstrap.min.css">
  </head>

  <body>
    <!-- Script dibawah untuk menghilangkan konten form -->
    <?php if(isset($_POST['Submit'])):?>
     <div class="hilang"><header/></div>
   <?php else:?>
   <div class="muncul">
    <header>
     <!-- script gak jadi tapi penting -->
     <!--<span class="tombolBody slide-fwd-center"><h2 href="proses.php"> Mulai </h2></div>-->

     <!-- Form -->
     <div class="judul-wrapper">
       <div class="judul-text"> Biodata
        <div class="mini"> Created by : Ilham RPL 3.
       </div>
     </div>
      <br>
     <div class="biodata-wrapper">
     <div class="data-text">Mohon isi data diri anda dibawah ini : </div>
       <br/>

        <form action="" method="post" enctype="multipart/form-data">
         <div class="wrap-input100">
 					 <input class="input100" type="text" name="nama" placeholder="Nama" required="required">
 						<span class="focus-input100"></span>
             <span class="symbol-input100">
							  <i class="fa fa-envelope" aria-hidden="true"></i>
						  </span>

          </div>

          <div class="wrap-input100">
            <input class="input100" type="text" name="absen" placeholder="No. Absen" required="required">
              <span class="focus-input100"></span>
               <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
               </span>

          </div>

          <!-- Bisa dirubah berbasis Array atau data-->
          <div class="data-teks">Kelas </div>
           <div class="select">
             <select name="getKelas" required="required">
              <option></option>
              <option name="TKJ">TKJ</option>
              <option name="RPL">RPL</option>
              <option name="Multimedia">Multimedia</option>
              <option name="Animasi">Animasi</option>
              <option name="DKV">DKV</option>
             </select>
             <span class="focus"></span>
           </div>

           <hr></hr>
           <div class="wrap-input100">
 					 <input class="input100" type="text" name="alamat" placeholder="Alamat">
 						<span class="focus-input100"></span>
             <span class="symbol-input100">
							  <i class="fa fa-envelope" aria-hidden="true"></i>
						  </span>

          </div>

          <div class="wrap-input100">
 					 <input class="input100" type="text" name="noHp" placeholder="No. HP" required="required">
 						<span class="focus-input100"></span>
             <span class="symbol-input100">
							  <i class="fa fa-envelope" aria-hidden="true"></i>
						  </span>

          </div>

          <div class="wrap-input100">
 					 <input class="input100" type="text" name="hobi" placeholder="Hobi" required="required">
 						<span class="focus-input100"></span>
             <span class="symbol-input100">
							  <i class="fa fa-envelope" aria-hidden="true"></i>
						  </span>

          </div>

          <div class="wrap-input100">
 					 <input class="input100" type="text" name="citacita" placeholder="Cita-Cita" required="required">
 						<span class="focus-input100"></span>
             <span class="symbol-input100">
							  <i class="fa fa-envelope" aria-hidden="true"></i>
						  </span>
          </div>
          <div class="data-teks">Foto Profil </div>
          <label class="custom-file-upload">
           <input type="file" name="fotoProfil" value="Pilih Foto"/>
          </label>

          <div class="container-login100-form-btn">
						<button class="login100-form-btn" name="Submit" value="Submit">
              Submit
						</button>
					</div>
        </form>
     </div>
    </header>
  </div>
    <?php endif ?>

    <!-- Profil Page -->
     <?php if(isset($_POST['Submit'])):?>

       <?php $userName = $_POST['nama'];?>
       <?php $noAbsen = $_POST['absen'];?>
       <?php $kelas = $_POST['getKelas'];?>
       <?php $nomerHp = $_POST['noHp'];?>
       <?php $hobi = $_POST['hobi'];?>
       <?php $cita2 = $_POST['citacita'];?>

       <!-- SCRIPT DIBAWAH TIDAK BERJALAN DENGAN BENAR -->
       <!-- AlterCourse Ubah jadi fitur pengubah nama file dan import file ke '/biodata/gambar/' Sebagai substitusi dari Database (MySql)? -->

       <?php $imgFile = $_FILES['fotoProfil']['name'];?>
       <?php $tmp_dir = $_FILES['fotoProfil']['tmp_name'];?>
       <?php $imgSize = $_FILES['fotoProfil']['size'];?>

       <?php if(!empty($imgFile)):?>
        <?php $upload_dir = "gambar/";?>
        <?php $imgExt =  strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); ?>
        <?php $valid_extension = array('jpeg', 'jpg', 'png', 'gif');?>
        <?php foreach($valid_extension as $valid_extensions):?>
          <?php endforeach ?>
        <?php $coverpic = $userName."_".$nomerHp. ".". $imgExt;?>
        <?php if(in_array($imgExt, $valid_extension)): ?>
         <?php if($imgSize < 5000000): ?>
           <?php move_uploaded_file($tmp_dir, $upload_dir.$coverpic); ?>
           <?php $images = glob($upload_dir. $imgFile. ".".$valid_extensions);?>
           <?php foreach($images as $image):?>
            <div class="muncul"><?php   echo '<img src="'.$image.'" /><br />';?></div>
          <?php endforeach ?>
         <?php endif ?>
         <!-- Berhubung Gambar tidak bisa keluar jadi kode dibawah tidak irrelevant, termasuk 5 baris keatas -->
         <?php else: ?>
           <?php echo "Seharusnya disini Keluar Gambarnya"; ?>
         <?php endif ?>
         <?php else: ?>
           <?php echo "Seharusnya disini Keluar Gambarnya";?>
        <?php endif ?>

       <div class="footer-content">
        <div class="biodata-content">
         <?php echo 'Selamat Datang ' .$userName. ' Dari Kelas '.$kelas. '. Oh iya, Anda menuliskan hobby dan cita-cita anda seperti dibawah ini bukan? ';?>
          <br/>
         <?php echo 'Hobi saya '.$hobi. ' Dan Cita cita saya ialah '. $cita2. '.';?>
         <br/><br/>
         <?php echo 'PS : Foto yang anda kirim telah disimpan pada folder /bioadata/gambar dengan nomor telepon anda sebagai nama filenya.';?>
       </div>
      <?php endif ?>
    </div>



   <!--===============================================================-->
	 <script src="KeyFrames/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="KeyFrames/vendor/tilt/tilt.jquery.min.js"></script>
	   <script>
		  $('.js-tilt').tilt({
		 	 scale: 1.1
		  })
	   </script>
   <script src="KeyFrames/vendor/js/main.js"></script>
 </body>
</html>
