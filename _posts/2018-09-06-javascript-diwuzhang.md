---
layout: post
title:  "JavaScript从入坑到被埋——第五章"
categories: JS基础课程
tags:  JS基础课程
author: joytom
---

## LOCATION对象
#### 一、说明：
>（1）location对象描述的是某一个窗口对象所打开的网址（包含有关当前的URL的信息）<br/>（2）location对象是window对象的一个部分，可通过window.location属性来访问


#### 二、location对象常用属性

| 属性 |描述|
| :------|:------ | 
| hash |设置或返回从#号开始的URL |
| host | 设置或返回主机名和当前URL的端口号 |
|hostname|设置或返回当前URL的主机名
|href|设置或返回完整的URL
|pathname|设置或返回当前URL的路径部分
|port|设置或返回当前URL的端口号
|protocol|设置或返回当前URL的协议
|search|设置或返回从？号开始的URL

```html
<script>
document.write(location.host+"<br/>");  //返回当前URL的主机名或端口号
document.write(location.hostname+"<br/>");   //返回当前URL的主机名
document.write(location.href+"<br/>");    //返回当前完整的URL
document.write(location.pathname+"<br/>");   //返回当前URL的路径部分
document.write(location.protocol+"<br/>");   //返回当前URL的协议
</script>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-1772e2b71fc9cf11.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**注意：默认的端口80和3306不显示**

###### 上面的例子只是获取值，也可以为这些属性赋值，例如：<br/>
```script
window.location.href="新地址"
```
#### 三、常用方法

|属性|方法
|:---|:---
|assign（）|加载新的文档
|reload（）|重新加载当前文档
|replace（）|用新的文档替换当前文档

`assign（）`加载新文档
```html
<input type="button" value="打开新页面" onclick='open()' />
<script type="text/javascript">
function open()
{
	location.assign("https://www.baidu.com");
}
</script>
```
`reload（）`重新加载当前文档
```html
<input type="button" value="点我刷新" onclick='reset()' />
<script type="text/javascript">
function reset()
{
	window.location.reload();
}
</script>
```
`replace`可用一个新文档取代当前文档
```html
<input type="button" value="点我取代当前URL" onclick='reset()' />
<script type="text/javascript">
function reset()
{
	window.location.replace("https:www.wangchuangcode.cn");
}
</script>
```
>该方法不会再History对象中生成一个新的记录。当使用该方法时，新的URL会覆盖History对象中的当前记录

## HISTORY对象
#### 一、说明
>（1）History对象包含用户（在浏览器窗口中）访问过的URL，即浏览器的浏览历史。<br/>（2）History对象是window对象的一部分，可通过window.history属性对其进行访问

#### 二、方法

|方法|描述
|:-|:--
|back（）|加载history列表中的前一个URL
|forward（）|加载history列表中的下一个URL
|go（）|加载history列表中的某个具体页面

<br/>
`a.html`
```html
<body>
<h1>我是a.html</h1>
<a href="b.html">点我跳转到b.html</a>
<input type="button" value="点我前进一步" onclick="fun()" />
<input type="button" value="点我前进二步" onclick="abc()" />
<script>
function fun()
{
	window.history.forward();
}
function abc()
{
	window.history.go(2);
}
</script>
</body>
```
`b.html`
```html
<body>
<h1>我是b.html</h1>
<a href="c.html">点我跳转到c.html</a>
<input type="button" value="点我返回一步" onclick="fun()" >
<script>
function fun()
{
	window.history.back();	
}
</script>
</body>
```
`c.html`
```html
<body>
<h1>欢迎来到c.html</h1>
<input type="button" value="点我返回二步" onclick="fun()" >
<script>
function fun()
{
	window.history.go(-2);	
}
</script>
</body>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-5ad065b0fb58802c.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![image.png](https://upload-images.jianshu.io/upload_images/13570975-70d97b34f93521eb.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)<br/>
![image.png](https://upload-images.jianshu.io/upload_images/13570975-f8952ae1e7381673.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>一定要注意必须是浏览器浏览过的，只有浏览器浏览过才能有历史记录

>go（）方法正值前进，负值后退

## SCREEN对象
#### 一、说明<br/>

##### （1）screen对象包含有关客户端显示屏幕的信息。它提供了屏幕大小、分辨率和颜色深度等信息<br/>

##### （2）每个window对象的screen属性都引用一个screen对象。所有window.screen属性可翻译screen对象。screen对象中存放着有关显示浏览器屏幕的信息<br/>
##### （3）js程序可以优化屏幕输出，以达到用户的需求<br/>
#### 二、常用属性<br/>
>由于浏览器兼容的问题，就不在一一写了

更多screen属性详见：[w3c screen对象常用属性](http://www.w3school.com.cn/jsref/dom_obj_screen.asp?_blank)


