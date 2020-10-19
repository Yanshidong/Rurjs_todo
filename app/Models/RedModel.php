<?php

namespace App\Models;

use App\Exceptions\RedAPIException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedModel extends Model
{
    use HasFactory;


    protected static $name_created_at='created_at';
    protected static $name_updated_at='updated_at';
    protected static $name_name='name';
    protected static $name_description='description';
    protected static $name_id='id';

    private static $name_request_pageLimit='pageLimit';

    /**
     * 统一获取分页参数:每页条数
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string
     */
    protected static function pageLimit(){
        return request(self::$name_request_pageLimit);
    }

    protected static function rjs_like(string $field,$value){
        if($value==''||$value==null)return (new static)->newQuery();;
        return (new static)->newQuery()->where($field,'like','%'.$value.'%');
    }

    //当前方法请在model中调用！！
    public static function findOrException($id){
        $res = (new static)->newQuery()->find($id);$modelName=explode("\\",get_called_class());
        if($res==null)throw RedAPIException::modelNotFound(array_pop($modelName));
        return $res;
    }

}
