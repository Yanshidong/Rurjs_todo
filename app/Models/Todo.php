<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Integer;

class Todo extends RedModel
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
         $todo->save();
         return $todo::query()->find($todo->id);
    }

    /**
     * 更新一个TodoTask信息
     * @param array $todo
     */
    public static function updateTodoTask(array $todo){
        Todo::findOrException($todo['id'])->update($todo);
        return Todo::query()->find($todo['id']);
    }

    /**
     * 移除一个 TodoTask
     * @param int $id
     * @throws \Exception
     */
    public static function removeTodoTask(int $id){
        return Todo::findOrException($id)->delete();
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
        $user = Todo::findOrException($todoId);
        $user->done_at = 0;
        $user->save();
        return $user;
    }

    public static function getListWithPage(Todo $search){
        $query=Todo::rjs_like('name',$search->name);
        if($search->done_at)$query->where('done_at','>',$search->done_at);
        if($search->do_at)$query->where('do_at','>=',$search->do_at);
        if($search->do_from)$query->where('do_from','<=',$search->do_from);
        return $query->orderByDesc(self::$name_created_at)
            ->paginate(self::pageLimit());
    }
}
