<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1 align="center">laravel Message Board</h1>
    <form action="" method="post"  enctype="multipart/form-data" align="center">
        {!!csrf_field()!!}
        <p>
          Name:<input type="text" name="comment_name" value="{{$reply->comment_name}}">
        </p>
        <p>
            Content:<textarea name="content" id="" cols="30" rows="10">{{$reply->content}}</textarea>
        </p>
        <input type="submit" value="Submit">
        <input type="button" onclick="history.back()" value="Go Back"></input>
    </form>
</body>
</html>
@endsection
