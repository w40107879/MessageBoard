<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <h1 align="center">Laravel Message Board</h1>
    <div style="text-align:center;">
      <a href="/msg/add">New Message</a>
    </div>
    <table align="center" style="width:40%">
      @if(count($msg) > 0)
        <tr>
            <td>Title</td>
            <td>Content</td>
            <td>Name</td>
            <td>Post time</td>
        </tr>
        @foreach($msg as $m)
            <tr>
                <td>{{$m->title}}</td>
                <td>{{$m->content}}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->created_at}}</td>
                <td>
                    <a href="/msg/del/{{$m->id}}">Delete</a>
                    <a href="/msg/edit/{{$m->id}}">Edit</a>
                    <a href="/msg/replyindex/{{$m->id}}">Check Reply
                      ({{$m->NumReply}})
                     </a>
                </td>
            </tr>
          @endforeach
        @endif
    </table>
</body>
</html>
@endsection
