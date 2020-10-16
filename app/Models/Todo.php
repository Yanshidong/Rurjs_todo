<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Integer;

class Todo extends Model
{
    use HasFactory;
    public $timestamps=true;

  protected $fillable=[
        'name'
    ];

    /**
     * 任务是否已完成
     * @return bool
     */
  public function isDone():bool{ return $this->done_at>0;}
    /**
     * 保存这个Todo Task
     * @param Todo $todo
     */
    public static function insertTodoTask(Todo $todo){
        if($todo->do_at<1)$todo->do_at=strtotime('tomorrow')-1;
        return $todo->save();
    }

    /**
     * 更新一个TodoTask信息
     * @param array $todo
     */
    public static function updateTodoTask(array $todo){
        Todo::query()->find($todo['id'])->update($todo);
    }

    /**
     * 移除一个 TodoTask
     * @param int $id
     * @throws \Exception
     */
    public static function removeTodoTask(int $id){
        Todo::query()->find($id)->delete();
    }
    /**
     * 已完成Todo
     * @param int $todoId
     */
    public static function done(int $todoId){
        Log::debug('完成任务:'.$todoId);
        $user=Todo::query()->find($todoId);
        $user->done_at=time();
        $user->save();
        return Todo::query()->find($todoId);
    }

    /**
     * 恢复Todo
     * @param Integer $todoId
     */
    public static function recover(int $todoId){
        $user = Todo::query()->find($todoId);
        $user->done_at = 0;
        $user->save();
        return $user;
    }
}
