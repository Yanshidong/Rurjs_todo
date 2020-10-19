<?php

namespace App\Http\Controllers\API;

use App\Helper\RedResponse;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoAPI extends Controller
{

    protected $fillField=['id','name','description','do_at','do_from','done_at'];
    protected $requestObj='App\Models\Todo';
    /**
     * Display a listing of the resource.
     *
     * @return RedResponse
     */
    public function index()
    {
        return RedResponse::success(Todo::getListWithPage($this->requestObj));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedResponse
     */
    public function store()
    {
        //
        return RedResponse::success(Todo::insertTodoTask($this->requestObj));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return RedResponse
     */
    public function show($id)
    {
        return RedResponse::success(Todo::query()->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return  RedResponse
     */
    public function update(Request $request, Todo $todo)
    {
        return RedResponse::success(Todo::updateTodoTask($this->requestObj->toArray()));
    }

    /**
     * 任务结束
     * @param $id
     * @return RedResponse
     */
    public function done($id){
        return RedResponse::success(Todo::done($id));
    }

    /**
     * 撤销/恢复 任务
     * @param $id
     * @return RedResponse
     */
    public function recover($id){
        return RedResponse::success(Todo::recover($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param \App\Models\Todo $todo
     * @return RedResponse
     */
    public function destroy(int $id)
    {
        Todo::removeTodoTask($id);
        return RedResponse::success($id)->withI18n();
    }
}
