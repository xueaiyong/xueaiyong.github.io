---
layout: post
title:  "吃透php之二维数组"
categories: PHP
author: joytom
tags:  PHP
---

## 二维数组
<hr/>
### 创建二维数组

```php
<?php
$all=array(
	'书籍'=>array('平凡的世界','解忧杂货店'),
	'蔬菜'=>array('萝卜','大蒜','茄子')
);
print_R($all);
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-659e8a79744773b8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```php
<?php
$all=array(
	'书籍'=>array('平凡的世界','解忧杂货店'),
	'蔬菜'=>array('萝卜','2'=>'大蒜','茄子'),
	'水果'=>array('1'=>'香蕉','2'=>'草莓','西瓜')
);
print_R($all);
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-529ce426e7b6985d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### 直接输出二维数组
```php
<?php
$cars = array
   (
   array("比亚迪",33,20),
   array("凯迪拉克",17,15),
   array("本田思域",5,2),
   array("大众捷达",15,11)
   );
   
echo $cars[0][0].": 库存：".$cars[0][1].", 已售：".$cars[0][2].".<br>";
echo $cars[1][0].": 库存：".$cars[1][1].", 已售：".$cars[1][2].".<br>";
echo $cars[2][0].": 库存：".$cars[2][1].", 已售：".$cars[2][2].".<br>";
echo $cars[3][0].": 库存：".$cars[3][1].", 已售：".$cars[3][2].".<br>";
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-7ddcc0f5bbeddcc6.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### for循环输出一维二维数组

```php
<?php
$all=array('茄子','西红柿','黄瓜');
$count=count($all);
for($i=0;$i<$count;$i++)
{
	echo $all[$i];
	echo "<br/>";
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-26dbb528f71f8c2c.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```php
<?php
$all=array(
	'0'=>array('平凡的世界','解忧杂货店'),
	'1'=>array('🍄','🌽','🍆'),
	'2'=>array('🍌','🍓','🍉','🍊')
);
$count=count($all);  //结果为3
for($i=0;$i<$count;$i++)
{

	for($j=0;$j<count($all[$i]);$j++)
	{
		echo $all[$i][$j].'&nbsp;&nbsp;&nbsp;';
	}
	echo "<br/>";
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-8301815c0dcc13b7.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**$all[0]就代表键为0的数组，它的值是：平凡的世界、解忧杂货店**

>**$all[0][1]就代表键为0，值在第二个的（值从0开始），因此值为解忧杂货店**

>**$all[2]就代表键为2的数组，它的值是🍌','🍓','🍉','🍊**

>**$all[2][1]就代表键为2，值为第二个的，因此它的值是🍓**

>**count($all[1])的意思就是键为1对应的数组值有多少个，键为1对应点数组值有三个，因此为3。**

<br/>以此类推，即可理解
### foreach遍历一维二维数组
```php
<?php
$all=array(
	'水果'=>'🍌',
	'蔬菜'=>'🍆'
);
foreach($all as $key=>$value)
{
	echo $key.''.$value;
	echo '<br/>';
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-150950999969e0b4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```php
<?php
$all=array(
	'书籍'=>array('平凡的世界','解忧杂货店'),
	'蔬菜'=>array('🍄','🌽','🍆'),
	'水果'=>array('🍌','🍓','🍉','🍊')
);
foreach($all as $key=>$value)
{
	echo $key.'：<br/>';
	foreach($value as $keys=>$values)
	{
		echo $values;
		echo '<br/>';
	}
	echo '<br/>';
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-ec686d706fcbb078.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**书籍作为一个键，都对应其一个数组值，如平凡的世界，作为一个数组，由于没定义它的键值，所以默认为0，解忧杂货店以此类推为1，所以，他们是一个索引数组**