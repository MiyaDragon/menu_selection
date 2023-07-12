@extends('adminlte::page')

@php
    if (request()->is('*/create*')) {
        $text = '登録';
    } else {
        $text = '更新';
    }
@endphp

@section('title', "ユーザー管理 {$text}")

@section('content_header')
    <h1>ユーザー管理 {{ $text }}</h1>
@stop

@section('content')
@if (request()->is('*/create*'))
    <form action="{{ route('admin.users.store') }}" method="POST">
@else
    <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
        @method('put')
@endif
    @csrf
    <div class="card">
        <h3 class="bg-gray">管理者管理</h3>
        <div class="card-body">
            <!-- ニックネーム -->
            <div class="row mb-3">
                <label for="nickname" class="form-label">ニックネーム</label>
                <input type="text" name="nickname" class="form-control" id="nickname" value="{{ old('nickname', $user->nickname ?? '') }}" placeholder="山田 太郎">
            </div>
            <!-- メールアドレス -->
            <div class="row mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email ?? '') }}" placeholder="example@example.com">
            </div>
            <!-- パスワード -->
            <div class="row mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="********">
            </div>
            <!-- パスワード（確認） -->
            <div class="row mb-3">
                <label for="password_confirmation" class="form-label">パスワード（確認）</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="********">
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg">{{ $text }}する</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('css')
    {{-- CSSファイルを記述 --}}
@stop

@section('js')
    {{-- JSファイルを記述 --}}
@stop
