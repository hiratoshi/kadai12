<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Shops; 
use Illuminate\Http\Request; 


/** * 本 のダッシュボード 表示 */ 
Route::get('/', function () {
    $shops = Shops::orderBy('created_at', 'asc')->get();
    return view('shops', [
        'shops' => $shops
    ]);
});

/** * 新 「本」 を 追加 */ 
Route::post('/shops', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
            'shopname' => 'required|max:255',
            'valuation' => 'required|max:5',
            'comment' => 'required|max:1000',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
      // Eloquent モデル
    $books = new Shops;
    $books->shopname = $request->shopname;
    $books->valuation = $request->valuation;
    $books->comment = $request->comment;
    $books->visitday = $request->visitday;
    $books->save();   //「/」ルートにリダイレクト 
    return redirect('/');
}); 

/** * 本 を 削除 */ 
Route::delete('/shops/{shops}', function (Shops $shops) {
    $shops->delete();
    return redirect('/');
});