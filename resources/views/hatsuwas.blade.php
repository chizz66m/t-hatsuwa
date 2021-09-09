<!-- resources/views/hatsuwas.blade.php -->
@extends('layouts.app') 
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        
        <a href="{{ url('/aaa') }}"> upload </a>
        <a href="{{ url('/userprofile') }}"> mypage </a>
       <nav id="navi">
         <ul>
           <li><a href="">home</a></li>
           <!--<li><a href="">theme</a></li>-->
           <li><a href="{{ url('/hatsuwastheme') }}">topic</a></li>
           <!--<li><a href="">学ぶ</a></li>-->
         </ul>
      </nav>
        <!-- 現在の本 -->
    @if (count($hatsuwas) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                    <!--    <th>投稿一覧</th>-->
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($hatsuwas as $hatsuwa)
                        <article>
                            <div class="post">
                              <div class="postleft">
                                <img src="/post/38c45fcee437f6b85d76ee412a5c589b_t.jpeg" alt="">
                              </div>
                              <div class="postright">
                                <div class="postright-top">
                                  <div class="postright-topleft">
                                    <a>
                                      <h4 class="username">name：{{ $hatsuwa->item_name }}</h4>
                                    </a>
                                    <p class="speechtitle">Title：{{ $hatsuwa->item_title }}</p>
                                  </div>
                                  <div class="postright-topright">
                                    <p class="posttime">1days ago</p>
                                  </div>
                                </div>
                                <diV class="postright-mid">
                                  <audio controls src="upload/{{ $hatsuwa->item_music }}"></audio>
                                  <div class="tagplace">
                                    @foreach ($hatsuwa->tags as $tag )
                                    <div>#{{ $tag->name }} </div>
                                    @endforeach
                                  </div>
                                </diV>
                                <div class="postright-btm">
                                  <button>Like</button>
                                  <button>Repost</button>
                                  <button>Share</button>
                                </div>
                              </div>
                            </div>
                        </article>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 offset-md-4">
                {{ $hatsuwas -> links()}}
            </div>
        </div>
        
    @endif
        
    </div>

@endsection


<style>
h2 {
  font-size: 20px;
  font-weight: bold;
  padding: 24px 0;
  margin-bottom: 16px;
  border-bottom: solid 1px rgba(0,0,0,.05)
}
.content {
  /* display: flex; */
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;
}
article {
  flex: 1;
  width: 100%;
  max-width: 740px;
  min-width: 272px;
  padding: 12px;
  margin-bottom: 36px;
}
.post{
  display: flex;
  width:640px;
}
.postleft{
  margin-left: 5px;
}
.postleft img{
  width:200px;
}
.postright{
  padding-left:10px ;
}
.postright-top{
  display: flex;
  width:100%;
}
.postright-topleft {
  width:80%
}

.postright-topleft h4{
  font-size: 12px;
}
.postright-topleft p{
  font-size: 18px;
}
.postright-topright {
  text-align:right;
}
.postright-topright p {
  margin-top: 5px;
  font-size: 8px;
  color: #a8abb1;
}
.postright-mid{
  width:100%;
}
.postright-mid img{
  height:60px;
}
.tagplace{
  /* background-color: #f8f9fb; */
  height:20px;
  font-size: 8px;
  padding-top: 2px;
  color: #a8abb1;
}
.postright-btm button{
  border: 1px solid;
  border-color: #eaebee;
  font-size: 4px;
  padding: 2px 4px;
  z-index: 1;
}



article:hover {
  background-color: #f7f9f9;
}
article .title {
  font-size: 18px;
  font-weight: bold;
  letter-spacing: .04em;
  margin: 16px 0 8px 0;
}
article .text {
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 8px;
  text-align: justify;
}
article .like {
  color: #ea3f60;
  font-size: 14px;
}
article .like:before {
  content: "\f004";
  font-family: "Font Awesome 5 Free";
  margin-right: 4px;
}
article .name-area {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #787c7b;
}
article .name {
  font-size: 14px;
}
article .name-like {
  font-size: 20px;
}
article .name-like:after {
  content: "\f004";
  font-family: "Font Awesome 5 Free";
}
</style>