---
layout: post
title:  "HTML新增属性"
categories: HTML
date:   2018-08-14 18:40:05
author: joytom
tags:  HTML HTML5
---

<hr/>
## 日期时间属性
<hr/>
- `data`  -----年、月、日
- `month` -----年、月
- `week`  -----年、周
- `time`  -----时、分
- `datetime`  -----年、月、日、时、分
![date](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/1.png "date")
![Date Pickers](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/2.png "Date Pickers")
![Date time](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/3.png "Date time")
<hr/>
## input标签的type属性
<hr/>
- `email`  -----邮箱格式的类型，填错会报错
```html
姓名：<input tabindex="3" type="email" required />
```
![email](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/4.png "email")
>**PC端表现与text相同，但是在移动端，输入键盘会有变化**

- `url`  -----以url输入格式呈现
>**PC端表现与text相同，但是在移动端，输入键盘会有变化**
```html
姓名：<input tabindex="3" type="url" required />
```
>**PC端表现与text相同，但是在移动端，输入键盘会有变化**

- `tel`  -----以手机号码的输入格式呈现
```html
姓名：<input tabindex="3" type="tel" required />
```
>**PC端表现与text相同，但是在移动端，输入键盘会有变化**

- `number`  -----以手机号码的输入格式呈现
```html
姓名：<input tabindex="3" type="number" required />
```
![number](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/5.png "number")
>**PC端表现与text相同，但是在移动端，输入键盘会有变化**

- `range`  -----滑动条
```html
姓名：<input tabindex="3" type="range" min="0" max="10" />
```
![range](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/6.png "range")
>**min:**最小值，默认值是0<br />
>**max:**最大值，默认值是1<br />

- `search`  -----搜索并可以清空
```html
姓名：<input tabindex="3" type="serch" />
```
![serach](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/9.png "serach")
>**点×号可以清空**

- `color`  -----颜色板
```html
姓名：<input tabindex="3" type="color" />
```
![color](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/8.png "color")
>**点击后，调出颜色板**

<hr/>
## 表单属性
<hr/>

- `link`

```html
<link rel="icon" href="img/2.jpg" type="img/jpg" sizes="16*16">
```
![1.png](https://upload-images.jianshu.io/upload_images/13570975-f1f8e5655dc2b57f.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**icon:导入该文档的图标**

- `base`
![1.png](https://upload-images.jianshu.io/upload_images/13570975-5f7e55f853a3938f.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![3.png](https://upload-images.jianshu.io/upload_images/13570975-41f0c5d8d584526f.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![4.png](https://upload-images.jianshu.io/upload_images/13570975-78cd0012bfc255ec.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**通常情况下，浏览器会从当前文档的 URL 中提取相应的元素来填写相对 URL 中的空白。
使用 <base> 标签可以改变这一点。浏览器随后将不再使用当前文档的 URL，而使用指定的基本 URL 来解析所有的相对 URL。**

- `required`

```html
<input type="text" required="required" />
```
>**输入域里面的值不能为空**

![图片1.png](https://upload-images.jianshu.io/upload_images/13570975-1178bb76560b75ff.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

- `placeholder`

```html
<input type="text" placeholder="您想输入点什么呢" />
```
![图片2.png](https://upload-images.jianshu.io/upload_images/13570975-3ad95d0afcaa557b.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**提供一种提示，描述输入域内所期待的值**

![图片3.png](https://upload-images.jianshu.io/upload_images/13570975-8f763777ea53782c.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

- `multiple`

```html
<input type="file" multipart="multipart" />
```
>**上传文件时可选择多个文件（只适用于input type下面的email和file）**

- `autocomplete`

```html
<form autocomplete="on">
```
![图片4.png](https://upload-images.jianshu.io/upload_images/13570975-f043af0d37cc0335.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
- `autofocus`

```html
<input type="text" autofocus="autofocus" />
```
>**页面加载时，域自动获得聚焦。适用于所有的input标签**

- `ol`

```html
<ol start="50" reversed="reversed">
    <li>coffee</li>
    <li>milk</li>
    <li>cocl</li>
</ol>
```
>**start：起始值为50<br/>reversed：倒叙排列**

- `a`

```html
<a href="" hreflang="zh" rel="external">a标签的属性</a>
```
>**hreflang="zh"：超链接使用的语言为中文<br/>external：规定当前文档与被链接文档之间的关系**

- `style`

```html
<body>
        <div>
            <style>
                h1{color:red}
                p{color:blue}
            </style>  
            <h1>this is a title</h1>
            <p>this is a paragraph</p>
        </div>
</body>
```
![图片5.png](https://upload-images.jianshu.io/upload_images/13570975-6d307fe90678b57a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**样式的内部调用，如果开发几个简单的样式的小项目时适合用这个，但是如果要开发大项目的话就不适合该方法，会使代码冗余，不利于维护。**

- `iframe`

```html
<iframe seamless srcdoc="<h1>hello</h1>" sandbox src="www.baidu.com"></iframe>
```
![图片6.png](https://upload-images.jianshu.io/upload_images/13570975-21ee8a17b02a3177.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
>**seamless：使框架不会有边框和边距<br/>srcdoc：出现介绍，如果这个放前面的话就吧src给覆盖了**

去掉srcdoc后：
![图片7.png](https://upload-images.jianshu.io/upload_images/13570975-72efbad58ec9dacf.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

无法提交！！！
>**因此，sandbox：保护数据安全，禁止提交表单**