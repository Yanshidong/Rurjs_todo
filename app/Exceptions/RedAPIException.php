<?php

namespace App\Exceptions;

use App\Helper\RedCode;
use Exception;

class RedAPIException extends Exception
{
    //
    function __construct($code,$msg='')
    {
        parent::__construct($msg,$code);
    }


    public static function modelNotFound($name){
        throw new RedAPIException(RedCode::F_DB_QUERY_EMPTY,$name);
    }



//    public static function

}
