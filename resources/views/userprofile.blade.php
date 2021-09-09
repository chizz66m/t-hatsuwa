@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="userpage-main">
    <div class="userprofil">
      <div class="userprofil-pic">
        <img src="/img/sample-profileimg.webp" style="width:200px">
      </div>
      <div class="userprofil-contain">
        <div class="userprofil-name">
          <h3>name: sample</h3>
        </div>
        <div class="userprofil-detail">
          <p>
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaazzzzzzzzzzzzzzzzzzaa<br>
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaazzzzzzzzzzzzzzzzzzaa<br>
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaazzzzzzzzzzzzzzzzzzaa<br>
          </p>
        </div>
        <div class="userprofil-underbar">
          <button>フォロー</button>
          <button>フォロワー</button>
        </div>
      </div>
    </div>
   
    </div>
</div>

 @if (count($userprofile) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>投稿一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($userprofile as $userprofile)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $userprofile->item_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $userprofile->item_title }}</div>
                                </td>
                                 <td class="table-text">
                                    @foreach ($userprofile->tags as $tag )
                                    
                                    <div>#{{ $tag->name }} </div>
                                    @endforeach
                                </td>
                                <td class="table-text">
                                    <div id="waveform" style="width: 500px;"> 
                                    <audio controls src="upload/{{ $userprofile->item_music }}"></audio>
                                    </div>
                                </td>
                                
                                <!--更新ボタン-->
                                <td>
                                <form action="{{ url('hatsuwasedit/'.$userprofile->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">
                                更新
                                </button>
                                </form>
                                </td>

                                <!-- 本: 削除ボタン -->
                                <td>
                                <form action="{{ url('hatsuwa/'.$userprofile->id) }}" method="POST">
                                         {{ csrf_field() }}
                                         {{ method_field('delete') }}
                                        
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                </form>
                                </td>
                            </tr>
                            
                            
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection


<style>
    .sub-userpic{
      position: relative;
      width: 100%;
      max-height: 700px;
    }
    .userprofil{
      display: flex;
      max-width: 940px;
      margin: 0 auto;
      margin-top: 20px;
    }
    .userprofil-pic{
      margin-top: 15px;
    }
    .userprofil-contain{
      margin-left: 40px;
    }
    .main{
      margin-left: 300px;
    }
  </style>