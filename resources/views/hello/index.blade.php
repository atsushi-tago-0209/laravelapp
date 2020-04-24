<html>

<head>
  <title>Hello/Index</title>
  <style>
    body {
      font-size: 16pt;
      color: #999;
    }

    h1 {
      font-size: 50pt;
      text-align: right;
      color: #f6f6f6;
      margin: -20px 0px -30px 0px;
      letter-spacing: -4pt;
    }
  </style>
</head>

<body>
  <h1>Blade/Index</h1>

  <ol>
    @extends('layouts.helloapp')
    @section('title','Index')
    @section('menubar')
    @parent
    インデックスページ
    @endsection

    @section('content')
    <p>ここが本文のコンテンツです</p>
 <p>{{$msg}}</p>
 @if (count($errors) > 0)
 <p>入力に問題があります。再入力してください。</p>
 @endif

 <form action="/hello" method="post">
<table>
  @csrf
  @if($errors->has('name'))
  <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr>
  @endif
  <tr><th>name:</th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
  @if($errors->has('mail'))
  <tr><th>ERROR</th><td>{{$errors->first('mail')}}</td></tr>
  @endif
  <tr><th>mail:</th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
  @if($errors->has('age'))
  <tr><th>ERROR</th><td>{{$errors->first('age')}}</td></tr>
  @endif
  <tr><th>age:</th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
  <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>
    @endsection
</ol>

</body>

</html>