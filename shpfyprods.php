<?php
$usage = "
  Usage: php $argv[0] [-h] <location-of-JSON-file>
Version: 0.0.2_250722-1731
  About: $argv[0] Helps querying of Shopify products JSON file
 Author: Ian Low | Date: 2025-07-22 | Copyright (c) 2025 Ian Low | License: MIT
Options:
    -h   Display help information including run options
    -n   Create a new instance
";

if(isset($argv[1])){
  if($argv[1]=="-h"){
    echo $usage;
    exit();
  }else if($argv[1]=="-n"){  
    echo "Please enter the following information or press 'Enter' for default...\n";
    echo "Project name (defaults to 'myprojphp'): "; $projname = trim(readline());
    if($projname=="") $projname = "myprojphp";
    exit();
  }
}


if(!isset($argv[1])){
  echo $usage;
  exit();
}

$currprod="";
$currhandle="";
$currsibvar="";
$curropt1="";

$prevprod="";
$count=0;
foreach(explode("\n", file_get_contents( $argv[1] ) 
    . "\n      \"title\": \"EndofFile\",") as $line){

  //echo $line. "\n";
  if(preg_match("/^\s\s\s\s\s\s\"title\":/", $line)){
    echo $count."|".$currprod."|"
      .$currhandle."|"
      .$currsibvar."|"
      .$curropt1."|"
      ."\n";
    $prevprod = $currprod;
    //-----------------------------------------
    $currprod=substr($line,16,-2);
    $currhandle="";
    $currsibvar="";
    $curropt1="";
    $count++;
  }else if(preg_match("/^\s\s\s\s\s\s\"handle\":/", $line)){
    $currhandle=substr($line,17,-2);
  }else if(preg_match("/^\s\s\s\s\s\s\s\s\"variant_/", $line)){
    $currsibvar=preg_replace("/[\"\,]/", "", substr($line,9));
  }else if( (preg_match("/^\s\s\s\s\s\s\s\s\s\s\"option1\": \"/", $line)) && ($curropt1=="") ){
    $curropt1=preg_replace("/[\"\,]/", "", substr($line,21));

  }


}












?>
