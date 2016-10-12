<?php
/**
 * 路径解析函文件
 * @author gewen <821263167@qq.com>
 */

//这个是加载模型类
function __autoload($classname){
	
	if(strpos($classname,"Controller")){
	
		$controller = dirname(SERVER_ROOT).APP_PATH."/controllers/".$classname.".class.php";
		
		if(file_exists($controller)){
			
			include_once($controller);
			
		}
		
	}elseif(strpos($classname,"Model")){
		
		$model = dirname(SERVER_ROOT).APP_PATH."/models/".$classname.".php";
		if(file_exists($model)){
			
			include_once($model);
			
		}
		
	}else{
		
		die("没有这个文件");
		
	}
	
}

//取得url地址的参数
$request = $_SERVER["QUERY_STRING"];
if($request!=""){
	
	$url_str = explode("&",$request);

	foreach($url_str as $k=>$v){
		
		list($key,$val) = preg_split("/=/",$v);
		$url_arr[$key] = $val;
		
	}
	if(!empty($url_arr)){
		
		$new_obj = ucfirst($url_arr[$config['c']])."Controller";

		if(class_exists($new_obj)){
			
			$obj = new $new_obj();
			$obj -> $url_arr[$config['a']]();
			
		}else{
			
			die("没有这个类，这个类加载不成功");
			
		}
		
	}else{
		
		die("没有这个类，这个类加载不成功");
		
	}
	
}else{
	
	exit("url没有给出参数");
	
}