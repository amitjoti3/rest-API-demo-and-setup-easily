



<html>
<head>
  
        <meta http-equiv="refresh" content="30000">

</head>
<body>
<?php 
$username = "root"; 
$password = "AND@123"; 
$database = "religarehealth"; 
$mysqli = new mysqli("172.16.0.9", $username, $password, $database); 

$query = "SELECT lead_id , lead_phone1, lead_fname,lead_address1,lead_address2,lead_address3,lead_city, lead_state, lead_remarks, lead_import_batch_start_date, input_email_id
                    FROM religarehealth.cti_lead_master_5
				
				  where


			lead_import_batch_start_date >= NOW() - INTERVAL 1 DAY
  				order by lead_id desc limit 1 ";
 
 
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
        $field2name = $row["lead_phone1"];
        $field3name = $row["lead_fname"];
        $field4name = $row["lead_address1"];
        $field5name = $row["lead_address2"]; 
        $field6name = $row["lead_address3"];
        $field7name = $row["lead_city"];
        $field8name = $row["lead_state"];
        $field9name = $row["lead_remarks"];
        $field10name = $row["lead_import_batch_start_date"];
        $field11name = $row["input_email_id"];
        
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

$data = array( "process"=>"Health","mobile"=>"$field2name","info_1"=>"$field3name","info_2"=>"$field3name","info_3"=>"$field4name","info_4"=>"$field5name","info_5"=>"$field6name","info_6"=>"$field7name","info_7"=>"$field8name","info_8"=>"$field9name","info_9"=>"$field10name","info_10"=>"$field11name");

$string = http_build_query($data);


$ch = curl_init("http://1.186.143.210:8080/ConVoxCCS/leadapi.php?process=&mobile=&info_1=&info_2=&info_3=&info_4=&info_5=&info_6=&info_7=&info_8=&info_9=&info_10=");
curl_setopt($ch, CURLOPT_POST, true); //value lastname=&firstname=&phone=&email=&leadsource=&industry=Healthcare
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);



?>
</table>
</body>
</html>

