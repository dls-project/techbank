@extends('layouts.application')

@section('title', '編集')

@section('content')
<h1>編集</h1>
<form action="/m_employee/{{$employee->emp_id}}" method="post">
    <!-- {{ csrf_field() }} -->
    @csrf
    <div>
        <label for="empId">社員番号</label>
        {{$employee->emp_id}}
    </div>
    <div>
        <label for="empName">社員氏名</label>
        <input type="text" name="empName" placeholder="例）セラク　太郎" value="{{$employee->emp_name}}">
    </div>
    <div>
        <label for="sex">性別</label>
        <label>
            <input type="radio" name="sex" value="男" @if($employee->sex == '男') checked @endif>男
        </label>
        <label>
            <input type="radio" name="sex" value="女" @if($employee->sex == '女') checked @endif>女
        </label>
    </div>
    <div>
        <label for="serviceCode">サービスコード</label>
        <input type="text" name="serviceCode" value="{{$employee->service_code}}">
    </div>
    <div>
        <!-- <input type="hidden" name="_method" value="patch">  -->
        @method('patch')
        <input type="submit" value="更新">
    </div>
  </form>
@endsection