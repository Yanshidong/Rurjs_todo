<?php


namespace App\Helper;

/**
 * @Author: tutu
 * @Corp: 茹茹家的店
 * @Time: 14:32
 * @Date: 2020/10/16
 * @www: http://www.rurjs.com
 * @Email: wangde007@outlook.com
 * @Copyright =c) 2018-2020 rurjs Ltd. All Rights Reserved.
 * @Desc: 状态码及其msg
 **/
class RedCode
{
const SUCCESS=2000;//;//,
const FAILED=4000;//请求失败,
const F_PARAM_ERROR=4001;//参数校验失败,
const F_PARAM_CROSSING=4002;//参数越界,
const F_AUTH_FORBIDDEN=4003;//资源不可用,
const F_PARAM_MISSING=4004;//参数为空,
const F_PARAM_FORBID=4005;//参数不允许,
const F_DB_QUERY_EMPTY=4100;//数据库查询结果为空,

const F_DB_INSERT=4101;//数据库插入数据失败,
const F_DB_UPDATE=4102;//数据库更新数据失败,
const F_DB_DELETE=4103;//数据库删除数据失败,


const F_SRV_ERROR=5000;//服务器端发生异常
}
