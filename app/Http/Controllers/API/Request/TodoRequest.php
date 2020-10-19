<?php


namespace App\Http\Controllers\API\Request;


use App\Models\Todo;

class TodoRequest
{
    public $name;
    public $description;

    public function toModel():Todo{
        return new Todo(['name'=>$this->name,'description'=>$this->description]);
    }
}
