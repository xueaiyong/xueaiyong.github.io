---
layout: post
title:  "PHPExcel读取excel文件"
categories: PHPExcel
author: joytom
tags:   PHPExcel
---


<hr/>
## PHPExcel读取excel文件
<hr/>

###### haha.xlsx：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-988a406160296bf5.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```php
<?php
require "./PHPExcel/PHPExcel/IOFactory.php";
$filename="haha.xlsx";
$objPHPExcel=PHPExcel_IOFactory::load($filename);  //加载文件
$sheetCount=$objPHPExcel->getSheetCount();   //获取excel文件里有多少个sheet
for($i=0;$i<$sheetCount;$i++)
{
	$data=$objPHPExcel->getSheet($i)->toArray(); //读取每个sheet的数据，并全部放入数组中
	print_R($data);
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-19a7764600604cde.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

逐行逐列读取：
```php
<?php
require "./PHPExcel/PHPExcel/IOFactory.php";
$filename="haha.xlsx";
$objPHPExcel=PHPExcel_IOFactory::load($filename);  //加载文件
foreach($objPHPExcel->getWorksheetIterator() as $sheet) //循环读取sheet
{
	foreach($sheet->getRowIterator() as $row)  //逐行处理
	{
		foreach($row->getCellIterator() as $cell)  //逐列读取
		{ 
			$data=$cell->getValue();    //获取单元格数据
			echo $data."<br />";
		}
		echo "<br />";
	}
}
?>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-1127ce58eb85ef34.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
