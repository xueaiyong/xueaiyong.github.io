---
layout: post
title:  "JavaScript从入坑到被埋——第七章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

## 访问HTML元素
#### 一、说明：
为了能够动态的修改HTML元素，必须首先能访问到HTML元素，DOM提供了2种方式来访问HTML元素。
###### （1）根据ID或Name访问HTML元素：使用getElementById（）和getElementTagName（）和getElementByName（）方法。
###### （2）利用节点关系访问HTML元素：使用一个元素节点parentNode、firstChild以及lastChild属性等。
#### 二、节点中常用的属性（每个节点都有）

|属性名|返回值类型|作用
|:--|:--|:--|
|nodeName|DOMString|返回节点名字|
|nodeValue|DOMString|返回和设置节点值|
|nodeType|int|返回节点类型|
|parentNode|Node|返回当前节点的父节点，只读|
|previousSibling|Node|返回当前节点的一个兄弟节点，只读|
|nextSibling|Node|返回当前节点的后一个兄弟节点，只读|
|childNodes|Node[]|返回当前节点的所有子节点，只读|
|firstChild|Node|返回当前节点的第一个子节点，只读|
|lastChild|Node|返回当前节点的最后一个子节点，只读|
|attributes|NamedNodeMap|返回该节点所有属性|

js代码中获取节点：
```html
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>撸起袖子加油干</title>
<body>
<ol id="myclass"><li id="p1">PHP1班</li><li id='p2'>PHP2班</li><li id='p3'>PHP3班</li><li id='m1'>美工1班</li><li id='m2'>美工2班</li><li id='m3'>美工3班</li></ol>
<script>
//当前节点
var nNode=document.getElementById('p2');
alert(nNode.nodeName);    //li
alert(nNode.innerHTML);   //PHP2班

//父节点
var pNode=nNode.parentNode; 
alert(pNode.nodeName);    //ol
alert(pNode.innerHTML);   //输出ol里面的所有内容

//父节点中的第一个子节点
var fNode=nNode.parentNode.firstChild;
alert(fNode.nodeName);    //li
alert(fNode.innerHTML);   //PHP1班

//父节点中的最后一个子节点
var lNode=nNode.parentNode.lastChild;
alert(lNode.nodeName);    //li
alert(lNode.innerHTML);   //美工3班

//当前节点的前一个兄弟节点
var q=nNode.previousSibling;
alert(q.nodeName);       //li
alert(q.innerHTML);     //PHP1班

//当前节点的后一个的后一个兄弟节点
var h=nNode.nextSibling.nextSibling;
alert(h.nodeName);     //li
alert(h.innerHTML);    //美工1班
</script>
</body>
</html>
```
>每个节点之间的空白节点（空格、回车和Tab符）不同的浏览器会做不同的处理，有的会作为一个单独的节点，有的不会。在IE下，会忽略空白节点，但是遵循W3C规范的浏览器（Chrome、Firefox、Safari等）则不会。所以最后将节点与节点之间的空白去掉。


## 访问表单控件
###### 表单在DOM中由HTMLFormElement对象表示，该对象除了可以调用之前介绍的基本属性和方法外，还有几个常用的属性和方法：

|方法、属性|作用|
|:-|:-|
|action|访问或设置表单的action属性值，可读写|
|elements[]|返回表单内全部控件所组成的数组，可访问表单内任何表单控件，只读|
|length|返回表单内表单域的个数|
|method|返回该表单的method属性，只有post和get两个，默认get，读写|
|target|用于表单提交时结果窗口，值是_self、_parent、_top、_blank等，读写|
|reset（）|使用该方法重设表单，设置为初始值，相当于点击reset按钮|
|submit（）|提交表单，相当于点击submit属性值的按钮|

