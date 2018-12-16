@extends('layouts.application')

@section('title', '社員マスタ')

@section('content')
<h1>社員一覧</h1>
<div>
    <a href="/m_employee/create">新規作成</a>
</div>
<table>
    <tr>
        <th>社員番号</th>
        <th>社員氏名</th>
        <th>性別</th>
        <th>サービスコード</th>
        <th colspan="3"></th>
    </tr>
 @foreach ($mEmployee as $employee)
    <tr>
        <td>{{$employee->emp_id}}</td>
        <td>{{$employee->emp_name}}</td>
        <td>{{$employee->sex}}</td>
        <td>{{$employee->service_code}}</td>
        <td><a href="/m_employee/{{$employee->emp_id}}">詳細</a></td>
        <td><a href="/m_employee/{{$employee->emp_id}}/edit">編集</a></td>
        <td>
            <form action="/m_employee/{{$employee->emp_id}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" name="" value="削除">
            </form>
        </td>
    </tr>
  @endforeach
</table>
@endsection