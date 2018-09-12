---
layout: post
title:  "JavaScript从入坑到被埋——第八章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

#### 修改HTML元素
###### 访问到指定的HTML元素之后，就可以对该元素进行修改了，通过修改HTML元素就可以实现动态更新HTML页面了。
修改HTML元素通常通过修改如下几个属性：<br/>
（1）innerHTML：设置或获取对象及其内容的HTML形式，可以在页面中加入其它HTML元素内容。<br/>
（2）innerText：设置或获取对象的纯文本形式。<br/>
（3）value：表单控件中有value属性的呈现内容由该属性控制。<br/>
（4）option【index】：直接对`<select>`元素指定列表赋值，可以改变列表框、下拉菜单的指定列表项。<br/><br/>
innerHTML的用法：
```html
<body>
<div id='d1'>这里的内容不会改变</div>
<div id='d2'>这里的内容将改变</div>
<input type="text" id='txt' value='美工' />
<input type='button' value='替换' onclick="fun()" />
<script>
function fun()
{
	var d2=document.getElementById('d2');
	var txt=document.getElementById('txt');
	d2.innerHTML="这里的内容将会改变";
	txt.value="编程";
}
</script>
</body>
```

#### 增加HTML元素
###### js可以为DOM动态增加节点，程序为DOM树增加节点时，页面会动态地增加HTML元素。需要按照2个步骤完成HTML元素增加：
（1）创建或赋值节点<br/>
（2）添加节点
###### 一、创建或复制节点
1、创建节点通常使用document对象的getElement（）方法实现。
>语法：document.createElement（“合法的HTML标签”）

比如，创建div标签：
```javscript
var a=document.createElement（“div”）；  //a为div标签对应的对象（HTMLDivElement）
```
2、复制节点
>语法：Node cloneNode（boolean deep）；复制当前节点

##### deep为true时，复制当前节点的同时，也复制该节点的全部后代节点，为false时，表示仅复制当前节点。
```html
<body>
<ul id='u'>
	<li>第一个节点</li>
</ul>
<input type="button" value="复制" onclick="fun()" /> 
<script>
function fun()
{
	var ul=document.getElementById('u');
	var li=ul.firstChild.nextSibling.cloneNode(false);
	li.innerHTML="我是被复制出来的呦";
	ul.appendChild(li);
}
</script>
</body>
```
###### 二、添加节点
当一个节点创建完成后，一定还需将该节点添加到DOM中才行，可使用如下方法添加：
>（1）appendChild（Node newNode）：将newNode添加成当前节点的最后一个子节点（放到最后）。
（2）insertBefore（Node newNode，Node refNode）：在refNode节点前插入newNode节点。<br/>
（3）replaceChild（Node newChild，Node oldChild）：将oldChild节点替换成newChild节点。

insertBefore：
```html
<body>
<ul id='test'><li id='javascript'>javascript</li><li id="mysql">mysql</li><li id="div">div</li></ul>
<input type="button" value="复制" onclick="fun()" /> 
<script>
function fun()
{
	var test=document.getElementById('test');
    var mysql=document.getElementById('mysql');
  	var newnode=document.createElement('li');
  	newnode.innerHTML="我是插入在mysql之前的php";
  	test.insertBefore(newnode,mysql);
}
</script>
</body>
```
replaceChild：
```html
<body>
<ul id='test'><li id='javascript'>javascript</li><li id="mysql">mysql</li><li id="div">div</li></ul>
<input type="button" value="复制" onclick="fun()" /> 
<script>
function fun()
{
	var test=document.getElementById('test');
    var mysql=document.getElementById('mysql');
  	var newnode=document.createElement('li');
  	newnode.innerHTML="我是来替换mysql的php";
  	test.replaceChild(newnode,mysql);
}
</script>
</body>
```
###### 三、为列表框、下拉菜单添加选项
2种方法：<br/>
（1）调用HTMLSelectElement的add（）方法。<br/>
（2）直接为`<select>`的某个选项赋值。<br/><br/>
1、add（）：向`<select>`添加一个`<option>`元素。
>语法：selectObject.add（option，before）

|参数|描述|
|:-|:-|
|option|必需。要添加选项元素。必需是option或optgroup元素|
|before|必需。在选项数组的该元素之前增加新的元素。如果该参数是null，元素添加到选项数组的末尾|

```html
<body>
选择你喜欢的水果：
<select id='se'><option id='xj'>香蕉</option><option id='bl'>菠萝</option><option id='cm'>草莓</option></select>
<input type="button" value="复制" onclick="fun()" /> 
<script>
function fun()
{
	var se=document.getElementById('se');
	var op=document.createElement('option');
	var cm=document.getElementById('cm');
	op.innerHTML="哈密瓜";
	se.add(op,cm);
}
</script>
</body>
```
2、直接添加
>参数：new Option（呈现文本，value值，默认是否被选中，当前是否被选中）

```html
<body>
选择你喜欢的水果：
<select id='se'><option id='xj'>香蕉</option><option id='bl'>菠萝</option><option id='cm'>草莓</option></select>
<input type="button" value="复制" onclick="fun()" /> 
<script>
function fun()
{
	var se=document.getElementById('se');
	var len=se.options.length;
	var op=new Option("柠檬",'nimeng',true,true);
	se.options[len++]=op;	
}
</script>
</body>
```

#### 删除HTML元素
###### 一、删除HTML中节点
>方法：removeChild（）
语法格式：obj_Node.removeChild（sChildNode）
参数：sChildNode节点时要被删除的子节点
返回值：返回对删除节点的引用

```html
<body>
<div id='yi'>我是元素1</div><div di="er">我是元素2</div>
<input type="button" value="删除" onclick="fun()" /> 
<script>
function fun()
{
	var a=document.getElementById('yi');
	var f=a.parentNode;
	f.removeChild(a.nextSibling);
}
</script>
</body>
```
#### 二、删除列表框、下拉菜单中的选项
方法一：remove（index）删除一个option元素
```html
<body>
选择你喜欢的水果：
<select id='se'><option id='xj'>香蕉</option><option id='bl'>菠萝</option><option id='cm'>草莓</option></select>
<input type="button" value="删除草莓" onclick="fun()" /> 
<script>
function fun()
{
    var se=document.getElementById('se');
  	se.remove(se.length--);
}
</script>
</body>
```
方法二：removeChild（）
```html
<body>
选择你喜欢的水果：
<select id='se'><option id='xj'>香蕉</option><option id='bl'>菠萝</option><option id='cm'>草莓</option></select>
<input type="button" value="删除" onclick="fun()" /> 
<script>
function fun()
{
    var se=document.getElementById('se');
	var s=se.firstChild.nextSibling;
	se.removeChild(s);
}
</script>
</body>
```
