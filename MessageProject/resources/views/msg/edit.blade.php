<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1 align="center">laravel 新增留言</h1>
    <form action="" method="post"  enctype="multipart/form-data" align="center">
        {!!csrf_field()!!}
        <p>
          Name:{{$msg->name}}
        </p>
        <p>
            Title:<input type="text" name="title" value="{{$msg->title}}">
        </p>
        <p>
            Content:<textarea name="content" id="" cols="30" rows="10">{{$msg->content}}</textarea>
        </p>
        <input type="submit" value="Submit">
        <input type="button" onclick="history.back()" value="Back"></input>
    </form>
</body>
</html>
@endsection
