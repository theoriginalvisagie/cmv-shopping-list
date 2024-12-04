<?php
  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));

  require_once(APPROOT."/helpers/env_helper.php");
  
  loadEnv("../.env");
  // DB Params
  define("DB_HOST", getenv("DB_HOST"));
  define("DB_USER", getenv("DB_USER"));
  define("DB_PASS", getenv(""));
  define("DB_NAME", getenv("DB_NAME"));

  // URL Root
  if(getenv("APP_ENV") == "production"){
    $url = getenv("PROD_URL_ROOT");
  }else if(getenv("APP_ENV") == "production"){
    $url = getenv("STAGE_URL_ROOT");
  }else{
    $url = getenv("DEV_URL_ROOT");
  }
  define('URLROOT', $url);

  // Site Name
  define('SITENAME', 'Shopping List');
  