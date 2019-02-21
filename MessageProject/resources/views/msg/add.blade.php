<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1 align="center">New Message</h1>
	<form action="" method="post" align="center">
		{!!csrf_field()!!}
		<p>
			Name : {{Auth::user()->name}}
		</p>
		<p>
			Title : <input type="text" name="title">
		</p>
		<p>
			Content:<textarea name="content" id="" cols="30" rows="10"></textarea>
		</p>
		<div style="text-align:center;">
			<a href="/msg/uplode">Uplode Image</a>
		</div>
		<input type="submit" value="Sumit">
		<input type="button" onclick="history.back()" value="Go Back"></input>
	</form>

</body>
</html>
@endsection
