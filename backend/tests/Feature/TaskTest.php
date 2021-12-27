<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Requests\CreateTask;
use Tests\TestCase;
use Carbon\Carbon;

class TaskTest extends TestCase
{
  use RefreshDatabase;

  /*
   * 各テストメソッド実行前に呼ばれる
   */
  public function setUp() :void
  {
    parent::setUp();

    //テストケース実行前にフォルダデータを実行する
    $this->seed('FoldersTableSeeder');
  }

  /**
   * 期限日が日付ではない場合にバリデーションエラーを吐く
   * @test
   */
  public function due_date_should_be_date()
  {
    $response = $this->post('/folders/1/tasks/create', [
      'title' => 'Sample Task',
      'due_date' => 123 //date型ではない
    ]);

    $response->assertSessionHasErrors([
      'due_date' => '期限日 には日付を入力してください'
    ]);
  }

  /**
   * 期限日が過去の日付の場合にバリデーションエラーを吐く
   * @test
   */
  public function due_date_should_not_be_past()
  {
    $response = $this->post('/folders/1/tasks/create', [
      'title' => 'Sample Task',
      'due_date' => Carbon::yesterday()->format('Y/m/d') //今日の日付以降じゃないとダメ
    ]);

    $response->assertSessionHasErrors([
      'due_date' => '期限日 には今日以降の日付を入力してください'
    ]);
  }
}
