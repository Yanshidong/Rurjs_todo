<?php


namespace App\Helper;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Psr7\get_message_body_summary;

/**
 * @Author: tutu
 * @Corp: 茹茹家的店
 * @Time: 14:25
 * @Date: 2020/10/16
 * @www: http://www.rurjs.com
 * @Email: wangde007@outlook.com
 * @Copyright (c) 2018-2020 rurjs Ltd. All Rights Reserved.
 * @Desc: API统一返回包装器,所有API层返回请使用此类对象
 **/
class RedResponse  extends Model
{
    private $code;
    private $msg;
    private $data;
    private $i18n=false;

    /**
     * RedResponse constructor.
     * @param $code
     * @param $msg
     * @param $data
     */
    public function __construct($data,$code, $msg='')
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getCode():int
    {
        return $this->code;
    }

    private function setMsg($msg){ $this->msg=$msg;}
    /**
     * @return string
     */
    public function getMsg()
    {
        if($this->msg==null)$this->setMsg('');
        return $this->msg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 简单判断返回状态
     * @return bool
     */
    public function isSuccess():bool{
        return $this->getCode()==RedCode::SUCCESS;
    }

    public static function success($data=""):RedResponse{
        return new RedResponse($data,RedCode::SUCCESS);
    }

    public static function failed(int $code=RedCode::FAILED, string $msg=''):RedResponse{
        return new RedResponse('',$code,$msg);
    }

    /**
     * 遍历当前data并重置data
     * @param \Closure $fun
     * @return RedResponse
     */
    public function map(\Closure $fun){
        if(is_array($this->data)){
            $this->data=array_map($fun,$this->data);
        }
        return $this;
    }

    public function mapChild(\Closure $fun){

        return $this;
    }

    public function withI18n(){$this->i18n=true;return $this;}

    public function toArray()
    {
        return [
            'code'=>$this->getCode(),
            'msg'=>
                $this->i18n?$this->getMsg():$this->getMsg(),
            'data'=>$this->getData()];
    }

    private function getI18nMsg(){
        $code2msg=[
            RedCode::F_DB_QUERY_EMPTY=>'记录不存在'
        ];
        if($code2msg[$this->getCode()]!=null)return $code2msg[$this->getCode()];
        return '$i18nDefault';
    }


}
