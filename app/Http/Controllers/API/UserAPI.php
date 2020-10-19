<?php

namespace App\Http\Controllers\API;

use App\Helper\RedResponse;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class UserAPI extends Controller
{
    protected $fillField=['id','name','description','do_at','do_from'];
    protected $requestObj='App\Models\Todo';

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return RedResponse::success(Todo::getListWithPage($this->requestObj));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
