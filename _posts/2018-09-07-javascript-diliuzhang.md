---
layout: post
title:  "JavaScript从入坑到被埋——第六章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---


## 核心DOM和HTMLDOM
#### 一、核心DOM
#### 1、概念：<br/>
###### DOM（文档对象模型）是W3C制定的一簇规范，是独立于平台和语言的一系列接口定义。通过应用程序实现这些接口，用户可以通过固定的方式访问、修改文档内容、结构和样式，而不管使用哪种语言编写应用程序，也不管哪个平台上运行应用程序。<br/>
Core DOM：定义了一套标准的针对任何结构化文档的对象。<br/>
XML DOM：定义了一套标准的针对XML文档的对象。<br/>
HTML DOM：定义了一套标准的针对HTML文档的对象。
#### 2、节点和节点树<br/>
###### A：节点：根据DOM，HTML文档中的每个成分都是一个节点
DOM是这样规定的：<br/>
（1）整个文档是一个文档节点。【文档节点】<br/>
（2）每个HTML标签是一个元素节点。【元素节点】<br/>
（3）包含在HTML元素中的文本是文本节点。【文本节点】<br/>
（4）每一个HTML属性是一个属性节点。【属性节点】<br/>
（5）注释属于注释节点。【注释节点】<br/>
###### B：Node层次：节点彼此都有等级关系
HTML文档中的所有节点组成了一个文档树（或节点树）。HTML文档中的每个元素、属性、文本等都代表着数中的一个节点。树起始于文档节点，并由此继续伸出纸条，直到处于这棵树最低级别的所有文本节点为止。
下面这个图片表示一个文档树（节点树）：
![image.png](https://upload-images.jianshu.io/upload_images/13570975-b878cb41d2483218.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
###### C、文档树（节点树）：一颗节点树中的所有节点彼此都是有关系的
比如：<br/>下面这个HTML文档：<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-03d19a76bf36d015.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
说明：<br/>
（1）上面所有的节点彼此间都存在关系。<br/>
（2）父节点：除文档节点之外的每个节点都有父节点。举例，`<head>`和`<body>`的父节点是`<html>`节点，文本节点“hello world！”的父节点是`<p>`节点。<br/>
（3）子节点：大部分元素节点都有子节点。比方说，`<head>`节点有一个子节点：`<title>`节点。<br/>
（4）同辈（同级）节点：当节点有同一个父节点，它们就是同辈（同级节点）。比方说，`<h1>`和`<p>`都是同辈节点，那它们的父节点就是`<body>`节点。<br/>
（5）后代（辈）节点：节点也可以拥有后代，后代指某个节点的所有子节点，或这些子节点的子节点，以此类推。比方说，所有的文本节点都是`<html>`节点的后代，而第一个文本节点是`<head>`节点的后代。<br/>
（6）先辈节点：节点也可以拥有先辈。先辈是某个节点的父节点，或者父节点的父节点，以此类推。比方说，所有的文本都可以把`<html>`节点作为先辈节点。

#### 二、HTML DOM
>定义了用于操作的HTML文档API，它是对核心DOM的扩展。目前，主流浏览器都支持HTML DOM，这也是的实现跨浏览器的操作关键。

相对于核心DOM，制定HTML DOM的主要目的在于：<br/>
（1）指定（选择）和添加用于HTML文档和元素的功能。<br/>
（2）提供一种便利的机制适用于对HTML文档的一般性操作。<br/>
（3）HTML DOM的很多对象模型都来自于核心DOM，如HTMLDocument接口借鉴自核心DOM的Document接口。

## HTML DOCUMENT接口
#### 一、说明：
1、HTMLDocument接口继承自核心DOM的Document接口，它代表加载到浏览器中的HTML文档。<br/>
2、使用window.document属性可以获取对加载文档的应用，该属性返回一个HTMLDocument实例。代表当前window或指定window对象内加载的文档。<br/>
#### 二、Document对象
1、每个载入浏览器的HTML文档都会成为Document对象。<br/>
2、Document对象使我们可以从脚本中对HTML页面中的所有元素进行访问。<br/>
3、Document对象是window对象的一部分，可通过window.document属性对其进行访问。<br/>
#### 三、Document对象集合

|集合|描述|
|:-|:-|
|all[ ]|提供对文档中所有HTML元素的访问|
|anchors[ ]|返回对文档中所有Anchor对象的引用|
|applets|返回对文档中所有Applet对象的引用|
|forms[ ]|返回对文档中所有Form对象的引用|
|images[ ]|返回对文档中所有Area和Link对象的引用|

`forms`集合：返回对文档中所有Form对象的引用

>**语法：document.forms[ ]**

```html
<body>
<form name="form1"></form>
<form name="form2" method="get"></form>
<form id="form3"></form>
<script>
document.write(document.forms.length+"<br/>");  //3
document.write(document.forms[0].name+"<br/>");   //form1  
document.write(document.forms[2].id+"<br/>");   //form3
document.write(document.forms[1].method+"<br/>");   //get
</script>
</body>
```
#### 四、document对象的属性

|属性|描述|
|:-|:-|
|body|提供了对<body>元素的直接访问。对于定义了框架集的文档，该属性引用最外层的<frameset>|
|cookie|设置或返回与当前文档有关的所有cookie|
|domain|返回当前文档的域名|
|lastModified|返回文档被最后修改的日期和时间|
|referrer|返回当前文档的标题|
|title|返回当前文档的标题|
|URL|返回当前文档的URL|

`title`返回当前文档的标题
```html
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>撸起袖子加油干</title>
<body>
<script>
document.write(document.title);
</script>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-329e0db49a1f84d2.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

`URL`返回当前文档的URL
```
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>撸起袖子加油干</title>
<body>
<script>
document.write(document.URL);
</script>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-afa5e40f51ed6ccd.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

#### 五、方法：

|方法|描述|
|:-|:-|
|close（）|关闭用document.open( )方法打开的输出流，并显示选定的数据|
|getElementById（）|返回对拥有指定id的第一个对象的引用|
|getElementsByName（）|返回带有指定名称的对象集合|
|getElementByTagName（）|返回带有指定标签名的对象集合|
|open（）|打开一个流，以收集来自任何document.write（）或document.writeIn（）方法的输出|
|write（）|向文档写HTML表达式或Javascript代码|
|writeIn（）|等同于write（）方法，不同的是在每个表达式之后写一个换行符|

`close（）`关闭一个由document.open方法打开的输出流，并显示选定数据
```html
<body>
<input type="button" value="点我" onclick="fun()" /> 
<script>
function fun()
{
	var c=document.open("text/html","replace");   //打开一个新文档
	var txt="<html><body><h1>学习JavaScript非常有趣！</h1></body></html>";
	c.write(txt);  //将定义的变量（里面存入着html文本）写入新的文档
	c.close();
}
</script>
</body>
```
>（1）如果使用write（）方法动态地输入一个文档，必须记住调用close（）方法，以确保所有文档内容都能显示。（关闭流时可保证所有数据都能写入）<br/>（2）一旦调用了close（），就不应该再次调用write（），因为这会隐式的调用open（）来擦除当前文档并开始一个新的文档。

`open（）`打开一个新文档，并擦除当前文档的内容
>语法：document.open（mimetype,replace）

|参数|说明|
|:-|:-|
|mimetype|可选。规定正在写的文档的类型。默认值是“text/html”|
|replace|可选。当此参数设置后，可引起新文档从父文档继承历史条目|

`getElementById（）`返回对拥有指定ID的第一个对象的引用。
```html
<body>
<input type="text" id="haha" />
<input type="button" value="点我获取id值" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementById('haha');
	alert(a.value);
}
</script>
</body>
```

![image.png](https://upload-images.jianshu.io/upload_images/13570975-b0c6f7848bbb3243.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>如果您要查找文档中一个特定的元素，最有效的方法就是getElementById( )，在操作文档的一个特定的元素时，最好给该元素一个id属性，为它指定一个（在文档中唯一的名称，然后就可以用ID查找想要的元素）。

`getElementsByName（）`返回带有指定的名称的对象集合
```html
<body>
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="button" value="点我获取name值" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementsByName('haha');
	alert(a.length);
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-193a2bf322e52a6a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

![image.png](https://upload-images.jianshu.io/upload_images/13570975-b2368aa0af71a913.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```HTML
<body>
<input type="text" name="haha" />
<input type="button" value="点我获取name值" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementsByName('haha');
	alert(a[0].value="PHP");
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d2c5c780b8508e0a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>有name属性的标签才能使用，比如div就不能使用。另外，因为一个文档中的name属性可能不唯一（如HTML表单中的单选按钮通常具有相同的name属性），所以该方法返回的是元素的数组，而不是一个元素。

`getElementsByTagName（）`返回带有指定标签名的对象的集合
```html
<body>
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="button" value="点我获取标签值" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementsByTagName('input');
	alert(a.length);
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-4a83fb9d7dd952d4.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
```html
<body>
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="text" name="haha" />
<input type="button" value="点我呗" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementsByTagName('input');
	alert(a[0].value="为第一个input元素赋值");
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-aa29d39b3bf07166.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### 重点
##### 一、innerText和innerHTML的区别：
###### innerText：
```html
<body>
<div id='haha'><span class='xixi'>我是隔壁的泰山</span></div>
<input type="button" value="点我" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementById('haha');
	alert(a.innerText);
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-47ffe8cec8893c25.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

###### innerText赋值：
```html
<body>
<div id='haha'><span class='xixi'>我是隔壁的泰山</span></div>
<input type="button" value="点我" onclick="fun()" />
<script>
function fun()
{
	document.getElementById('haha').innerText="<h1>抓住爱情的藤蔓  </h1>";	
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-2ae1579741c809d8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-1ec7fb8bbc6753ad.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)


###### innerHtml：
```html
<body>
<div id='haha'><span class='xixi'>我是隔壁的泰山</span></div>
<input type="button" value="点我" onclick="fun()" />
<script>
function fun()
{
	var a=document.getElementById('haha');
	alert(a.innerHTML);
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-8d73b67124bd3f61.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

###### innerHtml赋值：
```html
<body>
<div id='haha'><span class='xixi'>我是隔壁的泰山</span></div>
<input type="button" value="点我" onclick="fun()" />
<script>
function fun()
{
	document.getElementById('haha').innerHTML="<h1>抓住爱情的藤蔓  </h1>";	
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-93e1e464ed4a765b.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-dc871baf9223edae.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>通过上面代码可知，innerHTML获取标签里面所包含的值，包括HTML标签，innerText获取标签里面所包含的值，不包括里面的标签。通过innerText赋值，不会解析HTML标签，会原样输出。通过innerHTML赋值，会解析HTML标签，不会使标签原样输出。

##### 二、getElementsByTagName和getElementsByNames的共同点
>两者都是返回的数组结合