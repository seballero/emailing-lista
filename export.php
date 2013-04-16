<?php
include "../../../wp-config.php";
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Test the connection:
if (mysqli_connect_errno()){
    // Connection Error
    exit("Couldn't connect to the database: ".mysqli_connect_error());
}
global $wpdb;
 $hoy = date("Y-m-d");
 header("Content-Type: application/vnd.ms-excel");
 header("Expires: 0");
 header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
 header("content-disposition: attachment;filename=emailing-garageuai-$hoy.xls");
?>
<html>
<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
<title>Lisa de e-malining</title>
</head>
<body>
    
    
<?php
echo "<table>
<thead>    
<tr>
<th>Correo</th>
</tr>
</thead>
";

global $wpdb;
$result = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."emailinglist GROUP BY email"); 
foreach($result as $r)
{
        echo "<tbody><tr>";
        echo "<td>".$r->email."</td>";
        echo "</tr></tbody>";
}
echo "</table>";


?>
</body>
</html>         