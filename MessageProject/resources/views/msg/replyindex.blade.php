<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Check Reply</h1>
      <div style="text-align:center;">
        <a href="/msg/reply/{{$id}}">Reply</a><br>
        <a href="/msg/index">Message Board</a>
      </div>
    <table align="center">
      @if(count($reply)>0)
        <tr>
            <td>name</td>
            <td>content</td>
            <td>Operate</td>
        </tr>
         <!--$msg屬於陣列 儲存所有的內容 -->
         @foreach($reply as $r)
              @if($r->msgs_id == $id)
                <tr>
                    <td>{{$r->comment_name}}</td>
                    <td>{{$r->content}}</td>
                    <td>
                        <a href="/msg/replydel/{{$id}}/{{$r->id}}">Delete</a>
                        <a href="/msg/replyedit/{{$id}}/{{$r->id}}">Edit</a>
                    </td>
                </tr>
              @endif
            @endforeach
        @endif
    </table>
</body>
</html>
@endsection
