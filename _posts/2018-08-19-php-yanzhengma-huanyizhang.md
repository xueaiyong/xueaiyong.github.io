---
layout: post
title:  "PHP验证码动态校检制作"
categories: PHP
author: joytom
tags:   PHP 验证码
---

>**动态验证三步走：<br/>
①增加可点击的“换一个”文案（增加一行字）<br/>
②用js选取器选取验证码图片（例如：通过id获取）<br/>
③用js修改验证码图片地址（修改Src）**

方法一：（点击换一个）
```html
<p>验证码图片：<img id="xixi" border = "1" src="./haha.php?r=<?php echo rand();?>" />
<a href="javascript:void(0)" onclick="document.getElementById('xixi').src='./haha.php?r='+Math.random()">换一个</a>
</p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
```
方法二：（点击图片）
```html
<p>验证码图片：<img border='1' src='haha.php' onclick="this.src='haha.php?t=' + Math.random()" title="点击刷新"/></p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
```
>**方法一，通过获取图片id，来随机读取图片信息**

>**方法二，通过点击图片，使其刷新来更新图片信息**
