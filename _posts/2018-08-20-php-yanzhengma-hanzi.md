---
layout: post
title:  "PHP验证码汉字校检"
categories: PHP
author: joytom
tags:   PHP 验证码
---

### 打开控制面板，查找字体：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-9fce8cedd45e7c0d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-85adf875e4821f37.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
### 复制到项目目录：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-215070d17b21a5ed.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

- `imagettftext`--- 用 TrueType 字体向图像写入文本
>array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
angle：角度<br/>fontfile：是想要使用的 TrueType 字体的路径。<br/>

haha.php
```php
<?php
session_start();
//生成一个图像大小为100*30
$image = imagecreatetruecolor(200,60);
//分配颜色
$bgcolor = imagecolorallocate($image, 255, 255, 255);
//填充颜色
imagefill($image, 0, 0, $bgcolor);
//生成要输入文字
/*for($i=0;$i<4;$i++)
{
	//字体大小
	$fontsize = 6;
	//随机生产文字颜色
	$fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	//生成随机数字
	$fontcontent = rand(0,9);
	//绘制文字坐标
	$x = rand(5,10)+100/4*$i;  //底图为100，基本上要每个数字要占25
	$y = rand(5,10);
	//绘制文字
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}*/
$fontface='FZLTCXHJW.TTF';   //指定字体
$str="的一了是我不在人们有来他这上着个地到大里说去子得也和那要下看天时过出小么起你都把好还多没为又可家学只以主会样年想能生同老中从自面前头到它后然走很像见两用她国动进成回什边作对开而已些现山民候经发工向事命给长水几义三声于高正妈手知理眼志点心战二问但身方实吃做叫当住听革打呢真党全才四已所敌之最光产情路分总条白话东席次亲如被花口放儿常西气五第使写军吧文运在果怎定许快明行因别飞外树物活部门无往船望新带队先力完间却站代员机更九您每风级跟笑啊孩万少直意夜比阶连车重便斗马哪化太指变社似士者干石满决百原拿群究各六本思解立河爸村八难早论吗根共让相研今其书坐接应关信觉死步反处记将千找争领或师结块跑谁草越字加脚紧爱等习阵怕月青半火法题建赶位唱海七女任件感准张团屋爷离色脸片科倒睛利世病刚且由送切星晚表够整认响雪流未场该并底深刻平伟忙提确近亮轻讲农古黑告界拉名呀土清阳照办史改历转画造嘴此治北必服雨穿父内识验传业菜爬睡兴";
$strdb=str_split($str,3);  //一个汉字三个字符，分割字符串到数组中
$captch_code='';
for($i=0;$i<4;$i++){
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$index=rand(0,count($strdb));
	$cn=$strdb[$index];
	$captch_code.=$cn;
	 imagettftext($image,mt_rand(20,24),mt_rand(-60,60),($i*50+10),mt_rand(35,40),$fontcolor,$fontface,$cn);
}
$_SESSION['authcode']=$captch_code;
//添加200个干扰点
for($i=0;$i<200;$i++){
	//随机产生颜色
	$pointcolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
	//绘制干扰点
	imagesetpixel($image,rand(1,199),rand(1,59),$pointcolor);
}
//添加3条线
for($i=0;$i<=3;$i++){
	//为线生成随机颜色
	$linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
	//生成线段
	imageline($image,rand(1,199),rand(1,59),rand(1,199),rand(1,59),$linecolor);
}
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
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

<p>验证码图片：<img border='1' width="200" src='haha.php' onclick="this.src='haha.php?t=' + Math.random()" title="点击刷新"/></p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
<p><input type="submit" name="submit" value="提交" /></p>
</form>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-fc6e239baf1078d7.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-befda71119714f37.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
