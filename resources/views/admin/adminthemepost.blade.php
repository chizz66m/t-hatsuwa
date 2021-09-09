@extends('layouts.app')

@section('content')
<div class="row">

<div class="card-title">
            
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('/admin/adminthemepost') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
             　　　　テーマ（タグ投稿）

                <div class="col-sm-6">
                <label for="tags">タグ</label><br>
                <input type="text" name="name" class="form-control">
                </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>


</div>
@endsection