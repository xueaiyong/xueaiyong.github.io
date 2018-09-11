---
layout: post
title:  "JavaScript从入坑到被埋——第四章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

### 浏览器对象介绍
浏览器是js程序的宿主，为了能够和js程序进行通信，比如获得浏览器的信息和对浏览器做出响应。浏览器为js解释器提供了应用接口，它提供了很多宿主对象（浏览器对象）来完成这些操作，可以使用户能创建跟多精美的网页动态效果，这种宿主对象被称为BOM（Brower Object Model，浏览器对象模型）。
对象主要有：Window、navigator、screen、history、location等
>**其中，Window对象是一个顶层对象，其它对象都有该对象派生。**

### WINDOW对象介绍
#### 说明
1、window对象表示浏览器中打开的窗口。<br/>
2、如果文档包含框架（frame或iframe标签），浏览器会为HTML文档创建一个window对象，并为每个框架创建一个额外的window对象。<br/>
3、没有应用与window对象的公开标准，不过所有浏览器都支持该对象。<br/>
>**window对象表示一个浏览器窗口或一个框架。在客户端js中，window对象是全局对象，所有的表达式都在当前环境中计算。也就是说，要引用当前对象根本不需要特殊的语法，可以把那个窗口的属性作为全局变量来使用。例如，可以只写document，而不必写window.document**

### window对象的属性
`defaultStatus`设置或返回窗口状态栏中的默认文本
```html
<script>
window.defaultStatus="我是编程班的学生，我爱学习";
document.write(window.defaultStatus);
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b6ad2beba30f5b93.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

`document`对Document对象的只读引用，代表Document对象
>**（1）每个载入浏览器的HTML文档都会成为Document对象<br/>（2）Document对象可以从脚本中对HTML页面中的所有元素进行访问**

`history`获取到history对象
>**（1）History对象包含用户（在浏览器窗口中）访问过的URL<br/>（2）History对象是window对象的一部分，可以通过window.history属性对其进行访问**

`location`获取到location对象
>**（1）location对象包含有关当前URL的信息<br/>（2）Location对象是window对象的一部分，可以通过window.Location属性对其进行访问**

`self`返回对窗口自身的只读引用。等价于window属性
>**window.self其实就等于window**

`top`返回最顶层的先辈窗口
>**该属性返回对一个顶级窗口的只读引用。如果窗口本身就是一个顶级窗口，top属性存放对窗口自身的引用。如果窗口是一个框架，那么tio属性引用包含框架的顶级窗口**

### WINDOW对象常用方法<br/>
1、`alert（）`显示带有一段信息和一个确认按钮的警告框
```html
<script>
alert("我爱学习");
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-fcd3c16386cd57f2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
2、`confirm（）`显示带有一段信息以及确认按钮和取消按钮的对话框
>**（1）如果点击确定按钮，则返回true，如果点击取消按钮<br/>（2）在用户点击确定按钮或取消按钮把对话框关闭之前，它将阻止用户对浏览器的所有输入。在调用confirm（）时，将暂停对js代码的执行，在用户做出响应后才会执行下一条语句**

```html
<input type="button" onclick="confirm('你点俺干啥？')" value="点我" />
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-75d24a4c928350ab.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
3、`prompt（）`用于显示可提示用户进行输入的对话框
>**prompt（text,defaultText）<br/>text：可选。要在对话框中显示的纯文本（而不是HTML格式的文本）<br/>defaultText：可选。默认输入的文本**

```html
<input type="button" onclick="prompt('你想输点啥？')" value="点我" />
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-6402ee3dcdceb90c.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**返回值：<br/>（1）如果用户单击提示框的“取消”按钮，则返回null<br/>（2）如果用户单击“确认”按钮，则返回输入字段当前显示的文本**

4、`setInterval（）`可按照指定的周期（以毫秒计）来调用函数函数或计算表达式
>**参数：setInterval（code,millisec）<br/>code：必需。要调用的函数或要执行的代码串<br/>millisec：必需。周期性执行或调用code之间的时间间隔，以毫秒计<br/>**

案例一：
```html
<script>
function clock()
{
	var time=new Date();
	var time=time.toLocaleString();
	document.getElementById('clock').value=time;
}
var i=setInterval("clock()",1000);   //🙉不停地调用clock方法
</script>
```
案例二：
```html
<!DOCTYPE html>
<html>
<style>
body{background-color:white;}
</style>
<body>
<!-- 时钟-->
<input type="text" id="wb" />
<input type="button" value="开始" onclick="start()" />
<input type="button" value="暂停" onclick="stop()" />
<input type="button" value="重置" onclick="reset()" />
<script>
var c=0;
var t;
function start()
{
	t=window.setInterval("clock()",0);
}
function clock()
{	
	document.getElementById('wb').value=c;
	c=c+1;
}
function stop()
{
	window.clearInterval(t);
}
function reset()
{
	window.location.reload();
}
</script>
</body>
</html>
```
>**（1）setInterval()方法会不停地调用函数，直到clearInterval()被调用或窗口被关闭<br/>（2）由setInterval()返回的ID值可用作clearInterval()方法的参数**

5、`clearInterval（）`可取消先前的setInterval（）方法
>**参数：clearInterval（id_of_setinterval）<br/>id_of_setinterval：由setInterval（）返回的ID值**

6、`setTimeout`用于在指定的毫秒数后调用函数或计算表达式
```html
<input type="text" id="wb" />
<input type="button" value="开始" onclick="clock()" />
<input type="button" value="暂停" onclick="stop()" />
<input type="button" value="重置" onclick="reset()" />
<script>
var c=0;
var t;
function clock()
{	
	document.getElementById('wb').value=c;
	c=c+1;
	t=setTimeout("clock()",500);
}
function stop()
{
	clearTimeout(t);
}
function reset()
{
	window.location.reload();
}
</script>
```
7、`clearTimeout（）`该方法可取消由setTimeout（）方法设置的timeout
>**语法：clearTimeout(id_of_settimeout)<br/>注：id_of_settimeout：为settimeout（）的返回值**

8、`open（）`用于打开一个新的浏览器窗口或查找一个已命名的窗口
>**Window.open（URL，name，features，replace）<br/>URL：声明了在窗口中新的文档URL，如果省略，那么就会默认打开一个空白文档<br/>name：可以定义target值，如_self，_blank等<br/>features：设置状态栏、滚动条等<br/>replace：需要替换的URL地址**

```html
<script>
function fun()
{
	window.open("https://www.baidu.com","_self");
}
</script>
```

```html
<body>
<input type="button" value="新页面" onclick="fun()" >
<script>
function fun()
{
	myWindow=window.open('','','width=200,height=200');
	myWindow.document.write("你想看点啥");
}
</script>
</body>
```

![image.png](https://upload-images.jianshu.io/upload_images/13570975-1419687ae57996dd.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

9、`close（）`用于关闭浏览器窗口
```html
<input type='button' value="关闭" onclick="guan()" />
<script>
function guan()
{
	window.close();
}
</script>
```
10、`print（）`用于打印当前窗口的内容
```html
<input type='button' value="打印" onclick="a()" />
<script>
function a()
{
	window.print();
}
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-68b01385b2ade3a6.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
