<?php
  $post = ['cl'=> "financial-agency"];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'https://tracknext.com/campaign/?q=rest/report&cl=financial-agency');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  $response = curl_exec($ch);
  $result = json_decode($response);
  curl_close($ch); // Close the connection
  $new=   $result->status;
  if( $new =="1")
  {
    echo "<script>alert('Student list')</script>";
  }
  else 
  {
    echo "<script>alert('Not Removed')</script>";
  }

  ?>