# 盒子接口列表

## Index
 - [初始化](#init) 
 - [游戏列表](#game-list) 
 - [游戏信息](#game-info) 
 - [游戏详细信息](#game-info-full) 
 - [分类列表](#cate-list) 
 - [其他人下载](#other-down) 
 - [专题列表](#special-list) 
 - [专题游戏列表](#special-games) 
 - [游戏升级](#game-update) 
 - [大家都在搜](#search-tag) 
 - [搜索](#search) 
 - [礼包首页](#gift-index) 
 - [礼包列表](#gift-list) 
 - [礼包信息](#gift-info) 
 - [兑换礼包](#convert-gift) 
 - [我的礼包](#my-gift) 
 - [我的礼包详情](#my-gift-detail) 
 - [注册](#reg) 
 - [登录](#login) 
 - [发送验证码](#sendcode) 
 - [验证验证码](#checkcode) 
 - [用户资料](#user-info) 
 - [充值记录](#user-record) 
 - [我的游戏](#user-game) 
 - [更新个人资料](#update-user) 
 - [上传头像](#upload-user-inavatar) 
 - [用户签到](#sign) 
 - [忘记密码](#forget-pwd) 
 - [忘记密码](#reset-pwd) 
 - [创建订单](#order) 
 - [支付列表](#pay-way-list) 
 - [任务列表](#tasks) 
 - [商品分类](#goods-type) 
 - [商品列表](#goods-list) 
 - [商品详情](#goods-info) 
 - [购买记录](#my-goods) 
 - [商品兑换](#goods-convert) 
 - [盒子游戏安装日志](#install) 
 - [游戏卸载日志](#uninstall) 
 - [增加导入游戏下载次数](#api-game-down) 
 - [幻灯片](#slide) 
 - [开服表](#game-kaifu-list) 
 - [支付选项](#payopt) 
 - [获取订单实付金额](#get-order-pay-money) 
 - [用户积分记录](#point-log) 
 - [返利游戏列表](#benefits-game) 
 - [抽奖信息](#luck-draw) 
 - [用户抽奖](#draw) 
 - [可申请返利游戏列表](#bt-repay-apply) 
 - [返利申请](#repay-apply) 
 - [我的返利申请](#my-repay-apply) 
 - [抽奖奖品使用](#convert-game-money)
 - [用户消息](#user-msg)
 - [阅读消息](#read-msg)

**公共请求参数列表**
```
{
    IMEI: 串号
    timestamp: 时间戳
    encrypt-response: 是否加密
    sys_versoin: 系统版本
    version: 盒子版本
    box_agent_id: 盒子原始渠道
}
```

<h2 id="init">初始化</h2>

- 接口名: box/init 
- 请求参数
- 返回参数
```
{
    code: 1,
    message: 接口信息,
    data: {
        name: 盒子名称,
        logo: logo图片地址,
        color: 盒子颜色,
        is_update: 是否有更新,
        is_strong: 是否强制更新,
        update_info: {
            url: 更新包地址,
            version: 版本号,
            desp: 更新说明
        },
        agent_info: 用户渠道信息 其他渠道的用户登录时，保存该信息至本地，用于下次启动
        launch_img: 启动图,
        type: 动作类型 0: 盒子内游戏，1: 网页,
        type_value: 动作值 'avtivity'/url,
        game_id: 游戏ID,
        game_type: 游戏类型
        
        box_gift_ico: 盒子活动图标
        box_gift_detail_img: 盒子活动详情图片
        
        cate: [
            {
                category_title: 标题
                category_icon: 图标
                category_desc: 说明
                activity_class: 视图名称
                activity_title: 视图标题
                game_type: 值
            }
            ...
        ]
        
        active:[
            {
                category_title: 标题
                category_icon: 图标
                category_desc: 说明
                activity_class: 视图名称
                activity_title: 视图标题
                game_type: 值
            }
        ]
    }
}
```

<h2 id="game-list">游戏列表</h2>

- 接口名: box/gameList 
- 请求参数 
```
{
    type: hots首页列表/new最新/rank排行/cate分类
    cate_id: 分类ID(当type值为cate时需要)
    page: 页码
    limit: 分页数
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            benefits: 是否返利
            benefits_rate: 返利比例
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址/H5玩游戏地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="game-info">游戏信息</h2>

- 接口名: box/gameInfo 
- 请求参数 
```
{
    game_id: 游戏ID
    type: 游戏类型
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    data: {
        body: 游戏详情
        imgs: 游戏截图
        has_gift: 是否有礼包
        share_url: 分享内容
    }
}
```

<h2 id="game-info-full">游戏详细信息</h2>

- 接口名: box/gameInfoFull 
- 请求参数 
```
{
    game_id: 游戏ID
    type: 游戏类型
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    data: {
        benefits: 是否返利
        benefits_rate: 返利比例
        game_id: 游戏ID
        name: 游戏名称
        ico: 游戏logo
        size: 游戏大小
        desp: 描述
        cate_name: 分类名称
        package_name: 包名
        version_name: 版本号
        update_time: 更新时间
        download_times: 下载次数
        url: 绝对下载地址
        type: 游戏类别
        has_gift: 是否有礼包
        down_url: 统计下载地址
        size_text: 游戏大小描述
        is_h5: 是否是H5游戏
        image: 游戏资料片
        
        cate_id: 分类ID
        sort: 排序
        is_comm: 是否推荐
        agent_id: 渠道ID

    }
}
```

<h2 id="cate-list">分类列表</h2>

- 接口名: box/cateList 
- 请求参数 
-返回参数
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 分类ID
            name: 分类名称
            sort: 分类排序
            ico: 分类图标
            desp: 分类描述
            size: 分类游戏数量
            
            game_list: [
                {
                    benefits: 是否返利
                    benefits_rate: 返利比例
                    game_id: 游戏ID
                    name: 游戏名称
                    ico: 游戏logo
                    size: 游戏大小
                    desp: 描述
                    cate_name: 分类名称
                    package_name: 包名
                    version_name: 版本号
                    update_time: 更新时间
                    download_times: 下载次数
                    url: 绝对下载地址
                    type: 游戏类别
                    has_gift: 是否有礼包
                    down_url: 统计下载地址
                    size_text: 游戏大小描述
                    is_h5: 是否是H5游戏
                    image: 游戏资料片
                }
                ...
            ]
        }
        ...
    ]
}
```

<h2 id="other-down">其他人下载</h2>

- 接口名: box/otherDown 
- 请求参数 
```
{
    game_id: 游戏id
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="special-list">专题列表</h2>

- 接口名: box/specialList 
- 请求参数 
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 专题ID
            name: 专题名称
            img: 专题图片
            desp: 专题描述
            sort: 专题排序
            status: 专题状态
            
            time: 活动时间 （格式: 9.13-9.15）
            start_time: 开始时间
            end_time: 结束时间
        },
        ...
    ]
}
```

<h2 id="special-games">专题游戏列表</h2>

- 接口名: box/specialGames 
- 请求参数:  
```
{
    special_id: 专题ID
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="game-update">游戏升级</h2>

- 接口名: box/gameUpdate 
- 请求参数:  
```
{
    packages: 包名
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="search-tag">大家都在搜</h2>

- 接口名: box/searchTag 
- 请求参数:  
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="search">搜索</h2>

- 接口名: box/search 
- 请求参数:  
```
{
    keyword: 搜索关键词
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="gift-index">礼包首页</h2>

- 接口名: box/giftIndex 
- 请求参数:  
```
{
    game_name: 游戏名称
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            game_name: 游戏名称
            last_gift_name: 最新礼包
            ico: 图标
            num: 礼包数量
        }
    ]
}
```


<h2 id="gift-list">礼包列表</h2>

- 接口名: box/giftList 
- 请求参数:  
```
{
    game_id: 游戏ID
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 礼包ID
            name: 礼包名称
            content: 礼包内容
            change_note: 兑换方式
            desp: 描述
            img: 图片
            is_pay: 是否需要积分兑换
            start_time: 兑换开始时间
            end_time: 兑换结束时间
            total_num: 总量
            remain_num: 剩余数量
            goods_id: 商品ID
            goods_type_id: 商品分类ID
            access_date: 有效期
        }
    ]
}
```

<h2 id="gift-info">礼包信息</h2>

- 接口名: box/giftInfo 
- 请求参数:  
```
{
    gift_id: 礼包ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: {
        id: 礼包ID
        name: 礼包名称
        content: 礼包内容
        change_note: 兑换方式
        desp: 描述
        img: 图片
        is_pay: 是否需要积分兑换
        start_time: 兑换开始时间
        end_time: 兑换结束时间
        total_num: 总量
        remain_num: 剩余数量
        goods_id: 商品ID
        goods_type_id: 商品分类ID
        access_date: 有效期
    }
}
```

<h2 id="convert-gift">兑换礼包</h2>

- 接口名: box/convertGift 
- 请求参数:  
```
{
    user_id: 用户ID
    gift_id: 礼包ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: {
        code: 礼包码
    }
}
```

<h2 id="my-gift">我的礼包</h2>

- 接口名: box/myGift 
- 请求参数:  
```
{
    user_id: 用户ID
    game_id: 游戏ID
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 礼包ID
            name: 礼包名称
            content: 礼包内容
            img: 礼包图片
            game_id: 游戏ID
            code: 礼包码
        },
        ...
    ]
}
```

<h2 id="my-gift-getail">我的礼包详情</h2>

- 接口名: box/myGiftDetail 
- 请求参数:  
```
{
    user_id: 用户ID
    gift_id: 礼包ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: {
        code: 礼包码
    }
}
```

<h2 id="reg">注册</h2>

- 接口名: box/reg 
- 请求参数:  
```
{
    mobile: 手机号
    pwd: 密码
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: {
        id: 
        name: 
        pwd: 
        email: 
        mobile: 
        nick_name: 
        qq: 
        point: 
        money: 
        device_type: 
        sys_version: 
        imeil: 
        agent_pid: 
        agent_id: 
        agent_title: 
        agent_ptitle: 
        from_id: 
        reg_time: 
        reg_date: 
        last_login_time: 
        last_login_ip: 
        ip: 
        nip: 
        game_id: 
        face: 
        sex: 
        birth: 
        area_id: 
        question: 
        answer: 
        is_vali_name: 
        is_vali_mobile: 
        is_vali_email: 
        is_finish_info: 
        is_first_pwd_upd: 
        status: 
        status_msg: 
        sdk_version: 
    }
}
```

<h2 id="login">登录</h2>

- 接口名: box/login 
- 请求参数:  
```
{
    mobile: 手机、用户名
    pwd: 密码
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: {
        id: 
        name: 
        pwd: 
        email: 
        mobile: 
        nick_name: 
        qq: 
        point: 
        money: 
        device_type: 
        sys_version: 
        imeil: 
        agent_pid: 
        agent_id: 
        agent_title: 
        agent_ptitle: 
        from_id: 
        reg_time: 
        reg_date: 
        last_login_time: 
        last_login_ip: 
        ip: 
        nip: 
        game_id: 
        face: 
        sex: 
        birth: 
        area_id: 
        question: 
        answer: 
        is_vali_name: 
        is_vali_mobile: 
        is_vali_email: 
        is_finish_info: 
        is_first_pwd_upd: 
        status: 
        status_msg: 
        sdk_version: 
        sign_access: 是否显示签到按钮
        signed: 是否已签到
        num: 连续签到次数
        signe_point: 本次签到积分
        
        new_massages: 消息条数
    }
}
```

<h2 id="sendcode">发送验证码</h2>

- 接口名: box/sendcode 
- 请求参数:  
```
{
    type: 发送类型
    mobile: 手机号
    user_name: 用户名
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data:
}
```

<h2 id="checkcode">验证验证码</h2>

- 接口名: box/checkcode 
- 请求参数:  
```
{
    mobile: 手机号
    code: 验证码
    user_name: 用户名
    type: 验证类型
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data:
}
```

<h2 id="user-info">用户资料</h2>

- 接口名: box/userInfo 
- 请求参数:  
```
{
    user_id: 用户ID
}
```
- 返回参数 
```
    {
        id: 
        name: 
        pwd: 
        email: 
        mobile: 
        nick_name: 
        qq: 
        point: 
        money: 
        device_type: 
        sys_version: 
        imeil: 
        agent_pid: 
        agent_id: 
        agent_title: 
        agent_ptitle: 
        from_id: 
        reg_time: 
        reg_date: 
        last_login_time: 
        last_login_ip: 
        ip: 
        nip: 
        game_id: 
        face: 
        sex: 
        birth: 
        area_id: 
        question: 
        answer: 
        is_vali_name: 
        is_vali_mobile: 
        is_vali_email: 
        is_finish_info: 
        is_first_pwd_upd: 
        status: 
        status_msg: 
        sdk_version: 
        game_list: 玩过的游戏
        [
            {
                id: 
                user_id: 
                game_id: 
                money: 
                agent_pid: 
                agent_id: 
                reg_time: 
                reg_date: 
                last_login_time: 
                username: 
                user_money: 
                mobile: 
                game_name: 
                ico: 
                agent_title: 
            },
            ...
        ]
    }
}
```

<h2 id="user-record">充值记录</h2>

- 接口名: box/userRecord 
- 请求参数:  
```
{
    user_id: 用户ID
    user_name: 用户名
    status:  -1所有 1支付失败 2支付成功 3充值失败 4充值完成 
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            order_sn: 订单号
            status: 订单状态
            status_msg: 状态信息
            desp: 订单信息
            money: 订单金额
            rmb_money: 人民币金额
            finish_time: 支付完成时间
            pay_way_title: 支付方式
        },
        ...
    ]
}
```

<h2 id="user-game">我的游戏</h2>

- 接口名: box/userGame 
- 请求参数:  
```
{
    user_id: 用户ID
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 图标
            size: 大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 下载绝对地址
            type: 游戏类型
            money: 游戏币余额
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="update-user">更新个人资料</h2>

- 接口名: box/updateUser 
- 请求参数:  
```
{
    user_id: 用户ID
    name: 用户名
    pwd: 密码
    email: 邮箱
    mobile: 手机
    nick_name: 昵称
    qq: QQ号
    sex: 性别
    birth: 生日
    area_id: 地区
    question: 问题
    answer: 答案
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="upload-user-inavatar">上传头像</h2>

- 接口名: box/uploadUserInavatar 
- 请求参数:  
```
{
    user_id: 用户ID
    img: 头像
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="sign">用户签到</h2>

- 接口名: box/sign 
- 请求参数:  
```
{
    user_id: 用户ID
}
```

<h2 id="forget-pwd">忘记密码</h2>

- 接口名: box/forgetPwd 
- 请求参数:  
```
{
    mobile: 手机
    pwd: 密码
}
```

<h2 id="reset-pwd">忘记密码</h2>

- 接口名: box/resetPwd 
- 请求参数:  
```
{
    mobile: 手机
    pwd: 密码
}
```

<h2 id="order">创建订单</h2>

- 接口名: box/order 
- 请求参数:  
```
{
    type: 支付类型
    amount: 交易金额
    user_id: 用户id
    orderid: 客户订单号
    imeil: 其他支付身份信息
    productname: 商品名称
    md5signstr: 待签名串
    game_id:  游戏ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: wx_sign: 微信支付特有参数
    order_num: 订单号
    params: 订单参数
    starttime: 订单时间
    notify_url: 回调地址
}
```

<h2 id="pay-way-list">支付列表</h2>

- 接口名: box/payWayList 
- 请求参数:  
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 支付方式ID
            title: 支付名称
            desp: 支付描述
        },
        ...
    ]
}
```

<h2 id="tasks">任务列表</h2>

- 接口名: box/tasks 
- 请求参数:  
```
{
    user_id: 用户ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: {
        repeat: [
            {
                log_action_name: 任务标记
                log_point: 历史累计积分
                id: 任务ID
                point_action_id: 规则ID
                point: 规则积分
                name: 任务标记
                title: 任务中文名
                title_sub: 任务简称
                desp: 任务说明
                ico: 任务图标
                type: 任务类型
                app_active: APP动作
                [share_content: 分享内容]
                [share_imgs: 分享图片]
            }
            ...
        ],
        once: [
            {
                log_action_name: 任务标记
                log_point: 历史累计积分
                id: 任务ID
                point_action_id: 规则ID
                point: 规则积分
                name: 任务标记
                title: 任务中文名
                title_sub: 任务简称
                desp: 任务说明
                ico: 任务图标
                type: 任务类型
                app_active: APP动作
            }
            ...
        ]
    }
    ]
}
```

<h2 id="goods-type">商品分类</h2>

- 接口名: box/goodsType 
- 请求参数:  
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 商品分类id
            name: 商品分类名称
            title: 商品分类标题
            ico: 图标
            sort: 排序
            total_num: 商品数量
            total_convert: 商品兑换次数
        },
        ...
    ]
}
```

<h2 id="goods-list">商品列表</h2>

- 接口名: box/goodsList 
- 请求参数:  
```
{
    goods_type_id: 商品类别
    game_id: 游戏id
    page: 页码
    limit: 分页数
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 商品id
            name: 商品名称
            type_id: 商品类别
            type_val: 类别值
            game_id: 游戏id
            img: 商品图片
            desp: 商品内容
            price: 商品消耗积分
            stock: 库存
            curr_stock: 现存
            max_buy_num: 最大购买次数
            is_comm: 推荐
            uc_start_time: 有效开始时间
            uc_end_time: 有效结束时间
            uc_money: 最低消费
            sort: 排序
            status: 状态
            type_name: 分类名称
            game_name: 游戏名称
            use_method: 使用方法
        },
        ...
    ]
}
```

<h2 id="goods-info">商品详情</h2>

- 接口名: box/goodsInfo 
- 请求参数:  
```
{
    goods_id: 商品id
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: {
        id: 商品id
        name: 商品名称
        type_id: 商品类别
        type_val: 类别值
        game_id: 游戏id
        img: 商品图片
        desp: 商品内容
        price: 商品消耗积分
        stock: 库存
        curr_stock: 现存
        max_buy_num: 最大购买次数
        is_comm: 推荐
        uc_start_time: 有效开始时间
        uc_end_time: 有效结束时间
        uc_money: 最低消费
        sort: 排序
        status: 状态
        type_name: 分类名称
        game_name: 游戏名称
        use_method: 使用方法
    }
}
```

<h2 id="my-goods">购买记录</h2>

- 接口名: box/myGoods 
- 请求参数:  
```
{
    user_id: 用户ID
    game_id: 游戏ID
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            id: 购买记录ID
            user_id: 用户ID
            goods_id: 商品ID
            goods_name: 商品名称
            goods_type_id: 商品类别
            goods_type_val: 类别值
            goods_game_id: 商品所属游戏
            goods_img: 商品图片
            goods_desp: 商品内容
            goods_price: 所需积分
            goods_uc_start_time: 有效开始时间
            goods_uc_end_time: 有效结束时间
            goods_uc_money: 最低消费额度
            price: 积分
            num: 数量
            attach: 
            trade_time: 购买时间
            trade_date: 购买日期
            ip: 
            is_used: 是否使用
            game_name: 游戏名
            user_name: 用户名
            goods_type_name: 商品分类名
            gift_code: 礼包码
            trade_time_text: 交易时间描述
        },
        ...
    ]
}
```


<h2 id="goods-convert">商品兑换</h2>

- 接口名: box/goodsConvert 
- 请求参数:  
```
{
    user_id: 用户ID
    goods_id: 商品ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="install">盒子游戏安装日志</h2>

- 接口名: box/install 
- 请求参数:  
```
{
    game_id: 游戏ID
    type: 游戏类别
    package_name: 游戏包名
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="uninstall">游戏卸载日志</h2>

- 接口名: box/uninstall 
- 请求参数:  
```
{
    game_id: 游戏ID
    type: 游戏类别
    package_name: 游戏包名
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="api-game-down">增加导入游戏下载次数</h2>

- 接口名: box/apiGameDown 
- 请求参数:  
```
{
    game_id: 游戏ID
    type: 游戏类别
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```

<h2 id="slide">幻灯片</h2>

- 接口名: box/slide 
- 请求参数:  
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            title: 标题
            img: 图片
            type: 类型
            type_value: 类型值
            game_id: 游戏id
            game_type: 游戏类别
        },
        ...
    ]
}
```

<h2 id="game-kaifu-list">开服表</h2>

- 接口名: box/gameKaifuList 
- 请求参数:  
```
{
    game_name: 游戏名称
    time: 时间 0:历史开服，1:即将开服
    page: 页码
    limit: 分页数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            benefits: 是否返利
            benefits_rate: 返利比例
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            is_h5: 是否是H5游戏
            image: 游戏资料片
            
            server: 区服
            open_time: 开服时间
        },
        ...
    ]
}
```

<h2 id="payopt">支付选项</h2>

- 接口名: box/payopt 
- 请求参数 
```
{
    game_id: 游戏ID（可选）
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            pay_money: 充值金额
            discount: 折扣
            percent: 返利比例
            return_game_money: 返利游戏币
            return_range_money:  返利最小充值金额
        }
    ]
}
```

<h2 id="get-order-pay-money">获取订单实付金额</h2>

- 接口名: box/getOrderPayMoney 
- 请求参数:  
```
{
    game_id: 游戏ID（可选）
    order_money
    version
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    date: {
        order_money: 订单金额
        return_game_money: 返利游戏币
    }
}
```

<h2 id="point-log">用户积分记录</h2>

- 接口名: box/pointLog 
- 请求参数:  
```
{
    user_id: 用户ID
    page: 页码
    limit: 每页条数
}
```
- 返回参数 
```
{
    code: 1,
    message: 接口信息,
    date: [
        {
            id:  记录ID,
            action_title:  记录标题,
            point:  积分变动值，正值表示用户积分增加，负值表示用户积分减少,
            add_time:  记录发生时间,
            goods_log:  若记录为积分兑换，表示购买记录ID（myGoods返回参数中的id）。
        }
        ...
    ]
}
```

<h2 id="benefits-game">返利游戏列表</h2>

- 接口名: box/benefitsGame 
- 请求参数:  
```
{
    page: 页码
    limit: 每页条数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
        },
        ...
    ]
}
```

<h2 id="luck-draw">抽奖</h2>

- 接口名: box/luckDraw 
- 请求参数:  
```
{
    user_id: 用户ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: {
        luck_draw_info: {
            id: 活动ID
            title: 抽奖活动名称
            name: 活动标记
            desp: 活动简介
            img: 活动图片
            start_time: 开始时间
            end_time: 结束时间
            start_date: 开始日期
            end_date: 结束日期
            status: 活动状态
            login_access: 是否开启登录抽奖
            rule: 抽奖规则
        }
        goods_list: [
            {
                id: 奖品ID
                name: 奖品名称
                img: 奖品图片
            }
            ...
        ]
        winners:[
            {
                id: 中奖纪录ID
                user_name: 中奖用户
                goods_id: 中奖奖品ID
                goods_name: 中奖奖品
                add_time: 中奖时间
                type: 精品类型 0:虚拟奖品，1: 实物奖品
                status: 奖品发放状态 0: 未中奖, 1: 未发放, 2: 已发放
            }
            ...
        ]
        my_goods:[
            {
                id: 中奖纪录ID
                user_name: 中奖用户
                goods_id: 中奖奖品ID
                goods_name: 中奖奖品
                add_time: 中奖时间
                type: 精品类型 0:虚拟奖品，1: 实物奖品
                status: 奖品发放状态 0: 未中奖, 1: 未发放, 2: 已发放
            }
            ..
        ]
        draw_times: 剩余抽奖次数
    }
}
```

<h2 id="draw">用户抽奖</h2>

- 接口名: box/draw 
- 请求参数:  
```
{
    user_id: 用户ID
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: {
        id: 中奖纪录ID
        user_name: 中奖用户
        goods_id: 中奖奖品ID
        goods_name: 中奖奖品
        add_time: 中奖时间
        type: 精品类型 0:虚拟奖品，1: 实物奖品
        status: 奖品发放状态 0: 未中奖, 1: 未发放, 2: 已发放
    }
}
```


<h2 id="bt-repay-apply">可申请返利游戏列表</h2>

- 接口名: box/btBenefitsGame 
- 请求参数:  
```
{
    user_id: 用户名
    page: 页码
    limit: 每页条数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
            
            count: 今日充值金额
        },
        ...
    ]
}
```

<h2 id="repay-apply">返利申请</h2>

- 接口名: box/repayApply 
- 请求参数:  
```
{
    user_id: 用户ID
    game_id: 游戏ID
    login_name: 游戏账号
    role: 角色名
    role_id: 角色ID
    server: 游戏区服
    money: 充值金额
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: 
}
```


<h2 id="my-repay-apply">我的返利申请</h2>

- 接口名: box/myRepayApply 
- 请求参数:  
```
{
    user_id: 用户名
    page: 页码
    limit: 每页条数
}
```
- 返回参数:  
```
{
    code: 1,
    message: 接口信息,
    data: [
        {
            
            game_id: 游戏ID
            name: 游戏名称
            ico: 游戏logo
            size: 游戏大小
            desp: 描述
            cate_name: 分类名称
            package_name: 包名
            version_name: 版本号
            update_time: 更新时间
            download_times: 下载次数
            url: 绝对下载地址
            type: 游戏类别
            has_gift: 是否有礼包
            down_url: 统计下载地址
            size_text: 游戏大小描述
            benefits: 是否返利
            benefits_rate: 返利比例
            is_h5: 是否是H5游戏
            image: 游戏资料片
            
            user_id: 用户ID
            game_name: 游戏名
            login_name: 游戏账号
            role: 角色名
            role_id: 角色ID
            server: 游戏区服
            money: 充值金额
            status: 申请状态 0: 待处理, 1: 已发放, 2: 已拒绝
            add_time: 申请时间
        }
        ...
    ]
}
```

<h2 id="convert-game-money">抽奖奖品使用</h2>

仅中奖纪录商品 `type == 0  && status == 1` 的记录可以使用。

- 接口名: box/convertGameMoney 
- 请求参数:  
```
{
    user_id: 用户ID
    game_id: 游戏ID
    luck_draw_log: 中奖纪录ID
}
```
- 返回参数:  
```
{
    code: 1
    message: 接口信息
    data: 
}
```

<h2 id="user-msg">用户消息列表</h2>

每页12条。
- 接口名: box/userMsg
- 请求参数: 
```
{
    user_id: 用户Id
    page: 页码
}
```
- 返回参数
```
{
    code: 1
    message: 接口信息
    data: [
        {
            id: 消息ID
            title: 消息标题
            body: 消息内容
            from_id: 发送人
            from_name: 发送人昵称
            from_role: 发送人角色
            user_id: 用户ID
            add_time；发送时间
            is_read : 是否已读 0: 未读，1: 已读
        }
        ...
    ]
}
```

<h2 id="read-msg">消息阅读</h2>

- 接口名: box/readMsg
- 请求参数: 
```
{
    user_id: 用户Id
    msg_id: 消息Id
}
```
- 返回参数
```
{
    code: 1
    message: 接口信息
    data: 
}
```