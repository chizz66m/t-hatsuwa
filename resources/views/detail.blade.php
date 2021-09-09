<!-- resources/views/hatsuwasthe.blade.php -->
@extends('layouts.app') 
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
         @if (($detail))
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
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $detail->item_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $detail->item_title }}</div>
                                </td>
                                 <td class="table-text">
                                    @foreach ($detail->tags as $tag )
                                    
                                    <div>#{{ $tag->name }} </div>
                                    @endforeach
                                </td>
                                <td class="table-text">
                                    <div id="waveform" style="width: 500px;"> 
                                    <audio controls src="/upload/{{ $detail->item_music }}"></audio>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif


       
   
        
    </div>

@endsection


