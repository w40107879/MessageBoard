<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1 align="center">Upload Image</h1>

    <div id="" style="margin-top:10px;height:100%;" align="center">
     <form action="" enctype="multipart/form-data" method="POST">
  		 {!!csrf_field()!!}
      Choose Image : <input name="profileimg" size="35" type="file"/><br/>
      <input type="submit" name="uploadprofileimg" value="Upload" align="center">
  	</input>
     </form>
   </div>

</body>
</html>
@endsection
