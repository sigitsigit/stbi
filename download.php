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
      <h1>Berikut file yang berhasil di unggah</h1>
      <p></p>
      <hr>
      <h3></h3>
      

      <html>
<title>Aplikasi Download</title>
<body>
<?php
  $konek = mysqli_connect("localhost","root","","dbstbi");

  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($konek, $query);

  while ($r = mysqli_fetch_array($hasil)){
    echo "Nama File : <b>$r[nama_file]</b> <br>";
    echo "Deskripsi : $r[deskripsi] <br>";
    echo "<a href=\"simpan.php?file=$r[nama_file]\">Download File</a><hr><br>";
  }
?>


 </div>
     
   <?php include 'kelompok.php' ?>
   <?php include 'footer.php' ?>

