<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1 align="center">New Reply</h1>
	<form action="" method="post" align="center">
		{!!csrf_field()!!}
		<p>
			Name : {{Auth::user()->name}}
		</p>
		<p>
			Content:<textarea name="content" id="" cols="30" rows="10"></textarea>
		</p>
		<input type="submit" value="Submit">
		<input type="button" onclick="history.back()" value="Go back"></input>
	</form>
</body>
</html>
@endsection
