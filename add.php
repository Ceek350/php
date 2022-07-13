<html>
<head>
<title>Data</title>
</head>
<body>

<?php
//koneksi ke database
$koneksi=mysql_connect ('localhost', 'root', '');
//host, user, password
$db=mysql_select_db ('crud_db');
//nama database
?>

<style type="text/css">
table
{border: 1px solid #000000;}
th
{background-color: #2B95EC;
 color: #ffffff;}
tr:hover
{ background-color: #00ccff;}
</style>


<table width="600" cellpadding="3" cellspacing="3" align="center" border="1">
<tr>
<th colspan="2">Input Data Mahasiswa</th>
</tr>
<form action="form.php" method="POST" enctype="multipart/form-data">
<tr>
<td width="500">name</td>
<td width="600"><input type="text" name="txtname" size="25"></td>
</tr>
<tr>
<td width="500">email</td>
<td width="600"><input type="text" name="txtemail" size="45"></td>
</tr>
<tr>
<td>mobile</td>
<td><input type="text" name="txtmobile" size="45"></td>
</tr>
<tr>
<td width="500"></td>
<td width="600">
<input id="submit" type="submit" name="simpan" value="Simpan">
<input id="submit" type="reset" value="Batal"></td>
</tr>
</form>
</table>

<?php
//menyimpan data ke database
if (isset($_POST['simpan'])) {
$name = $_POST['txtname'];
$email = $_POST['txtemail'];
$mobile = $_POST['txtmobile'];

//query input
$input="insert into users (name, email, mobile)
value ('$name', '$email', '$mobile')";

//kondisi inputan
if($name =='') {
echo "</br>name tidak boleh kosong, diisi dulu";
}elseif($email==''){
echo "</br>email tidak boleh kosong, diisi dulu";
}elseif($mobile==''){
echo "</br>mobile tidak boleh kosong, diisi dulu";

mysql_query($input);
echo "</br>Data berhasil dimasukkan";
}}
?>

<hr>
<h2 align="center">Data Mahasiswa</h2>

<?php
//buat warna table
$warna1 = "#ffffff";
$warna2 = "#ccffff";
$warna  = $warna1;

//menampilkan data
$sql = mysql_query("SELECT * FROM users ORDER BY name");
if(!$sql)
die(mysql_error());

echo "<table cellpadding=4 border=1 align=center>
<tr>
<th>No</th>
<th>name</th>
<th>email</th>
<th>mobile</th>

</tr>";

$no=+1;

while ($baris = mysql_fetch_row($sql)) {
$name             = $baris[0];
$email             = $baris[0];
$mobile             = $baris[0];

if($warna == $warna1){
$warna = $warna2;}
else{
$warna = $warna1;
}

echo "<tr>
<td align=center>$no</td>
<td align='center'>$name</td>
<td align=center>$email</td>
<td align=center>$mobile</td>
</tr>";

$no++;
}

echo "</table>";
?>
</body>
</html>
Footer
© 2022 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
