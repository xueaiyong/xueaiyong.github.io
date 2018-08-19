---
layout: post
title:  "PHP实现数字字母混合验证码"
categories: PHP
author: joytom
tags:   PHP 验证码
---

代码实现：
```php
<?php
//生成一个图像大小为100*30
$image = imagecreatetruecolor(100,30);
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
for($i=0;$i<=4;$i++){
	$fontsize=6;
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$data="abcdefghijklmnopqrstuvwxyz123456789";
	$fontcontent=substr($data,rand(0,strlen($data)),1);
	$x = rand(5,10)+100/4*$i;  //底图为100，基本上要每个数字要占25
	$y = rand(5,10);
	imagestring($image,$fontsize,$x,$y,$fontcontent, $fontcolor);
}
//添加200个干扰点
for($i=0;$i<200;$i++){
	//随机产生颜色
	$pointcolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
	//绘制干扰点
	imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
}
//添加3条线
for($i=0;$i<=3;$i++){
	//为线生成随机颜色
	$linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
	//生成线段
	imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
}
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
```

![image.png](https://upload-images.jianshu.io/upload_images/13570975-f50cd7f70a6d4bd8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-6cd4b81ac89bf29d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)


```php
 $fontcontent=substr($data,rand(0,strlen($data)),1);
```
本行的意思是：
>**substr(string,start,length)**
string：字符串  start：从第几个数开始  length：取几个数
获取$data这串字符串，并且随机从（0，总个数）开始，取一个数值

具体解释详见吃透php之字符串函数
