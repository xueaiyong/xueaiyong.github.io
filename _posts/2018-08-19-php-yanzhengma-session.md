---
layout: post
title:  "PHP验证码通过session储存信息"
categories: PHP
author: joytom
tags:   PHP 验证码
---

haha.php
```php
$captch_code='';    //定义一个新变量
for($i=0;$i<4;$i++){
	$fontsize=6;
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$data="abcdefghijklmnopqrstuvwxyz123456789";
	$fontcontent=substr($data,rand(0,strlen($data)),1);

	$captch_code=$fontcontent;   //把循环出来的内容赋给变量

	$x = rand(5,10)+100/4*$i;  //底图为100，基本上要每个数字要占25
	$y = rand(5,10);
	imagestring($image,$fontsize,$x,$y,$fontcontent, $fontcolor);
}
$_SESSION['authcode']=$captch_code;   //把变量赋给session保存起来
```
form.php
```php
<?php
session_start();
if(isset($_REQUEST['authcode']))
{
	if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode'])
	{
		echo '正确';
	}
	else
	{
		echo '错误';
	}
}
?>
/*<?php
session_start();
if(isset($_POST['submit']))
{
	$value=$_POST['authcode'];
	$values=$_SESSION['authcode'];
	if($value==$values)
		echo '正确';
	else
		echo '错误';
}
?>*/
<!Doctype html>
<head>
<title></title>
<meta charset='utf-8'>
</head>
<body>
<form method="post" action="./form.php">
<p>验证码图片：<img border='1' src='haha.php' onclick="this.src='haha.php?t=' + Math.random()" title="点击刷新"/> </p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
<p><input type="submit" name="submit" value="提交" /></p>
</form>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-1ca7f95db9b7b67a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

![image.png](https://upload-images.jianshu.io/upload_images/13570975-64c587af42491557.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

随机显示图片验证码的两种形式：
①刷新显示：
  ```html
<p>验证码图片：<img border = "1" src="./captcha.php?r=<?php echo rand();?>"width:100px,height:100px" /></p>
```
>**php?r=<?PHP echo rand(); ?>,访问PHP文件传随机数，为防止有的浏览器可能使用缓存而不刷新验证码<br/>r（redirect的简写）**

②点击显示：
```html
<p>验证码图片：<img border='1' src='haha.php' onclick="this.src='haha.php?t=' + Math.random()" title="点击刷新"/> </p>
```