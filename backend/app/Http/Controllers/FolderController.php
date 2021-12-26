<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
  public function show()
  {
    return view('folders/create');
  }

  public function create(Request $request)
  {
    //Folderモデルのインスタンスを作成
    $folder = new Folder();

    //タイトルに入力値を代入する
    $folder->title = $request->title;

    //インスタンスの状態をDBに書き込む
    $folder->save();

    return redirect()->route('tasks.index', [
      'id' => $folder->id
    ]);
  }
}
