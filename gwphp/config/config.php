<?php
$config = array();
$config["m"] = "m";
$config["c"] = "c";
$config["a"] = "a";

//取得模块的变量
//$_GET[$config["m"]]==""?define("MODEL_BOX","home"):define("MODEL_BOX",$_GET[$config["m"]]);
define("MODEL_BOX",$_GET[$config["m"]]);