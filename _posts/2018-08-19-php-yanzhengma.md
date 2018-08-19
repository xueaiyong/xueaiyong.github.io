---
layout: post
title:  "PHP制作验证码背景"
categories: PHP
author: joytom
tags:   PHP 验证码
---


- `imagecreatetruecolor`
```php
resource imagecreatetruecolor ( int $width , int $height )
```
>返回一个图像标识符，代表了一幅大小为 x_size 和 y_size 的黑色图像。

- `imagecolorallocate`
```html
int imagecolorallocate ( resource $image , int $red , int $green , int $blue )
```
>为一幅图像分配颜色

- `imagefill`
```html
bool imagefill ( resource $image , int $x , int $y , int $color )
```
>区域填充

代码部分：
```php
<?php
$image=imagecreatetruecolor(100,30);  //新建一副100*30的黑色图像（默认为黑色）
$bgcolor=imagecolorallocate($image,255,255,255);   //为图像分配颜色，创建一个白点
imagefill($image,0,0,$bgcolor);    //填充区域的颜色
header('content-type:image/png');   //指定图片类型
imagepng($image);       
imagedestory($image);          //销毁图像
?> 
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-6a451ad5c30b9f59.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>本实例需要注意的3点:<br/>
1.依赖gd扩展.<br/>
2.输出图片前必须提前输出图片的header信息.<br/>
3.该方法默认输出黑色背景<br/>

