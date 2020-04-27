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
    @section('title','Person.index')
    @section('menubar')
    @parent
    インデックスページ
    @endsection

    @section('content')
    <table>
      <tr>
        <th>Person</th>
        <th>Board</th>
      </tr>
      @foreach($hasItems as $item)
      <tr>
        <td>{{$item->getData()}}</td>
        <td>
          <table width="100%">
            @foreach ($item->boards as $obj)
            <tr>
              <td>{{$obj->getData()}}</td>
            </tr>
            @endforeach
          </table>
        </td>
      </tr>
      @endforeach
    </table>
    <div style="margin:10px;"></div>
    <table>
      <tr><th>Person</th></tr>
      @foreach($noItems as $item)
    <tr>
      <td>{{$item->getData()}}</td>  
    </tr>
    @endforeach
    </table>
    @endsection
  </ol>

</body>

</html>