<?php

namespace Tests\Feature;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class TodoModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testInsertTodoTask()
    {
        $todo=new Todo(['name'=>uniqid()]);
        $todo->updateTimestamps();
        $this->assertTrue(Todo::insertTodoTask($todo));
        $userCheck =Todo::query()->find($todo->id);
        $this->assertNotNull($userCheck);
        $this->assertNotNull($userCheck->created_at);
        $this->assertNotNull($userCheck->updated_at);
        return $userCheck;
    }

    public function testUpdateTodoTask()
    {
        $this->testInsertTodoTask();
        $user = Todo::query()->firstWhere('done_at','<',1);
        $this->assertNotNull($user);
        $user->name = uniqid('php_');
        $user->update([]);
        printf($user->name);
    }

    private function getOne():Model{
        return Todo::query()->firstWhere('done_at','<',1);
    }
    public function testRemoveTodoTask()
    {
        $this->testInsertTodoTask();
        $user = $this->getOne();
        $this->assertNotNull($user);
        Todo::removeTodoTask($user->id);
        //check if delete success
        $userCheck = Todo::query()->find($user->id);
        $this->assertNull($userCheck);
    }

    public function testDone()
    {
        $userSwitch = $this->testInsertTodoTask();
        $this->assertNotNull($userSwitch);
        printf($userSwitch->name);
        $userCheck= Todo::query()->find($userSwitch->id);
        $done=Todo::done($userCheck->id);
        $this->assertTrue($done->isDone());
    }

    public function testRecover()
    {
        $userPrepare = $this->testInsertTodoTask();
        Todo::done($userPrepare->id);
        Todo::recover($userPrepare->id);
        $user = Todo::query()->find($userPrepare->id);
        $this->assertFalse($user->isDone());
    }


}
