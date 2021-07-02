@extends('layouts.hello')
<style>
    .form_create {
      margin-bottom: 30px;
      display: flex;
      justify-content: space-between;
    }
    .input_add {
      width: 80%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }
    .input_edit {
      width: 90%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }
    .button_add {
      text-align: left;
      border: 2px solid #dc70fa;
      font-size: 12px;
      color: #dc70fa;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
    .button_add:hover {
      background-color: #dc70fa;
      color: #fff;
    }
    .button_edit {
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
    .button_edit:hover {
      background-color: #fa9770;
      color: #fff;
    }
    .button_delete {
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
    .button_delete:hover {
      background-color: #71fadc;
      color: #fff;
    }
    table {
      text-align: center;
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
    }
    tr {
      height: 50px;
    }
    th{
      font-weight: bold;
    }
</style>
@section('title', 'Todo List')

@section('content')
@if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
@endif
<form action="todo/create" method="post" class="form_create">
    @csrf
    <input type="text" name="content" class="input_add">
    <input type="submit" value="追加" class="button_add">
</form>

<table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach($items as $item)
      <tr>
        <td>
          {{$item->updated_at}}
        </td>
        <form action="/todo/edit" method="post">
          @csrf
          <td>
              <input type="hidden" name="id" value="{{$item->id}}">
              <input type="text" name="content" value="{{$item->content}}" class="input_edit">
          </td>
          <td>
            <input type="submit" value="更新" class="button_edit">
          </td>
        </form>
        <form action="/todo/delete" method="post">
          @csrf
          <td>
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="submit" value="削除" class="button_delete">
          </td>
        </form>
      </tr>
    @endforeach
</table>

@endsection