<?php
/**
 * 路径解析函文件
 * @author gewen <821263167@qq.com>
 */

//这个是加载模型类
function __autoload($classname){
	
	if(strpos($classname,"Controller")){
		//echo $_GET["m"];
		$controller = dirname(SERVER_ROOT).APP_PATH."/".MODEL_BOX."/controllers/".$classname.".class.php";
		
		if(file_exists($controller)){
			
			include_once($controller);
			
		}else{

			die("这个地址不存在");

		}
		
	}elseif(strpos($classname,"Model")){
		
		$model = dirname(SERVER_ROOT).APP_PATH."/".MODEL_BOX."/models/".$classname.".php";
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
		if($url_arr[$config['m']]!=""){

			$new_obj = ucfirst($url_arr[$config['c']])."Controller";

			if(class_exists($new_obj)){
				
				$obj = new $new_obj();
				$obj -> $url_arr[$config['a']]();
				
			}else{
				
				die("没有这个类，这个类加载不成功");
				
			}

		}else{

			die("没有模块加载");

		}
		
		
	}else{
		
		die("没有这个类，这个类加载不成功");
		
	}
	
}else{
	
	exit("url没有给出参数");
	
}