1、`elements`集合：返回包含表单中所有元素的数组
```html
<body>
<form id='myform'>
姓名：<input type="text" value="光头强" id='gtq' />
密码：<input type='password' value='321' id='mm' />
<input type="button" value='提交' id='tj' /><br/>
<script>
var x=document.getElementById('myform');
for(var i=0;i<=x.length;i++)
{
	document.write("第"+i+"个节点的id是"+x.elements[i].id+"<br/>");
	document.write("第"+i+"个节点的值是"+x.elements[i].value+"<br/>");
	document.write("第"+i+"个节点的类型是"+x.elements[i].type+"<br/>");
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-039f5eab649fa235.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

2、`submit（）`：把表单数据提交到Web服务器
```html
<body>
<form id='myform'>
姓名：<input type="text" value="光头强" id='gtq' />
密码：<input type='password' value='321' id='mm' />
<input type="button" value='提交' id='tj' onclick='fun()' /><br/>
<script>
function fun()
{
	document.getElementById('myform').submit();
}
</script>
</body>
```
>button不具备提交功能，调动函数后就具备了提交功能

## 访问列表框、下拉菜单的选项
一、说明：<br/>
1、HTMLSelectElement代表一个列表框或下拉菜单。<br/>
2、在HTML表单中，`<select>`标签每出现一次，一个`select`对象就会被创建。<br/>
3、您可通过遍历表单的element[ ]数组来访问某个Select对象，或者使用document.getElementById（）。<br/>
二、常用属性：

|属性|作用|
|:-|:-|
|options[]|返回包含下拉列表中的所有选项的一个数组|
|disabled|设置或返回是否禁用下拉列表|
|id|返回下拉列表的id|
|length|返回下拉列表中的选项数目|
|multiple|设置或返回是否选择多个项目|
|name|设置或返回下拉列表的名称|
|selectedIndex|设置或返回下拉列表中被选项目的索引号|

三、常用方法：

|方法名|作用|
|:-|:-:|
|add（）|向下拉列表添加一个选项|
|blur（）|从下拉列表移开焦点|
|focus（）|在下拉列表上设置焦点|
|remove（）|从下拉列表中删除一个选项|

###### 注意，selected下的每个选项是HTMLOptionElement的对象，该对象有如下属性和方法：

|属性名|作用|
|:-|:-|
|defaultSelected|返回该选项默认是否被选中，只读|
|index|返回该选项在下拉列表中索引位置|
|selected|设置或返回该选项是否被选中，通过修改该属性可以动态改变该选项是否被选中
|text|设置或返回某个选项的纯文本值（显示出来的文本）|
|value|设置或返回每个选项的value值，可以通过设置该属性来改变选项的value值|

1、`option`集合：返回包含`<select>`元素中所有`<option>`的一个数组
>数组中的每一个元素对应一个`<option>`标签，从0开始。

```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option>苹果</option>
		<option>橘子</option>
		<option>香蕉</option>
		<option>菠萝</option>
	</select>
	<br/><br />
	<input type="button" onclick="getOptions()" value="输出所有选项值" />
	<input type="button" onclick="delOptions()" value="清除所有选项值" />
	<input type="button" onclick="delOneOptions()" value="每点击一次，清除一个选项值" />
</form>
<script>
function getOptions()
{
	var x=document.getElementById('myselect');
	for(i=0;i<x.length;i++)
	{
		document.write(x.options[i].text+"<br/>");
	}
}

function delOptions()
{
	var x=document.getElementById('myselect');
	x.options.length=0;
}

function delOneOptions()
{
	var x=document.getElementById('myselect');
	x.options.length--;
}
</script>
</body>
```
2、`id`属性：设置或返回下拉列表的id。【可读写】
```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option id='haha'>苹果</option>
		<option id='hehe'>橘子</option>
		<option id='xixi'>香蕉</option>
		<option id='heihei'>菠萝</option>
	</select>
	<br/><br />
	<input type="button" onclick="getOptions()" value="输出所有选项的id值" />
</form>
<script>
function getOptions()
{
	var x=document.getElementById('myselect');
	for(i=0;i<x.length;i++)
	{
		document.write(x.options[i].id+"<br/>");
	}
}
</script>
</body>
```

>name属性与此相同

3、`selected`属性：设置或返回选项的selected属性值（true为选中，false为没选中）
```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option id='haha'>苹果</option>
		<option id='hehe'>橘子</option>
		<option id='xixi'>香蕉</option>
		<option id='heihei'>菠萝</option>
	</select>
	<br/><br />
	<input type="button" onclick="getOptions()" value="输出所有选项的id值" />
