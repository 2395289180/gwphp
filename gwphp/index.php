<?php
//字符编码
header("Content-Type:text/html;charset=utf-8");

//根目录
define("SERVER_ROOT",__DIR__);


//加载系统配置文件
include_once(SERVER_ROOT."/config/config.php");


//加载项目配置文件
if(isset($_GET[MODEL_BOX])){

	if(file_exists(dirname(SERVER_ROOT).APP_PATH."/".MODEL_BOX."/config/config.php")){

		include_once(dirname(SERVER_ROOT).APP_PATH."/".MODEL_BOX."/config/config.php");

	}else{

		die("这个地址不存在");

	}

}


//加载路径解析
include_once(SERVER_ROOT."/controllers/route.php");