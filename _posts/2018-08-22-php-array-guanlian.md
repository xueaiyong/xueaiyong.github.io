---
layout: post
title:  "吃透php之关联数组"
categories: PHP
author: joytom
tags:  PHP
---

## 关联数组
<hr>

>**关联数组是指数组的键是字符串的数组。**

```php
<?php
$fruit = array(
    'apple'=>"苹果",
    'banana'=>"香蕉",
    'pineapple'=>"菠萝"
); 
print_r($fruit);
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-a58b1364628f3d4a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### 关联数组赋值

>**第一种：用数组变量的名字后面跟一个中括号的方式赋值，当然，关联数组中，中括号内的键一定是字符串。**

```php
<?php
$fruit['apple']="苹果";
print_r($fruit);
?>
```
>**第二种：用array()创建一个空数组，使用=>符号来分隔键和值，左侧表示键，右侧表示值。当然，关联数组中，键一定是字符串。**

```php
<?php
$fruit = array(
    'apple'=>"苹果",
); 
print_r($fruit);
?>
```
### 访问关联数组内容
```php
<?php
//从数组变量$arr中，读取键为apple的值
$arr = array('apple'=>"苹果",'banana'=>"香蕉",'pineapple'=>"菠萝");
$arr0=$arr['apple'];
print_r($arr0);
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d5e2d2d3512945dc.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### foreach循环访问关联数组里的值
```php
<?php
$fruit=array(
	'apple'=>"苹果",
	'banana'=>"香蕉",
	'pineapple'=>"菠萝"
);
foreach($fruit as $key=>$value){
    echo '<br>键是：'.$key.'，对应的值是：'.$value;
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-e77e182777d080a6.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
