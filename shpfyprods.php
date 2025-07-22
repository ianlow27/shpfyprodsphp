<?php
$usage = "
  Usage: php $argv[0] [-h]
Version: 0.0.1_250722-1248
  About: $argv[0] Helps querying of Shopify products JSON file
 Author: Ian Low | Date: 2025-07-22 | Copyright (c) 2025 Ian Low | License: MIT
Options:
    -h   Display help information including run options
    -n   Create a new instance
";
if(isset($argv[1])){
  if($argv[1]=="-h"){
    echo $usage;
  }else if($argv[1]=="-n"){  
    echo "Please enter the following information or press 'Enter' for default...\n";
    echo "Project name (defaults to 'myprojphp'): "; $projname = trim(readline());
    if($projname=="") $projname = "myprojphp";
  }
}
?>