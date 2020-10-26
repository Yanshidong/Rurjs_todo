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
const F_FORM_TOKEN_EXPIRED=4006;//表单令牌过期

const F_DB_QUERY_EMPTY=4100;//数据库查询结果为空,
const F_DB_INSERT=4101;//数据库插入数据失败,
const F_DB_UPDATE=4102;//数据库更新数据失败,
const F_DB_DELETE=4103;//数据库删除数据失败,


const F_SRV_ERROR=5000;//服务器端发生异常

const F_NEED_LOGIN=4501;//需要登录
const F_NEED_RELOGIN=4502;//需要重新登录
const F_TOKEN_NEED_SWOP=4503;//需要续约令牌
const F_TOKEN_EXPIRED=4504;//token已过期或不存在
const F_OTHER_CLIENT_LOGIN=4505;//另一个客户端登录
const F_TOKEN_ILLEGAL=4506;//token错误

const F_PASSWORD_NAME=4510;//用户名密码错误
const F_PASSWORD=4511;//密码错误
const F_USERNAME_NOT_FOUND=4504;//用户名不存在
const F_VERIFY_CODE=4520;//验证码错误
const F_MOBILE_CODE=4521;//短信验证码错误
const F_MOBILE_TOKEN=4522;//手机令牌错误
}
