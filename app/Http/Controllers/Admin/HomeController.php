<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Hatsuwa;
use Validator;
use App\Tag;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    
    
        public function themestore(Request $request){
        // dd($request->file('item_music'));
        // $request->item_music->store('');
        //バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',

        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        
        //  preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);
        
        // $tags = [];
        // foreach ($match[1] as $tag) {
        //     $record = Tag::firstOrCreate(['name' => $tag]);
        //     array_push($tags, $record);
        // };
        
        // $tags_id = [];
        // foreach ($tags as $tag) {
        //     array_push($tags_id, $tag['id']);
        // };
        
        
        
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $tags = new Tag;
        $tags ->name = $request->name;
        // $hatsuwas ->user_id = Auth::id();
        // $hatsuwas ->item_title = $request->item_title;
        // $hatsuwas ->item_music =  $filename;
        // $hatsuwas ->published = $request->published;
        $tags ->save(); 
        // $hatsuwas ->tags()->attach($tags_id);
        return redirect('/admin/adminthemepost');
    }
    
    
    
    
    
    
    
}
