---
layout: post
title:  "PHPExcel导出文件"
categories: PHPExcel
author: joytom
tags:  PHPExcel
---

<hr/>
## 代码实现导出PHPexcel
<hr/>

```php
<?php
require_once "./PHPexcel/PHPexcel.php";
$objPHPExcel=new PHPexcel();//实例化phpexcel这个类
$objSheet=$objPHPExcel->getActiveSheet();//获得当前活动sheet的操作对象
//平时我们新建excel表格时，系统默认新建三个sheet，但这个只新建一个sheet。
$objSheet->setTitle('哈哈');//给当前活动的sheet设置名称
$objSheet->setCellValue("A1",'姓名')->setCellValue("B1","职业");
$objSheet->setCellValue("A2",'光头强')->setCellValue("B2","砍树");
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文件
$objWriter->save(dirname(__FILE__)."/熊出没之PHPExcel大冒险.xlsx");//存储到本地
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-36664d89d760bb3b.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![[图片上传中...(image.png-a46ee2-1534592118299-0)]
](https://upload-images.jianshu.io/upload_images/13570975-cf58fc0c26687838.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-851824096fe8fa2d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

用数组来实现：
```php
<?php
require_once "./PHPexcel/PHPexcel.php";
$objPHPExcel=new PHPexcel();//实例化phpexcel这个类
$objSheet=$objPHPExcel->getActiveSheet();//获得当前活动sheet的操作对象
//平时我们新建excel表格时，系统默认新建三个sheet，但这个只新建一个sheet。
$objSheet->setTitle('哈哈');//给当前活动的sheet设置名称
//$objSheet->setCellValue("A1",'姓名')->setCellValue("B1","职业");
//$objSheet->setCellValue("A2",'光头强')->setCellValue("B2","砍树");
$array=array(
	array(),//空一行
	array("","姓名","职业"),//空一列
	array("","光头强","砍树")//空一列
);
$objSheet->fromArray($array);//自动加载数据块来填充数据
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文件
$objWriter->save(dirname(__FILE__)."/熊出没之PHPExcel大冒险.xlsx");//存储到本地
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-2a7b5e8c4dcc9df6.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**用数组实现的话，如果数据量少的话还可以，但如果数据量大的话会很消耗内存，php本身就是耗内存的操作，如果添加大的数据块，会使内存产生不够的现象，从而使php脚本执行中断。**
