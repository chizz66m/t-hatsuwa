<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Hatsuwa;
use Validator;
use App\Tag;


class HatsuwasController extends Controller
{


    //インデックス一覧
    public function index() {
        $hatsuwas = Hatsuwa::orderBy('created_at', 'asc')->paginate(10);
        return view('hatsuwas', [
            'hatsuwas' => $hatsuwas
        ]);
    }

    //インデックス一覧（useprofil）
    public function indexuser() {
        $userprofile = Hatsuwa::where('user_id',Auth::id())->orderBy('created_at', 'asc')->get();
        return view('userprofile', [
        'userprofile' => $userprofile
        ]);
    }

    //投稿詳細表示（detail）
    public function indexdetail($uploadid) {
        $detail = Hatsuwa::find($uploadid);
        // dd($detail);
        return view('detail', [
        'detail' => $detail
        ]);
    }
    //テーマ一覧表示
    public function indextheme(){
        $tags = Tag::orderBy('id', 'asc')->get();
        return view('hatsuwastheme',[
        'tags' => $tags
        ]);
    }
    //選択したテーマの投稿一覧表示
    public function indexthemelist($id){
        $themelist = Tag::find($id)->hatsuwas()->orderBy('created_at', 'asc')->get();
        // dd($themelist);
        return view('themelist',[
        'themelist' => $themelist
        ]
        );
    }


    //更新画面
    public function edit(){
        	//{hatsuwas}id 値を取得 =>	Hatsuwa $hatsuwas	id 値の１レコード取
        	return view('hatsuwasedit', ['hatsuwa' => $hatsuwas]);   //この１文を追加
    }

    //store
    public function store(Request $request){
        // dd($request->file('item_music'));
        // $request->item_music->store('');
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3|max:255',
            'item_title' => 'required | min:1 | max:25',
            'item_music' => 'required',
            // 'published'   => 'required',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $file = $request->file('item_music');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();

            $target_path = public_path('/upload/',$filename);
            // dd($target_path,$filename);
            $file->move($target_path, $filename);
        }else{
            dd($request->all());
            $filename = "";
        }


         preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($tags, $record);
        };

        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };



        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $hatsuwas = new Hatsuwa;
        $hatsuwas ->item_name = $request->item_name;
        $hatsuwas ->user_id = Auth::id();
        $hatsuwas ->item_title = $request->item_title;
        $hatsuwas ->item_music =  $filename;
        $hatsuwas ->published = $request->published;
        $hatsuwas ->save();
        $hatsuwas ->tags()->attach($tags_id);
        return redirect('/');
    }
    
    //withthemestore「タグ付き投稿」
    public function withthemestore(Request $request){
        //タグ取得
        $submitwiththeme = Tag::find($name)->hatsuwas()->orderBy('created_at', 'asc')->get();
        // dd($themelist);
        return view('themelist',[
        'submitwiththeme' => $submitwiththeme
        ]
        );
        
        
        // dd($request->file('item_music'));
        // $request->item_music->store('');
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3|max:255',
            'item_title' => 'required | min:1 | max:3',
            'item_music' => 'required',
            'published'   => 'required',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $file = $request->file('item_music');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();

            $target_path = public_path('/submitfilewiththeme/',$filename);
            // dd($target_path,$filename);
            $file->move($target_path, $filename);
        }else{
            dd($request->all());
            $filename = "";
        }


         preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);

        $tags = [];
        foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($tags, $record);
        };

        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };



        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $hatsuwas = new Hatsuwa;
        $hatsuwas ->item_name = $request->item_name;
        $hatsuwas ->user_id = Auth::id();
        $hatsuwas ->item_title = $request->item_title;
        $hatsuwas ->item_music =  $filename;
        $hatsuwas ->published = $request->published;
        $hatsuwas ->save();
        $hatsuwas ->tags()->attach($tags_id);
        return redirect('/');
    }

    //destoroy
    public function destroy(Hatsuwa $hatsuwa){
        $hatsuwa->delete();       //追加
        return redirect('/');  //追加
    }



    //update:更新処理
    public function update(Request $request){

            //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_title' => 'required|min:1|max:70',
            'item_music' => 'required',
            'published' => 'required',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        //データ更新
        //Eloquentモデル
        $hatsuwas = Hatsuwa::find($request->id);
        $hatsuwas->item_name   = $request->item_name;
        $hatsuwas ->user_id = Auth::id();
        $hatsuwas->item_title = $request->item_title;
        $hatsuwas->item_music = $request->item_music;
        $hatsuwas->published   = $request->published;
        $hatsuwas->save();
        return redirect('/');

    }


}