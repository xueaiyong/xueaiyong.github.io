---
layout: post
title:  "PHP制作随机数字验证码并增加干扰点"
categories: PHP
author: joytom
tags:   PHP 验证码
---

- `imagestring` ---水平地画一行字符串
```php
bool imagestring ( resource $image , int $font , int $x , int $y , string $s , int $col )
```
>**用 col 颜色将字符串 s 画到 image 所代表的图像的 x，y 坐标处（这是字符串左上角坐标，整幅图像的左上角为 0，0）。如果 font 是 1，2，3，4 或 5，则使用内置字体**
- `imagesetpixel`---画一个单一像素
```php
bool imagesetpixel ( resource $image , int $x , int $y , int $color )
```
>**在 image 图像中用 color 颜色在 x，y 坐标（图像左上角为 0，0）上画一个点。**

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
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-c5a94e352a19f959.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

![image.png](https://upload-images.jianshu.io/upload_images/13570975-c8cb94283d45058e.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

具体语法请参考 php手册：
<a>http://php.net/manual/zh/function.imagesetpixel.php</a>


