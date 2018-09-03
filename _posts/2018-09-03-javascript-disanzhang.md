---
layout: post
title:  "JavaScript从入坑到被埋——第三章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

## 字符串类
### 一、字符串类创建和属性
引用类型（直接赋值）和基本包装类型的区别：<br/>
主要区别：对象的生存期。<br/>
直接赋值：<br/>
```html
<script>
var s1="apple";
s1.color="red";
alert(s1.color);
</script>
```

![image.png](https://upload-images.jianshu.io/upload_images/13570975-0c2be050c6443cc2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

基本包装类型：<br/>
```html
<script>
var s1=new String("apple");
s1.color="red";
alert(s1.color);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-599186f71b5236ea.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
字符串对象的创建方式：<br/>
①直接声明字符串常量（最常用）：
格式：<br/>
```html
var 字符串变量=“字符串”；  //也可单引号
```
比如：<br/>
```html
 var str="欢迎大家来到我的博客";
```
②使用new关键字实例化字符串对象：
格式：<br/>
```html
var 字符串变量=new String(字符串);
```
比如：
```html
var str = new String("欢迎大家学习JavaScript");
```
string类的常用属性：<br/>
`length`
功能：该属性用来返回字符串中的数量，也可获取数组的长度。
注意：中文字符虽然是双字节，也算是一个单字符。
```html
<script>
var str="p h p";    //中间有两个空格
alert(str.length);  //字符加空格
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b559f6c3c38a4ad8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="编程班";    //
alert(str.length);  //一个汉字算一个长度
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-8d117dfd893b3638.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**注意：JavaScript中调用类中的属性、方法，通过.（英文点号），和PHP通过->不同。**

### 二、常用方法：<br/>
1、`charAt（index）`可返回指定位置的字符
>**index：必须。表示字符串种某个位置的数字，即字符在字符串中的下标。**

```html
<script>
var str="hello boy";   
document.write(str.charAt(1));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b167d009882144bd.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

2、`charCodeAt（index）`返回指定位置的字符的Unicode编码。这个返回值是0-65535之间的整数
>**index：必须。表示字符串种某个位置的数字，即字符在字符串中的下标。**

```html
<script>
var str="hello boy";   
document.write(str.charCodeAt(1));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-38d90f7d9b05d822.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
3、`indexOf（searchvalue,fromindex）`返回某个指定的字符串值在字符串中首次出现的位置。
>**searchvalue：必须。规定需检索的字符串值<br/>fromindex：可选整数参数，规定在字符串中开始检索的位置，默认从首字符开始检索**

```html
<script>
var str="hello boy";   
document.write(str.indexOf("b"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-e39523753c81bde3.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="hello boy l love you";   
document.write(str.indexOf("love"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-ab0a29b95978869d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
4、`concat（stringx）`用于连接两个或多个字符串
>**stringx：必须。将被连接为一个字符串的一个或多个字符串对象**

```html
<script>
var str="hello ";
var str1="world ";
document.write(str.concat(str1));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d965262796e14547.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```html
<script>
var str="hello ";
var str1="world ";
var str2=" love";
document.write(str.concat(str1,str2));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-eeb7135bbd773bf0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
5、`lastIndexOf（searchvalue,fromindex）`返回一个指定的字符串值最后出现的位置，在一个字符串中的指定位置从后向前搜索。
>**searchvalue：必须。规定需检索的字符串值<br/>fromindex：可选整数参数，规定在字符串中开始检索的位置，默认从首字符开始检索**

```html
<script>
var str="hello boy";
document.write(str.lastIndexOf("o"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b103bd083ca5557d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="hello boy";
document.write(str.lastIndexOf("boy"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-e6b5fed2d152f1fe.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

```html
<script>
var str="hello boy";
document.write(str.lastIndexOf("B"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-abafb82ffeab0fd2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**注意区分大小写，字符串值没有出现，返回-1**

6、`substr（start，length）`可在字符串中抽取从start下标开始的指定数目的字符（从哪儿开始，截多少字符）
>**start：必须。字符串的起始下标，必须是数值，从0开始。如果是负值，就从字符串的尾部算起，负1就是最后一个，以此类推。<br/>length：可选。字符串中的字符数，必须是数值，如果省略，默认从开始截到结尾字符串。**

```html
<script>
var str="M1 is the best";
document.write(str.substr(0,4));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-13f17cadd3ff99d5.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="M1 is the best";
document.write(str.substr(5));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-0039b24a3e44b541.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
7、`substring（start，stop）`用于提取字符串中介于两个指定下标之间的字符（从哪开始，截取到哪儿）。
>**start：必需。字符串的起始下标。<br/>stop：可选，截取到哪个位置，截取到最后的一个字符要多1（简单理解为从0开始）**

```html
<script>
var str="M1 is the best";
document.write(str.substring(0,7));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-e70ffbf1f2248632.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="M1 is the best";
document.write(str.substring(0));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-4055b7f6ed09d1a2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
8、`split（separator,howmany）`把一个字符串分割成字符串数组
>**separator：从该参数指定的地方分割<br/>howmany：返回数组的最大长度，如果不指定，整个字符串将会被分割**

```html
<script>
var str="how are you doing today?";
document.write(str.split(" "));//以空格分割
document.write(str.split(""));    //每个字符之间进行分割
document.write(str.split(" ",3));  //以空格进行分割，并且只分割三次
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-2898950a21d201a7.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
9、`replace（substr，replacement）`用于在字符串中用一些字符替换另一些字符
>**substr：必须。是被替换掉的对象<br/>replacement：必须。新对象**

```html
<script>
var str="how are you?";
document.write(str.replace("are","ni"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-8e80f08d6f9d584e.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="hello world";
document.write(str.replace("l","a"));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-95f44c3160057c71.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
10、<br/>
`toLowerCase（）`：用于把字符串转换为小写<br/>
`toUpperCase（）`：用于把字符串转换为大写
```HTML
<script>
var str="Hello World";
document.write(str.toLowerCase());
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-adff11cb77d2e7c7.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<script>
var str="Hello World";
document.write(str.toUpperCase());
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-64ed4c7b0685c1f3.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
<hr/>
## 数学（MATH）类
<hr/>
### Math常用属性：<br/>
`Math.PI`返回圆周率（约等于3.1415926）
```html
<script>
document.write("PI：" + Math.PI);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d3df080ba1e26a8e.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

`Math.LOG10E`返回以10为底的e的对数（约等于0.434）
```html
<script>
document.write("LOG10E：" + Math.LOG10E);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-f801c70ec4aa4c73.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
`Math.SQRT2`返回2的平方根（约等于1.414）
```html
<script>
document.write("SQRT2：" + Math.SQRT2);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-02c969d4be767846.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
Math常用方法：<br/>
1、`Math.abs（x）`返回数的绝对值
```html
<script>
document.write(Math.abs(7.25) + "<br/>");
document.write(Math.abs(-7.25) + "<br/>");
document.write(Math.abs(7.25-10));
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-131c657cef6e1caa.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
2、`Math.ceil（x）`可对一个数进行上舍入
```html
<script>
document.write(Math.ceil(0.60) + "<br/>");
document.write(Math.ceil(0.40) + "<br/>");
document.write(Math.ceil(4.1) + "<br/>");
document.write(Math.ceil(-4.1) + "<br/>");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-dae9e540671e7fa2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
3、`Math.floor（x）`对一个数进行下舍入
```html
<script>
document.write(Math.floor(3.6) + "<br/>");
document.write(Math.floor(0.60) + "<br/>");
document.write(Math.floor(0.40) + "<br/>");
document.write(Math.floor(4.1) + "<br/>");
document.write(Math.floor(-4.1) + "<br/>");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-e6c417425448eded.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
4、`Math.max（x……）`返回指定的数中最大的数
```html
<script>
document.write(Math.max(5,7,9) + "<br/>");
document.write(Math.max(2.4,5.3,5.4) + "<br/>");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d10fa909bc708a3a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**Math.min（）的用法与其相同**

5、`random（）`返回介于0.0~1.0之间的一个随机数
```html
<script>
document.write(Math.random() + "<br/>");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-3d8becf23913238d.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
返回介于0.0~10.0之间的随机数，也可取整（使用floor或者ceil）：
```html
<script>
document.write((Math.random()*10)+1);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d699cd2855f34710.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
6、`Math.round（x）`把一个数字舍入为最接近的整数
```html
<script>
document.write(Math.round(0.7) + "<br/>");
document.write(Math.round(3.6) + "<br/>");
document.write(Math.round(2.4) + "<br/>");
document.write(Math.round(5.5) + "<br/>");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-91899bf44d50fb4f.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
