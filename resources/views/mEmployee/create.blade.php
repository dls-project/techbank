@extends('layouts.application')

@section('title', '新規作成')

@section('content')
<h1>新規作成</h1>
<form action="/m_employee" method="post">
    {{-- 以下を入れないとエラーになる --}}
    {{ csrf_field() }}
    <div>
        <label for="empId">社員番号</label>
        <input type="text" name="empId" placeholder="例）00001">
    </div>
    <div>
        <label for="empName">社員氏名</label>
        <input type="text" name="empName" placeholder="例）セラク　太郎">
    </div>
    <div>
        <label for="sex">性別</label>
        <label>
            <input type="radio" name="sex" value="男" checked>男
        </label>
        <label>
            <input type="radio" name="sex" value="女">女
        </label>
    </div>
    <div>
        <label for="serviceCode">サービスコード</label>
        <input type="text" name="serviceCode">
    </div>
    <div>
        <input type="submit" value="送信">
    </div>
  </form>
@endsection