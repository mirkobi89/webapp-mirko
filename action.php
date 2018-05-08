<?php
require_once "functions.php";
  if(isset($_POST['submit']))
  {
    // form has been submitted
    $url1 = $_POST['website1'];
    $url2 = $_POST['website2'];
    $result = findAndCompare($url1,$url2);
    download_to_csv($result,"pippo.csv","\t");
    
  }
  
