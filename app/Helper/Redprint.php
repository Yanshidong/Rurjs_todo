<?php
namespace App\Helper;

use Illuminate\Database\Schema\Blueprint;

class Redprint
{
    private $table;

    /**
     * Redprint constructor.
     * @param $table
     */
    public function __construct(Blueprint $table)
    {
        $this->table = $table;
    }

    public static function obj(Blueprint $blue):Redprint{
        return new Redprint($blue);
    }

    public function name($length=20){
        $this->table->string('name',$length)->default('')->comment('$table名称,eg:用户名,标签名');
    }
    public function nameNotNull($length=20){
        $this->table->string('name',$length)->nullable(false)->comment('$table名称,eg:用户名,标签名');
    }
    public function description(){
        $this->table->text('description')->nullable(true)->comment('描述信息,备注,etc');
    }
    public function isEnable(){
        $this->table->boolean('is_enable')->default(false)->comment('是否开启,是否启用,');
    }
    public function isDelete(){
        $this->table->boolean('is_delete')->default(false)->comment('用于软删除,true:已删除,false:未删除');
    }

    /**
     * @param string $table1 主表1名，不带s
     * @param string $table2 主表2名  不带s
     */
    public function foreignTable(string $table1,string $table2)
    {
        $field1=$table1."_id";
        $field2=$table2."_id";
        $this->table->unsignedBigInteger($table1."_id");
        $this->table->unsignedBigInteger($table2."_id");
        $this->table->index($field1);
        $this->table->index($field2);
        $this->table->foreign($table1."_id",$table1."_".$table2.'_forkey')->references('id')->on($table1."s")->cascadeOnDelete();
        $this->table->foreign($table2."_id",$table2."_".$table1.'_forkey')->references('id')->on($table2."s")->cascadeOnDelete();
        return $this;
    }
}
