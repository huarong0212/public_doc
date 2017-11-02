# API列表

## Index

- [登录接口](#登录接口)
- [订单创建接口](#订单创建接口)
- [订单信息更新接口](#订单信息更新接口)
- [支付成功回调接口](#支付成功回调接口)

## 登录接口
**内部接口，与聚合SDK进行通讯，无需暴露给渠道。**

用户登录的过程，需要请求该接口，返回数据以供厂商进行验证。

订单创建过程需要请求该接口，以验证请求的合法性，并提供给厂商进行订单创建。
- 接口名: `login/{appId}/{agentId}`
- 请求参数：
```
以渠道提供的文档为准
```
- 返回参数
```
{
    code:
    msg:
    data:{
        user_id: 平台用户ID
        app_id: 应用ID
        isadult: 用户是否成年
        timestamp: 时间戳
        sign: 签名
    }
}
```

## 订单创建接口
**内部接口，与聚合SDK进行通讯，无需暴露给渠道。**

需要先验证渠道用户的登录情况，来确定是否进行订单创建，及请求厂商订单创建接口。

- 接口名: `order/{appId}/{agentId}`
- 请求参数：
```
{
    user_id：聚合平台用户ID
    app_id：应用ID
    attach：游戏订单号
    money：订单金额
    server：游戏区服
    role：用户角色
    ip：用户IP
    sign: 签名
}
```
- 返回参数
```
{
    code:
    msg:
    data:{
        order_sn: 平台订单号，对渠道来说就是游戏订单号
        user_name: 渠道用户标示，可能是渠道用户ID，也可能是渠道用户名，与登录接口中的渠道用户信息含义保持一致
        agent_id: 渠道ID
        agent_name: 渠道名称
        app_id: 应用ID
        title: 订单标题
        money: 订单金额（元整数或分整数，依据渠道文档而定）
        server: 游戏区服
        role: 游戏角色
        
        sign: 签名信息，是否会验签用由渠道决定
    }
}
```
- 验签方式

## 订单信息更新接口
**内部接口，与聚合SDK进行通讯，无需暴露给渠道。该接口需要约定好验签方式。**

在取得渠道 `SDK` 订单创建结果以后，可以更新渠道订单状态，如果渠道订单创建成功且能拿到渠道订单号，可以更新到数据库，与当前订单绑定。


- 接口名: `orderUpdate/{appId}/{agentId}`
- 请求参数
```
{
    order_sn: 聚合平台订单号
    agent_order_status: 渠道订单状态  0: 渠道订单创建失败，1:渠道订单创建成功
    agent_order_sn: 渠道订单号，当 agent_order_status = 1 时必填
    timestamp: 时间戳
    sign: 签名
}
```
- 返回参数
```
{
    code:
    msg:
    data:
}
```
- 签名方式

将 `order_sn/agent_order_status/agent_order_sn/timestamp/sign_key` 参数列表按键值进行字典排序。参数与值用等于号(`=`)链接，参数之间用and符号(`&`)链接，形成如下格式的字符串`order_sn=xxx&agent_order_status=xxx&agent_order_sn=xxx...&sign_key=xxx`，对所得的字符串进行MD5加密后，字符串转为小写，最终得到签名`sign`的值。去掉`app_key`参数后将`sign`值传入参数，最终形成参数列表。
```
$params = array(
    'order_sn' => ...,
    'agent_order_status' => ...,
    'agent_order_sn' => ...,
    'timestamp' => ...,
    
    'sign_key' = $key
);

ksort($params);

$sign = strtolower(md5(http_build_query($params)));
$param['sign'] = $sign;
unset($params['sign']);
return $params;
```


## 支付成功回调接口
**外部接口，暴露给渠道。**
由于该接口直接与渠道服务器通讯，故请求参数与返回参数格式都以渠道提供的文档为准。
- 接口名 `notify/{appId}/{agentId}`
- 请求参数：
```
以渠道提供的文档为准
```
- 返回参数
```
以渠道提供的文档为准
```