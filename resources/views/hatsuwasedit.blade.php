@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('hatsuwas/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
           <label for="item_name">Title</label>
           <input type="text" id="item_name" name="item_name" class="form-control" value="{{$hatsuwa->item_name}}">
        </div>
        <!--/ item_name -->
        
        <!-- item_title -->
        <div class="form-group">
           <label for="item_title">Number</label>
        <input type="text" id="item_title" name="item_title" class="form-control" value="{{$hatsuwa->item_title}}">
        </div>
        <!--/ item_title -->

        <!-- item_music -->
        <div class="form-group">
           <label for="item_music">Amount</label>
        <input type="text" id="item_music" name="item_music" class="form-control" value="{{$hatsuwa->item_music}}">
        </div>
        <!--/ item_music -->
        
        <!-- published -->
        <div class="form-group">
           <label for="published">published</label>
            <input type="datetime" id="published" name="published" class="form-control" value="{{$hatsuwa->published}}"/>
        </div>
        <!--/ published -->
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$hatsuwa->id}}">
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         {{ csrf_field() }}
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection