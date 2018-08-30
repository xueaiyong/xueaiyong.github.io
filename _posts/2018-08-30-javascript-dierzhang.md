---
layout: post
title:  "JavaScript从入坑到被埋——第二章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

## JavaScript语言基础之基本语法、数据类型
### 一、js基本语法
#### 1、区分大小写：
JavaScript中的变量、函数名和操作符都区分大小写，关键字不能做变量或函数名字。所以，test和Test是两个变量，var因是关键字所以不能是函数名或者变量名。
#### 2、标识符的命名规则：就是变量、函数、属性、函数的参数等。规定：
   （1）第一个字符必须是字母、下划线(_)、美元符号（$）。
   （2）其他字符可以是字母、下划线、美元符号或数字。
#### 3、注释：分为单行注释和多行（块）注释
（1）单行注释// 如： 
    //这是一个单行注释
（2）多行注释  /**/     如：
   
	
#### 4、语句。JavaScript中语句以一个;结尾（英文分号），但可以省略 。比如：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d1874be56335d267.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
#### 5、在控制语句中，单行语句可以不加{}（不放在代码块中），但强烈加上——即使代码块中只有一条语句。多行语句如果放在一个代码块中执行，必须加{}
如：
```html
<script>
if(xxx)
{
          alert("强烈建议你加上花括号哦");
}
</script>
```
### 二、数据类型
#### JavaScript是弱类型脚本语言，使用变量之前，无须定义，想使用某个变量时直接使用即可，JavaScript会根据需要自动确定数据类型和进行数据类型的转换，但每个变量还是要确定数据类型的。
   JavaScript中数据类型分为基本数据类型（简单数据类型）和复合数据类型（复杂数据类型）两类，不同大类下面又有自己的小类，如下表：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-6c06c973aedc46fc.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
代码演示：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-c6ac85664e153558.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
`parseInt()`：将字符串转换为整数。
规则：<br/>
A、它会忽略字符串前面的空格，直至找到第一个非空格字符，如果第一个字符不是数字字符或者负号，则返回NaN。<br/>
B、转换空字符串返回NaN。<br/>
C、如果第一个字符是数字字符，会接着进行解析，直到完成或者遇到非数字字符。
例如：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-c1e3d7e21b2b68d4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
`parseFloat`：将一个字符串转成浮点数。
区别：<br/>（1）字符串中的第一个小数点是有效的，第二个小数点是无效的，后面的字符串会被忽略。
“22.34.5” 转成  22.3
（2）始终会忽略前导0（把前导0直接去掉），十六进制数始终被转成0，只解析十进制数，所以没有第二个参数。即只能转成十进制
（3）字符串中没有小数点或小数点后边全是0，则该函数返回整数。
例如：<br/>
```html
<script type="text/javascript">
var num=parseFloat("1234abcd");
alert(num);    //1234，a是无效字符，之前的转成整数

var num=parseFloat("0xA");
alert(num);    //十六进制全转化为0

var num=parseFloat("22.5");
alert(num);    //22.5  正确转

var num=parseFloat("22.34.5");
alert(num);    //22.34  第二个.之后的无效

var num=parseFloat("0908.5");
alert(num);     //908.5  忽略前边的0

var num=parseFloat("3.125e7");
alert(num4);     //3.1250000  讲科学计算法转成普通数值
</script>
```
`NaN`：(Not a Nmuber)。表示一个本来要返回数值的操作未返回数值的情况。<br/>比如：<br/>
```javascript
alert(0/0);    //NaN
alert("abc"/2);    //NaN
```
①任何涉及NaN的操作如（NaN/10）都会返回NaN。
②NaN与任何值都不想相等，包括NaN本身。如：alert(Nan==Nan);  //false
`isNaN`：用来判断数值是否“不是数值”
不是数值时返回true，否则，返回false。比如，<br/>
```javascript
alert(isNaN('a'/3));     //返回true
alert(isNaN(4/3));      //返回false
alert(isNaN(3/3));      //返回false
alert(isNaN(0/0));      //返回true
alert(isNaN(0/1));      //返回false
```
`length`：该属性返回字符串的长度
```javascript
alert("abc123哈哈".length);    //8
alert("哈哈".length);        //2
alert("abc".length);        //3
alert("2132".length);     //4
```
>**返回字符串的个数**

`toString()`：可以将数值转化为字符串（出了null和undefined值）
```html
<script type="text/javascript">
var age=111;
var c=age.toString();
alert(c);      //将数值转换为字符串   “111”
</script>
```
可先转换为二进制：
```html
<script type="text/javascript">
var age=42;
var c=age.toString(2);
alert(c);      //101010
</script>
```
二进制转换详见——杂项
## 变量
###### JavaScript的变量是松散型的，所松散型就是可以用来保存任何类型的数据；并且一个变量的值类型是可变的。
一、定义方式
1、使用var操作符（关键字），后跟变量名的形式。
  ```html
<script type="text/javascript">
var message;             //表示message是一个变量
var message="hello world";      //定义时直接赋初值
alert(message);        //hello JavaScript
message=10;    		//可以改变变量的类型，但不推荐
alert(message);        //10
</script>
```
2、不使用var关键字，用时直接赋初值（不推荐）
```html
<script type="text/javascript">
message="hello world";      //定义时直接赋初值
alert(message);        //hello JavaScript
message=10;    		//可以改变变量的类型，但不推荐
alert(message);       //10
</script>
```
二、作用范围
根据范围不同，变量分为：全局变量和局部变量
函数外边直接定义的变量称为全局变量，函数内部定义的变量称为局部变量。
如：<br/>
```html
<script type="text/javascript">
var test="全局变量";
function fun()
{
	var test="局部变量";
	alert(test);      //输出局部变量
}
fun();
alert(test);         //输出全局变量
</script>
```
三、使用var和不使用var的区别：
A、使用var定义变量，系统会强制定义一个新变量；
B、不使用var定义变量，系统会优先在当前上下文中搜索是否存在该变量，只有变量不存在的前提下，才会重新定义一个新变量。
例如：
```html
<script type="text/javascript">
var test="全局变量";     //定义全局变量
function fun()
{
	alert(test);   //输出undefind
	var test="局部变量";    //定义局部变量
	alert(test);	   //输出局部变量
}
fun();
alert(test);     //输出全局变量
</script>
```
```html
 
```
## 运算符
![image.png](https://upload-images.jianshu.io/upload_images/13570975-01075c8506084c26.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
##### 下面对重要的运算符做简单解释：
1、+：既是字符串运算符又是加法运算符，在进行变量的运算时取决于变量的类型。
        数字字符串和数值相加时，数值自动转为字符串再运算；想减时，字符串自动转为数值再运算。
![image.png](https://upload-images.jianshu.io/upload_images/13570975-3b669c21f3f6e9d8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
2、==和===区别（！=和！==区别相同）
==：先进行类型转换，再比较类型和值。（值相等，类型不同，则为true）
===：不进行类型转换，比较类型和值。（值相等，类型相同，才为true）
![image.png](https://upload-images.jianshu.io/upload_images/13570975-ea53355ff282a99a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
解析：<br/>5位数值类型，"5"为字符串类型，当alert(5=="5");时，先进行类型转换，把后面的字符串5转换为数值5，因此，返回true。当alert(5==="5");时，不进行类型转换，前5为数值5，后5为字符串5，因此，不相等！返回false。<br/>
<br/>
3、关系运算符也可以比较字符串，规则是按照字母的Unicode值进行比较，若第一个字母相同，则进行第二个的比较，以此类推。
```javascript
alert("z">"abc");  //true
alert("abc"<"xyz");  //true
alert("ABC">"ABB");   //true
```
4、instanceof判断某个变量是否为指定类的实例。
![image.png](https://upload-images.jianshu.io/upload_images/13570975-3e3f729151094ff4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
