



<html>
<head>
  
        <meta http-equiv="refresh" content="30000">

</head>
<body>
<?php 
$username = "root"; 
$password = "AND@123"; 
$database = "interdialog"; 
$mysqli = new mysqli("172.16.0.12", $username, $password, $database); 
$query = "SELECT id as lead_id,  phoneno as phone, name as name FROM interdialog.tbl_edelweissdata order by id desc limit 1";
 
 
 echo '<table border="0" cellspacing="2" cellpadding="2"> 
     <tr> 
          <td> <font face="Arial">lead_id</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
        <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
    </tr>';  
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["lead_id"];
        $field2name = $row["phone"];
        $field3name = $row["name"];
       // $field4name = $row["email"];
       //$field5name = $row["email"]; 
 
       echo '<tr> 
               <td>'.$field1name.'</td> 
             <td>'.$field2name.'</td> 
            <td>'.$field3name.'</td> 
          
             
           </tr>';
    }
    $result->free();
} 
?>



</body>
</html>


<?php





$data = array( "process"=>"Life","mobile"=>"$field2name","info_1"=>"$field3name");

$string = http_build_query($data);


$ch = curl_init("http://1.186.143.210:8080/ConVoxCCS/leadapi.php?process=&mobile=&info_1=");
curl_setopt($ch, CURLOPT_POST, true); //value lastname=&firstname=&phone=&email=&leadsource=&industry=Healthcare
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);



?>
</table>
</body>
</html>

