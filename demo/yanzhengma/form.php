<?php
session_start();
if(isset($_REQUEST['authcode']))
{
	if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode'])
	{
		echo '正确';
	}
	else
	{
		echo '错误';
	}
}
?>
<!Doctype html>
<head>
<title></title>
<meta charset='utf-8'>
</head>
<body>
<form method="post" action="./form.php">

<p>验证码图片：<img border='1' src='haha.php' onclick="this.src='haha.php?t=' + Math.random()" title="点击刷新"/></p>
<p>请输入图片里的内容：<input type="text" name="authcode" value="" /></p>
<p><input type="submit" name="submit" value="提交" /></p>
</form>
</body>
</html>