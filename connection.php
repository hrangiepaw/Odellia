<?php 
# nama host. localhost merupakan default
$namahost = "localhost";

# username bagi SQL. root merupakan default
$namasql = "root";

# password bagi SQL. 
$passsql  = "";

#nama pangkalan data yang saya telah bangunkan sebelum ini.
$namadb = "odellia";

# membuka hubungan antara pangkalan data dan sistem.
$condb = mysqli_connect($namahost, $namasql, $passsql, $namadb);

if(!$condb)
{
    die("Sambungan ke pangkalan data gagal");
}
else
{
    #echo "Sambungan ke pangkalan data berjaya";
}
?>