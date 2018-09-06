---
layout: post
title:  "PHP制作验证码干扰线"
categories: PHP验证码
author: joytom
tags:   PHP验证码
---

- `imageline` ---画一条线段
```php
bool imageline ( resource $image , int $x1 , int $y1 , int $x2 , int $y2 , int $color )
```
>**imageline() 用 color 颜色在图像 image 中从坐标 x1，y1 到 x2，y2（图像左上角为 0, 0）画一条线段。**

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
for($i=0;$i<4;$i++)
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
![image.png](https://upload-images.jianshu.io/upload_images/13570975-584fe488c8252685.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b27774380eb3e022.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**无论是干扰点还是干扰线，都要注意颜色规范，避免出现“喧宾夺主”的情况**
