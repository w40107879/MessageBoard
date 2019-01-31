<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>新增留言</h1>
	<form action="" method="post">
		{!!csrf_field()!!}
		<p>
			標題:<input type="text" name="title">
		</p>
		<p>
			內容:<textarea name="content" id="" cols="30" rows="10"></textarea>
		</p>
		<input type="submit" value="提交">
	</form>
</body>
</html>