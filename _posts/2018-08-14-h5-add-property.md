---
layout: post
title:  "HTML新增属性"
categories: HTML
date:   2018-08-14 18:40:05
author: joytom
tags:  HTML HTML5 
---


## 日期时间属性
- `data`  -----年、月、日
- `month` -----年、月
- `week`  -----年、周
- `time`  -----时、分
- `datetime`  -----年、月、日、时、分
![date](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/1.png "date")
![Date Pickers](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/2.png "Date Pickers")
![Date time](https://raw.githubusercontent.com/joytom/joytom.github.io/master/images/2018-08-14/3.png "Date time")
## input标签的type属性
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
