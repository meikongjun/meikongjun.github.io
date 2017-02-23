<?php
function checkSignature(){
	$signature = $_GET["signature"];

	$timestamp = $_GET["timestamp"];
	$nonce = $_GET["nonce"];
	$token = "meikongjun";

	$echostr = $_GET["echostr"];

	$tmpArr = array($token,$timestamp,$nonce);
	sort($tmpArr,SORT_STRING);
	//将数组转换成字符串
	$str = implode($tmpArr);

	$sign = sha1($str);

	//判断是否来源于微信
	if ($sign == $signature) {
		echo $echostr;
	}	
}
	checkSignature()
	
	//https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
	//不能使用ajax请求，原因是跨域
	//不能使用Jsonp  原因是不知道传什么回调函数
	
	//使用php中的网络请求
	/*
	第一种请求方式 ==> curl:client url
	第二种请求方式 ==> soket
	*/

	//1.创建一个会话
// 	$curl = curl_init();

// 	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx40c6e2b40208bed3&secret=529746b4157c641b766ba4cb5acfa822
// ";

// 	//2.配置会话信息
// 	curl_setopt($curl,CURLOPT_URL,$url);
// 	//设置返回结果集，不要自动输出
// 	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

// 	//3.抓取url并传递给浏览器
// 	$result=curl_exec($url);

// 	//4.关闭会话
// 	curl_close($curl);

// 	echo $result;

	function httpGet($url){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$result=curl_exec($curl);
		curl_close($curl);
		return $result;
	}

 	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx40c6e2b40208bed3&secret=529746b4157c641b766ba4cb5acfa822
 ";
   $response = httpGet($url);
   echo $response;


   function httpPost($url,$data){
   	$curl = curl_init();
   	curl_setopt($curl,CURLOPT_POST,true);
   	curl_setopt($curl,CURLOPT_URL,$url);
   	curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
   	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
   	$result = curl_exec($curl);
   	curl_close($curl);
   	return $result;
   }
   $url = "https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=H965xghrxw-43Jw6MJXxp5-x3wvxudUPZJ5DxB04kx_bI7ls8Nadfs5lq-9vzMX_FAqNYtUvGXylr-mR7_o9kpmw-VToYpQeqFYQRZbcXTy64DRBqtRuk5GGZmzn06xmPFMgAFAYOV";
   $data = '{
	"openid":"oFPIpwdpeh9nq7LSif_C3wPpevzg",
	"remark":"pangzi"
   }';
   echo httpPost($url,$data);























 ?>