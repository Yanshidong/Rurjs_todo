<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Integer;

class Todo extends Model
{
    use HasFactory;

    /**
     * 保存这个Todo Task
     * @param Todo $todo
     */
    public static function insertTodoTask(Todo $todo){
        $todo->save();
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
     * @param Integer $todoId
     */
    public static function done(Integer $todoId){
        Todo::query()->find($todoId)->save(['done_at'=>time()]);
    }

    /**
     * 恢复Todo
     * @param Integer $todoId
     */
    public static function recover(Integer $todoId){
        Todo::query()->find($todoId)->save(['done_at'=>0]);
    }
}
