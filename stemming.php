<?php include 'navbar.php' ?>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="unggah.php">Mengunggah file dengan format pdf</a></p>
     <p><a href="hsltoken.php">hasil tokenisasi</a></p>
     <p><a href="download.php">Download</a></p>
      <p><a href="query.php">Pencarian kata kunci</a></p>
      <p><a href="stemming.php">Stemming </a></p>
      <p><a href="hitungbobot.php">Hitung bobot </a></p>

     
     
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Stemming</h1>
      <p>Stemming (atau mungkin lebih tepatnya lemmatization?) adalah proses mengubah kata berimbuhan menjadi kata dasar. Aturan-aturan bahasa diterapkan untuk menanggalkan imbuhan-imbuhan itu.<br>
      Contohnya:<br>
      membetulkan -> betul<br>
      berpegangan -> pegang</p>
      <hr>
      <h3>Test</h3>

<?php
require_once('Enhanced_CS.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>STEMMING</title>
</head>
<body>
<h3>PENCARIAN KATA DASAR</h3>
<form method="post" action="">
<input type="text" name="kata" id="kata" size="20" value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
<input class="btnForm" type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['kata'])){
	$teksAsli = $_POST['kata'];
	echo "Teks asli : ".$teksAsli.'<br/>';
	$stemming = Enhanced_CS($teksAsli);
	echo "Kata dasar : ".$stemming.'<br/>';
}
?>
</body>
</html>

  </div>
     
   <?php include 'kelompok.php' ?>
   <?php include 'footer.php' ?>
