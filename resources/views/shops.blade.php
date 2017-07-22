<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    <!-- Bootstrap の定形コード... -->
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('shops') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">shopname</label>
                
                <div class="col-sm-6">
                    <input type="text" name="shopname" id="book-name"class="form-control">
                </div>
                <br><br>
                
                <label for="book" class="col-sm-3 control-label">valuation</label>
                
                <div class="col-sm-6">
                    <input type="number" name="valuation" id="book-name"class="form-control">
                </div>
                <br><br>
                
                <label for="book" class="col-sm-3 control-label">comment</label>
                
                <div class="col-sm-6">
                    <input type="textbox" name="comment" id="book-name"class="form-control">
                </div>
                <br><br>
                
                <label for="book" class="col-sm-3 control-label">visitday</label>
                
                <div class="col-sm-6">
                    <input type="date" name="visitday" id="book-name"class="form-control">
                </div>
            </div>
            
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Book: 既に登録されてる本のリスト -->
             @if (count($shops) > 0)
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    現在 ショップ
                </div>
                <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>ショップ一覧</th>
                        <th>評価</th>
                        <th>コメント</th>
                        <th>訪問日</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                         @foreach ($shops as $shops)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $shops->shopname }}</div>
                                    </td>
                                
                                <td class="table-text">
                                    <div>{{ $shops->valuation }}</div>
                                    </td>
                                    
                                <td class="table-text">
                                    <div>{{ $shops->comment }}</div>
                                    </td>
                                    
                                <td class="table-text">
                                    <div>{{ $shops->visitday }}</div>
                                </td>
                                
                                <!-- 本: 削除ボタン -->
                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('shops/'.$shops->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> 
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

