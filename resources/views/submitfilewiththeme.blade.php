@extends('layouts.app')

@section('content')
<div class="row">

<div class="card-title">
            タイトル
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
     @if (($submitwiththeme))
        <!-- 本登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('submitfile') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
            <div class="col-sm-6">
                投稿者
                <input type="text" name="item_name" class="form-control">
            </div>
            <div class="col-sm-6">
                Title
                <input type="text" name="item_title" class="form-control">
            </div>
            <div class="col-sm-6">
                <label for="file">音楽</label><br>
                
                <!--<input type="text" name="item_music" class="form-control">-->
                <input type="file" name ="item_music" id="file" >
                <h2>Recordings</h2>
                <ul id="recordingslist"></ul>
            </div>
            <div class="col-sm-6">
                <label for="tags">タグ</label><br>
                <!--<input type="text" name="item_music" class="form-control">-->
                @foreach ($submitwiththeme->tags as $tag )
                <input name ="tags" 
                       id="tags"
                       class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}"
                       value="{{ old('tags') }}"
                       value="#{{ $tag->name }}"
                       type="text"
                >
                @endforeach
            </div>
            <div class="col-sm-6">
                公開日
                <input type="text" name="published" class="form-control">
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
    @endif

</div>







@endsection