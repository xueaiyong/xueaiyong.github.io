---
layout: post
title:  "js实现下拉框选择不同样式"
categories: JavaScript
author: joytom
tags:  JavaScript
---


```html
<!Doctype html>
<head>
    <title>撸起袖子加油干</title>
    <meta charset='utf-8'>
</head>
<body>
<script type="text/javascript">
	function abc(){
		var tid = document.getElementById('tid');      //获取tid的值
		var xuanzeti = document.getElementById('xuanzeti');
		var panduanti = document.getElementById('panduanti');
		var jiandati = document.getElementById('jiandati');
		if(tid.value==1)
		{
			xuanzeti.style.display = '';
			panduanti.style.display = 'none';
			jiandati.style.display = 'none';
		   
		}
		else if(tid.value==2)
		{
			xuanzeti.style.display = 'none';
			panduanti.style.display = '';
			jiandati.style.display = 'none';
		}
		else
		{
			xuanzeti.style.display = 'none';
			panduanti.style.display = 'none';
			jiandati.style.display = '';
		}
	}
</script>
    <form>
        <label>选择题型：</label>
        <select name="type" id='tid' onchange="abc()">
            <option value='1'>选择题</option>
            <option value='2'>判断题</option>
			<option value='3'>简答题</option>
        </select>
        <div id="xuanzeti">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A:<input type="text" name="nr1" placeholder="选项内容" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B:<input type="text" name="nr2" placeholder="选项内容" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C:<input type="text" name="nr3" placeholder="选项内容" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D:<input type="text" name="nr4" placeholder="选项内容" />
        </div>
        <div id="panduanti" style="display:none">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>判断题答案</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="answer2" value="" /> 正确
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="answer2" value="" /> 错误
        </div>
		<div id="jiandati" style="display:none">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>判断题答案</label>
          <textarea cols='6' rows='5'>哈哈哈</textarea>
        </div>
    </form>
</body>
</html>
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-d8afc33c795857b3.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

>**利用onchange点击触发函数，利用style.display使样式显示**