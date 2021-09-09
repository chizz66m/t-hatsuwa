<!-- resources/views/hatsuwasthe.blade.php -->
@extends('layouts.app') 
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        
        <a href="{{ url('/newupload') }}"> upload </a>
        <a href="{{ url('/userprofile') }}"> mypage </a>
        
       <nav id="navi">
         <ul>
           <li><a href="/">home</a></li>
           <!--<li><a href="">話題</a></li>-->
           <li><a href="hatsuwastheme">topic</a></li>
           <!--<li><a href="">学ぶ</a></li>-->
         </ul>
      </nav>
        <!-- 現在の本 -->
        @foreach ($tags as $tag )
         <div class="themebox"><a href="{{ url('/themelist/'.$tag->id) }}">#　{{ $tag->name }}</a></div>
        

          
        @endforeach
   
        
    </div>

@endsection


<style>


.themebox{
    border: 1px solid ;
    border-color:#787c7b;
    border-radius: 4px;
    width:150px;
    margin-top:15px;
    }
</style>