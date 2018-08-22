---
layout: post
title:  "吃透php之索引数组"
categories: PHP
author: joytom
tags:  PHP
---

<hr>
## 索引数组
<hr/>
>**索引数组是指数组的键是整数的数组，并且键的整数顺序是从0开始，依次类推。**

```php
<?php
//创建一个索引数组，索引数组的键是“0”，值是“苹果”
$fruit=array("苹果","香蕉","菠萝");
print_r($fruit);
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b5dc14350df8156d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
### 创建一个索引数组（三种方法）
第一种：
```php
<?php
$arr[0]='苹果';
print_r($arr);
?>
```
>**用数组变量的名字后面跟一个中括号的方式赋值，当然，索引数组中，中括号内的键一定是整数。**

第二种：
```php
<?php
$fruit=array(
	"0"=>"苹果",
	"1"=>"香蕉",
	"2"=>"菠萝");
print_r($fruit);
?>
```
>**用array()创建一个空数组，使用=>符号来分隔键和值，左侧表示键，右侧表示值。当然，索引数组中，键一定是整数。**

第三种：
```php
<?php
$fruit=array('苹果','香蕉','草莓');
print_r($fruit);
?>
```
>**用array()创建一个空数组，直接在数组里用英文的单引号'或者英文的双引号"赋值，数组会默认建立从0开始的整数的键。比如array('苹果');这个数组相当于array('0'=>'苹果');**

### 访问索引数组里的内容
```php
<?php
$arr = array('苹果','香蕉');
$arr0=$arr['0'];
print_r($arr0);
?>
```
### 利用for循环访问索引数组里的内容
```php
<?php
$fruit=array('苹果','香蕉','菠萝');
for($i=0; $i<3; $i++){
    echo '<br>数组第'.$i.'值是：'.$fruit[$i];
}
?>
```
### 利用foreach循环访问索引数组里的内容
```php
<?php
$fruit=array('苹果','香蕉','菠萝');
foreach($fruit as $key=>$value){
    echo '<br>第'.$key.'值是：'.$value;
}
?>
```
#### 小知识点
>**如果下标是一个整数，那么下一个自动产生的下标将是当前最大整数下标+1**

例如：
```php
<?php
$fruit=array('1','2','3','7'=>'4','5');
print_r($fruit);
?>
```
结果：<br/>

![image.png](https://upload-images.jianshu.io/upload_images/13570975-3542009217a4e14c.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**如果定义了两个一样的下标，那么后一个将会覆盖前面的**

例如：

```php
<?php
$fruit=array('0'=>'苹果','1'=>'香蕉','1'=>'菠萝');
print_r($fruit);
?>
````
结果：<br/>

![image.png](https://upload-images.jianshu.io/upload_images/13570975-76a669880d1e2f52.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

