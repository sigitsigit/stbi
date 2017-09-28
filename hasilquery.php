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
      <h1> </h1>
      <p> </p>
      <hr>
      <h3>Hasil Dari Pencarian</h3>
       <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama File</th>
        <th>Token</th>
        <th>Tokenstem</th>
      </tr>
    </thead>



 <?php
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbstbi";
$katakunci="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=$_POST['katakunci'];
$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
//$sql = "SELECT distinct nama_file,token FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil')";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>
    <tbody>
      <tr>
        <td><?php echo "" . $row["nama_file"].""?></td>
        <td><?php echo "" . $row["token"].""?></td>
        <td><?php echo "" . $row["tokenstem"].""?></td>
      </tr>
    </tbody>

    	<?php
      
    }
} else {
    echo "0 results";
}
$conn->close();

///

?>
</table>
  </div>
     
   <?php include 'kelompok.php' ?>
   <?php include 'footer.php' ?>