---
layout: post
title:  "玩转Mysql之左右连接"
categories: Mysql
author: joytom
tags:   Mysql
---

#### zuo表信息：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-c44fa34e541267b4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
#### you表信息：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-1273f2b0f761e565.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

#### 左连接：
```php
SELECT * FROM zuo LEFT JOIN you ON zuo.id=you.id
```
#### 结果：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d1e689da0c9a2db4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**左表记录全部显示，右表显示符合条件的记录**

#### 右连接：
```php
SELECT * FROM zuo RIGHT JOIN you ON zuo.id=you.id
```
#### 结果：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-571a98ad9c5fcd53.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**右表记录全部显示，左表显示符合条件的记录**

#### 内连接（和join一样）：
```php
SELECT * FROM zuo INNER JOIN you ON zuo.id=you.id
```
#### 结果：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-2513681d786a8223.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**符合左右连接条件的都显示出来，只要一边不符合条件的就不显示**

#### 适用左连接的条件：（左表为用户表，右表为记录表）<br/>当我们要查询每个用户的交易记录时，但不一定所有的用户都有交易记录，也可能有老实人(0.0)，这种情况下我们用左连接就特别合适 。

#### 适用右连接的条件：（左表为员工表，右表为工资支出表）<br/>比如你负责公司财务，该发工资了，想看看一共非给员工发工资发了多少钱，而不想查看给哪个员工发了。

#### 其实两个连接都差不多，只是表的位置关系，左右互换也能实现一种连接查询。