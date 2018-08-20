---
layout: post
title:  "PHP验证码图片校检"
categories: PHP
author: joytom
tags:   PHP 验证码
---


![image.png](https://upload-images.jianshu.io/upload_images/13570975-f9ea16c12ebf3483.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
### 代码实现：

photo.php
```php
<?php
session_start();
$table=array(
	'pic0'=>'狗',
	'pic1'=>'猫',
	'pic2'=>'鱼',
	'pic3'=>'鸟',
);
$index=rand(0,3);
$value=$table['pic'.$index];
$_SESSION['authcode']=$value;
$filename=dirname(__FILE__).'/pic'.$index.'.jpg';
$contents=file_get_contents($filename);
header('content-type:image/jpg');
echo $contents;
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
<!Doctype html>
<head>
<title></title>
<meta charset='utf-8'>
</head>
<body>
<form method="post" action="./form.php">

<p>验证码图片：<img border='1' width="200" src='photo.php' onclick="this.src='photo.php?t=' + Math.random()" title="点击刷新"/></p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
<p><input type="submit" name="submit" value="提交" /></p>
</form>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-7b5d1f1ea8096446.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-ded4cd39cb85b7cc.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-92cf7c6290ff8125.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
