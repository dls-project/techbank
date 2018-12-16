@extends('layouts.application')

@section('title', '社員詳細')

@section('content')
    <h1>社員詳細</h1>
    <p>{{$employee->emp_id}}</p>
    <p>{{$employee->emp_name}}</p>
    <p>{{$employee->sex}}</p>
    <p>{{$employee->service_code}}</p>
    <br><br>
    <a href="/m_employee">一覧に戻る</a>
    <a href="/m_employee/{{$employee->emp_id}}/edit">編集</a>
@endsection