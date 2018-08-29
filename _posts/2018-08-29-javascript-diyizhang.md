---
layout: post
title:  "JavaScript从入坑到被埋——第一章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

## 一、什么是javascript?
>**JavaScript是一种基于对象（内置了许多对象）和事件驱动并具有相对安全性的客户端脚本语言。同时也是一种广泛用于客户端Web开发的脚本语言，常用来给HTML网页添加动态功能，比如响应用户的各种操作。**

## 二、JavaScript发展历史
1、 1995年2月，就职于NetScape公司 布兰登 艾奇，开发一种名为LiveScript的脚本语言，为了赶在发布日期前完成LiveScript的开发，NetScape与Sun公司建立了一个开发联盟。为了搭上媒体热炒的Java的顺风车（当时Java已经很火），临时把LiveScript改名为JavaScript（1.0）。<br/>
2、 此时，微软在其Internet Explorer 3中加入了名为JScript的JavaScript实现（命名为JScript是为了避开与NetScape有关的授权问题）。<br/>
3、 微软推出JScript后，JavaScript出现了3个不同的版本：NetScape <br/>Navigator中的JavaScript、Internet Explorer中的JScript和ScriptEase中的CEnvi。当时没有标准规定JavaScript的语法和特性，3个版本并存的局面已经暴露了这个问题（不兼容问题）。所以，JavaScript的标准化问题被提上了议事日程。<br/>
4、 1997年，欧洲计算机制造商协会（ECMA）完成了——ECMA-262（发音“ek-ma-script”）的新脚本语言的标准。5、以后，浏览器开发商就开始致力于将ECMAScript作为各自JavaScript实现的基础，也在不同程度上取得了成功。
## 三、定义和使用JavaScript方式（对比css来记忆）
（1）嵌入HTML文件中
```html
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>js从入门到放弃</title>
<script type="text/javascript">

</script>
</head>
<body>

</body>
</html>
```
（2）定义专门的外部文件
将JavaScript代码写在一个独立的脚本文件（扩展名为.js)中，在页面中使用时直接导入该脚本文件即可，导入的格式：

```html
<script type="text/javascript" src="要导入的js文件.js"></script>
```

>**script为双标签，必须有结束标签**

（3）除了上面两种最为常用的方式外，还可以在以下地方定义JavaScript代码<br/>
`A`、在HTML的元素事件属性中，比如，按钮的单击事件，语法：

```html
<input type="button"　onclick="javascript:欢迎使用JavaScript" />
```
`B`、在超链接中定义，语法：
```html
<a href="javascript:欢迎使用JavaScript" >超链接</a>
```
例题：
```html
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>js从入门到放弃</title>
</head>
<body>
<input type="button" value="点我有惊喜" onclick="javascrpt:alert('欢迎学习JavaScript')" />
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-792453585d7b84af.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

