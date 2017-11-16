<?php

namespace YangCheng;
/**
 * 服务端SDK
 */
class Sdk
{
    /**
     * 登录数据验证
     * @Author   slpi1
     * @Email    365625906@gmail.com
     * @DateTime 2017-10-26T10:18:25+0800
     * @param    [type]                   $data [description]
     * @param    [type]                   $key  [description]
     * @return   [type]                         [description]
     */
    public static function loginCheck($data, $key)
    {
        return strtolower(md5($data['user_id'] . $data['app_id'] . $data['isadult'] . $data['timestamp'] . $key)) == $data['sign'];
    }
    
    /**
     * 订单信息签名
     * @Author   slpi1
     * @Email    365625906@gmail.com
     * @DateTime 2017-10-26T10:18:46+0800
     * @param    [type]                   $data [description]
     * @param    [type]                   $key  [description]
     * @return   [type]                         [description]
     */
    public static function orderSign($data, $key)
    {
        $params['user_id'] = $data['user_id'];
        $params['app_id'] = $data['app_id'];
        $params['title'] = urlencode($data['title']);
        $params['attach'] = urlencode($data['attach']);
        $params['money'] = $data['money'];
        $params['server'] = urlencode($data['server']);
        $params['role'] = urlencode($data['role']);
        $params['ip'] = urlencode($data['ip']);
        $params['app_key'] = $key;

        ksort($params);
        $data['sign'] = strtolower(md5(http_build_query($params)));

        return $data;
    }

    /**
     * 回调信息验证
     * @Author   slpi1
     * @Email    365625906@gmail.com
     * @DateTime 2017-10-26T10:19:17+0800
     * @param    [type]                   $data [description]
     * @param    [type]                   $key  [description]
     * @return   [type]                         [description]
     */
    public static function notifyCheck($key)
    {
        $data = $_POST;
        if (
            !$data['user_id'] ||
            !$data['app_id'] ||
            !$data['order_sn'] ||
            !$data['attach'] ||
            !$data['money'] ||
            !$data['server'] ||
            !$data['role'] ||
            !$data['sign']
        ) {
            return false;
        }

        $rquestSign = $data['sign'];

        unset($data['sign']);
        $data['app_key'] = $key;
        ksort($data);

        return strtolower(md5(http_build_query($data))) == $rquestSign;
    }

}