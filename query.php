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
      <h1>Pencarian kata kunci</h1>
      <p></p>
      <hr>
      <h3>Test</h3>

<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
Keyword : <br>
<input type="text" name="katakunci">
<input type=submit>
</form>

  </div>
     
   <?php include 'kelompok.php' ?>
   <?php include 'footer.php' ?>