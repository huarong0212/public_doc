# 聚合SDK相关过程时序图

![时序图](./assets/active.jpg)

## 过程说明
### 用户登录
- 用户执行登录，调用渠道SDK的登录方法
- 渠道SDK验证用户登录请求成功，调用聚合SDK的登录方法(@login)
- 聚合SDK根据接受的参数，请求聚合Serve的[login接口](./API#登录接口)进行验证
- 聚合SDK登录验证成功后，调用厂商SDK的登录方法完成登录

### 用户充值
- 用户进行充值，调用厂商SDK创建订单
- 厂商创建订单后，回调聚合SDK的订单创建方法(@order)
- 聚合SDK接受订单参数后，请求聚合Serve的[order接口](./API#订单创建接口)
- 聚合SDK接受到订单数据后，回调渠道sdk的订单创建方法

### 充值成功回调
- 渠道Server收到第三方充值成功回调信息
- 渠道Server通知聚合Server充值成功消息，请求聚合Server的[notify接口](./API#支付成功回调接口)
- 聚合Server通知厂商Server充值成功消息

## 约定
### 厂商与聚合平台的约定 - [文档](./sdk)
- 约定用户登录验证方式。由聚合平台向厂商提供相相关文档。
- 约定订单相关参数。由聚合平台向厂商提供相关文档。
- 约定充值回调接口，厂商提供回调接口。由聚合平台向厂商提供相关文档

### 聚合平台与渠道的约定 - 文档(由渠道提供)
- 约定用户登录验证方式。由渠道向聚合平台提供相关文档。
- 约定订单相关参数。由渠道向聚合平台提供相关文档。
- 约定充值回调接口，聚合平台提供回调接口。由渠道向平台提供相关文档。

## 附
- [游戏厂商接入文档](./sdk)
- [API](./API)
- [渠道SDK规范](./agent-sdk-class)
- [渠道文档示例](./agent-doc-demo)

