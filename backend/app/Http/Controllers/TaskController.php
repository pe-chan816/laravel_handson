<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index(int $id)
  {
    // 全ての　Folder を取得する
    $folders = Folder::all();

    // 選ばれた Folder を取得する
    $current_folder = Folder::find($id);

    // 選ばれた Folder に紐づく Task を取得する
    $tasks = $current_folder->tasks()->get();
    //$tasks = Task::where('folder_id', $current_folder->id)->get();

    return view('tasks/index',[
      'folders' => $folders,
      'current_folder_id' => $current_folder->id,
      'tasks' => $tasks
    ]);
  }
}
