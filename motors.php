



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
$query = "SELECT tid, firstname, mobile, mx_city, mx_model_of_vehicle , mx_product_type, mx_vehicle_registration_number,
  mx_primary_email, mx_RTO, mx_date_of_first_registration , mx_variant_of_vehicle , mx_year_of_manufacture, mx_payable_premium,
  insertDatetime  FROM interdialog.tblmaster_faapidata2  order by Tid desc limit 1";
 
 
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
        $field1name = $row["tid"];
        $field2name = $row["firstname"];
        $field3name = $row["mobile"];
        $field4name = $row["mx_city"];
        $field5name = $row["mx_model_of_vehicle"]; 
 	      $field6name = $row["mx_product_type"];
	      $field7name = $row["mx_vehicle_registration_number"];
      	$field8name = $row["mx_primary_email"];
      	$field9name = $row["mx_RTO"];
      	$field10name = $row["mx_date_of_first_registration"];
      	$field11name = $row["mx_variant_of_vehicle"];
      	$field12name = $row["mx_year_of_manufacture"];
      	$field13name = $row["mx_payable_premium"];
      	$field14name = $row["insertDatetime"];
	//$field5name = $row["email"];
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

$data = array( "process"=>"Motor","info_1"=>"$field2name","mobile"=>"$field3name","info_2"=>"$field4name","info_3"=>"$field5name","info_4"=>"$field6name","info_5"=>"$field7name","info_6"=>"$field8name","info_7"=>"$field9name","info_8"=>"$field10name","info_9"=>"$field11name","info_10"=>"$field12name","info_11"=>"$field13name");

$string = http_build_query($data);


$ch = curl_init("http://1.186.143.210:8080/ConVoxCCS/leadapi.php?process=&mobile=&info_1=&info_2=&info_3=&info_4=&info_5=&info_6=&info_7=&info_8=&info_9=&info_10=&info_11=");
curl_setopt($ch, CURLOPT_POST, true); //value lastname=&firstname=&phone=&email=&leadsource=&industry=Healthcare
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);



?>
</table>
</body>
</html>

