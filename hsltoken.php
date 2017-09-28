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
      <h1>Hasil Tokenisasi</h1>
      <p></p>
      
       <table class="table table-bordered">
<thead>
      <tr>
        <th>Nama File</th>
       <th>Tokenisasi </th>
    <th> Stemming Porter </th>
    <th> Stemming Nazief Adriani</th>
      </tr>
    </thead>

    
     
    <?php
      // KONEKSI KE DATABASE
      include "connect.php";
 
      // JUMLAH DATA YANG DITAMPILKAN PER HALAMAN
      $dataPerPage = 10;
 
      // Apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut,
      // Sedangkan apabila belum, nomor halamannya 1.
      if(isset($_GET['page']))
      {
        $noPage = $_GET['page'];
      }
      else $noPage = 1;
 
      // Perhitungan offset
      $offset = ($noPage - 1) * $dataPerPage;
 
      
      echo "<h4>Halaman ".$noPage."</h4>";
 
      // MENGAMBIL DATA     
      $query = "SELECT * FROM dokumen ORDER BY dokid DESC LIMIT $offset, $dataPerPage";
 
      $result = mysql_query($query) or die('Error');
 
      // Penomoran Item
      $nomor=1;
      $nomor1 = 5 * $noPage;
 
      while($data = mysql_fetch_array($result))
        {
 
          if ($noPage <= 1)
            {
              $nomor++."";
            }
          else
            {     
              $nomor1++."";
            }
 
         
?>
          <tbody>
      <tr>
        <td><?php echo "" . $data["nama_file"].""?></td>
        <td><?php echo "" . $data["token"].""?></td>
        <td><?php echo "" . $data["tokenstem"].""?></td>
        <td><?php echo "" .$data["tokenstem2"].""?></td>
      </tr>
    </tbody>
        
  <?php
  }
      // Mencari jumlah semua data tabel 'alamat', kemudian simpan dalam variabel $jumData
        $query3   = "SELECT COUNT(*) AS jumData FROM dokumen";
        $hasil3  = mysql_query($query3);
        $data3    = mysql_fetch_array($hasil3);
 
        $jumData = $data3['jumData'];
        echo "<br><center>";
          if ($jumData > 5)
            {
 
              // Menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
              $jumPage = ceil($jumData/$dataPerPage);
 
              // Menampilkan link 'Sebelum'   
              if ($noPage > 1) 
 
              $query = "SELECT * FROM dokumen";
              $result = mysql_query($query) or die('Error');
 
              $data = mysql_fetch_array($result);
 
              echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'><< Sebelum</a>";
 
              // Menampilkan nomor halaman dan linknya
              for($page = 1; $page <= $jumPage; $page++)
              {
 
                if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
                {
 
                  if (($page == 1) && ($page != 2))  echo "<a href='#'>...</a>";
                  if ((($jumPage - 1)) && ($page == $jumPage))  echo "<a href='#'>...</a>";
                  if ($page == $noPage) echo " <a href='#'>".$page."</a>";
                  else echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a> ";
                  $showPage = $page;
                }
              }
 
              // Menampilkan link 'Sesudah'
              if ($noPage < $jumPage) 
              echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Sesudah >></a>";
            }
 
          else
            {
            }
 
        echo "</center>";       
    ?>       


    </div>
     

