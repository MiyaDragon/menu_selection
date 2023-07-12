@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
    <h1>ユーザー管理</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-2 mb-2">
                <div class="col d-flex justify-content-start">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-lg mr-2">新規登録</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-gray text-center">ID</th>
                        <th class="bg-gray text-center">名前</th>
                        <th class="bg-gray text-center">メールアドレス</th>
                        <th class="bg-gray text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.users.edit', ['user' => $user]) }}">編集</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $user->id }}">削除</a>
                            </td>
                        </tr>

                        <!-- 削除モーダル -->
                        <div class="modal fade" id="delete-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="delete_modal_title"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div style="background: #ddd; font-size: 1.4rem; padding: 10px 20px; text-align: center; border-radius: 5px 5px 0 0;">
                                        確認
                                    </div>
                                    <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user]) }}">
                                        @csrf
                                        @method('delete')
                                        <div style="padding: 20px;">
                                            <div class="text-center" style="margin-bottom: 25px;">
                                                <h5 class="modal-title" id="delete_modal_title">
                                                    <div>{{ $user->name }}を削除しますか？</div>
                                                </h5>
                                            </div>
                                            <div class="text-center" style="padding: 20px;">
                                                <button type="button" class="btn btn-light mr-2" style="min-width: 25%;" data-dismiss="modal">
                                                    キャンセル
                                                </button>
                                                <button type="submit" class="btn btn-danger" style="min-width: 25%;" id="delete">削除する</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links() }}
@stop

@section('css')
    {{-- CSSファイルを記述 --}}
@stop

@section('js')
    {{-- JSファイルを記述 --}}
@stop
