<?php
  // Simple page redirect
  function redirect($page = ""){
    if(empty($page)){
      header("location: ".URLROOT);
    }else{
      header("location: ".URLROOT."/".$page);
    }
    
  }