</form>
<script>
function getOptions()
{
	var x=document.getElementById('myselect');
	for(i=0;i<x.length;i++)
	{
		document.write(x.options[i].selected+"<br/>");
	}
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-0de5b44f12715d86.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
4、`selectedIndex`属性 ：设置或返回选中option选项的索引号
```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option id='haha'>苹果</option>
		<option id='hehe'>橘子</option>
		<option id='xixi'>香蕉</option>
		<option id='heihei'>菠萝</option>
	</select>
	<br/><br />
	<input type="button" onclick="getOptions()" value="输出选项的索引值" />
</form>
<script>
function getOptions()
{
	var x=document.getElementById('myselect');
	document.write(x.selectedIndex+"<br/>");
}
</script>
</body>
```

###### 选中橘子：
```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option id='haha'>苹果</option>
		<option id='juzi'>橘子</option>
		<option id='xixi'>香蕉</option>
		<option id='heihei'>菠萝</option>
	</select>
	<br/><br />
	<input type='button' onclick='fun()' value='选中橘子' />
</form>
<script>
function fun()
{
	document.getElementById('juzi').selected=true;
}
</script>
</body>
```
5、`text`属性：设置或返回选项的文本值
```html
<body>
<form>
	选择你喜欢的水果：
	<select id="myselect">
		<option id='haha'>苹果</option>
		<option id='juzi'>橘子</option>
		<option id='xixi'>香蕉</option>
		<option id='heihei'>菠萝</option>
	</select>
	<br/><br />
	<input type='button' onclick='fun()' value='点我显示被选的文本' />
</form>
<script>
function fun()
{
	var x=document.getElementById('myselect');
	alert(x.options[x.selectedIndex].text);
}	
</script>
</body>
```
6、`remove（）`方法：从下拉列表中删除一个选项
>参数remove（index）
index为索引值

```html
<body>
<form>
    选择你喜欢的水果：
    <select id="myselect">
        <option id='haha'>苹果</option>
        <option id='juzi'>橘子</option>
        <option id='xixi'>香蕉</option>
        <option id='heihei'>菠萝</option>
    </select>
    <br/><br />
    <input type='button' onclick='fun()' value='点击4次，删除选项' />
</form>
<script>
function fun()
{
    var x=document.getElementById('myselect');
    x.remove((x.options.length)-1);
}   
</script>
</body>
```
7、`add（）`方法：向下拉列表添加一个选项
>参数：add（option,before）<br/>
option：创建的对象<br/>
before：在哪个option选项之前

```html
<body>
<form>
    选择你喜欢的水果：
    <select id="myselect">
        <option id='haha'>苹果</option>
        <option id='juzi'>橘子</option>
        <option id='xixi'>香蕉</option>
        <option id='heihei'>菠萝</option>
    </select>
    <br/><br />
    <input type='button' onclick='return fun()' value='点击我，添加选项' />
</form>
<script>
function fun()
{
    var x=document.getElementById('myselect');
    var optionobj=document.createElement('option');
   	optionobj.value="4";
   	optionobj.text="火龙果";
    x.add(optionobj,x.options[1]);
}   
</script>
</body>
```
手动添加一个选项：
```html
<body>
    选择你喜欢的水果：
    <select id="myselect">
        <option id='haha'>苹果</option>
        <option id='juzi'>橘子</option>
        <option id='xixi'>香蕉</option>
        <option id='heihei'>菠萝</option>
    </select>

    <br/><br />
	添加选项：<input type="text" id="sg">
    <input type='button' onclick='fun()' value='添加' />
	
<script>
function fun()
{   var sg=document.getElementById("sg").value;
    var selOBJ=document.getElementById("myselect");
	var op=document.createElement("option");
	if(sg!='')
	{
	  op.text=sg;
	  selOBJ.add(op,null);
	  alert("添加成功");
	  document.getElementById('sg').value=null;
	}
	else
	{
		alert('添加失败');	
	}
}   
</script>
</body>
```