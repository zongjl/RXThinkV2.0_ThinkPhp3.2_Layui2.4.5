<?php 

/**
 * 后台常用基础参数配置
 * 
 * @author zongjl
 * @date 2018-08-27
 */
return array(

    //是否菜单
    'IS_MENU' => array(
        1 => '是',
        2 => '否',
    ),
    
    //菜单类型
    'MENU_TYPE'=>array(
        1 => '模块',
        2 => '导航',
        3 => '菜单',
        4 => '节点',
    ),
    
    //状态
    'STATUS_ARR'  => array(
        1 => '在用',
        2 => '停用',
    ),
    
    //审核状态
    'CHECK_STATUS_ARR' =>array(
        1 => '待审核',
        2 => '审核通过',
        3 => '审核失败',
    ),
    
    //设备类型
    'DEVICE_TYPE'=>array(
        1 => '苹果',
        2 => '安卓',
    ),
    
    //版本类型
    'VERSION_TYPE'=>array(
        1 => '云多普用户版',
        2 => '云多普老师版',
    ),
    
    //站点类型
    'ITEM_TYPE'=>array(
        1 => '普通站点',
        2 => '其他',
    ),
    
    //所属平台
    'PLATFORM_TYPE'=>array(
        1 => 'APP端',
        2 => 'WAP端',
        3 => 'PC端',
    ),
    
    //广告类型
    'AD_TYPE'=>array(
        1 => '图片',
        2 => '文字',
        3 => '视频',
        4 => '推荐',
    ),
    
    //友链类型
    'LINK_CATE'=>array(
        1 => '友情链接',
        2 => '合作伙伴',
    ),
    
    //友链类型
    'LINK_TYPE'=>array(
        1 => '文字',
        2 => '图片',
    ),
    
    //系统推荐类型(布局、广告)
    'SYSTEM_RECOMM_TYPE'=>array(
        1 => 'CMS文章',
        2 => '其他',
    ),
    
    //CMS状态
    'ARTICLE_STATUS'=>array(
        1 => '待审核',
        2 => '已通过',
        3 => '未通过',
    ),
    
    //字典类型
    'DICTIONARY_TYPE'=>array(
        1 => '系统设置',
        2 => '其他',
    ),
    
    //日志类型
    'LOGGER_TYPE'=>array(
        1 => '登录',
        2 => '登出',
        3 => '新增',
        4 => '修改',
        5 => '删除',
        6 => '查询',
    ),
    
    //短信状态
    'SMS_LOG_STATUS'=>array(
        1 => '成功',
        2 => '失败',
        3 => '待处理',
    ),
    
    //配置类型
    'SYSTEM_CONFIG_TYPE'=>array(
        1 => '单行文本',
        2 => '多行文本',
        3 => '富文本',
        4 => '单张图片',
        5 => '多张图集',
    ),
    
    //订单状态
    'ORDER_STATUS'=>array(
        1 => '待确认',
        2 => '已作废',
        3 => '已确认',
        4 => '已完成',
        5 => '已退款',
    ),
    
    //订单类型
    'ORDER_TYPE'=>array(
        1 => "商品订单",
        2 => "配件订单",
        3 => "混合订单",
    ),
    
    //订单支付状态
    'ORDER_PAY_STATUS'=>array(
        1 => "待支付",
        2 => "已支付",
        3 => "处理中",
        4 => "部分退款",
        5 => "全额退款",
        6 => "退款申请中",
        7 => "退款中",
        8 => "已退款",
    ),
    
    //订单来源
    'ORDER_SOURCE'=>array(
        1 => "APP端",
        2 => "WAP端",
        3 => "PC端",
    ),
    
    //订单凭证审核状态
    'ORDER_EXTEND_STATUS'=>array(
        1 => "待确认",
        2 => "审核成功",
        3 => "审核失败",
    ),
    
    //发票申请单状态
    'USER_INVOICE_ORDER'=>array(
        1 => '待确认',
        2 => '已作废',
        3 => '已确认',
        4 => '已完成',
    ),
    
    //发票申请单物流状态
    'INVOICE_ORDER_SHIPPING_STATUS'=>array(
        1 => "未发货",
        2 => "已发货",
        3 => "部分发货",
        4 => "部分退货",
        5 => "已退货",
    ),
    
    //物流状态
    'SHIPPING_STATUS'=>array(
        1 => "未发货",
        2 => "已发货",
        3 => "部分发货",
        4 => "部分退货",
        5 => "已退货",
    ),
    
    //商品属性
    'CATEGORY_ATTRIBUTE'=>array(
        1 => "显示属性",
        2 => "价格属性",
    ),
    
    //积分类型
    'POINTS_TYPE'=>array(
        1 => "购买商品获取积分",
        2 => "后台充值获得积分",
        3 => "购买商品抵扣积分",
    ),
    
    //系统分类
    'SYSTEM_CATE'=>array(
        1 => "商品",
        2 => "其他",
    ),
    
    //发票类型
    'INVOICE_TYPE'=>array(
        0 => "无发票",
        1 => "普票",
        2 => "专票",
    ),
    
    //会员类型
    'USER_VIP_TYPE'=>array(
        1 => "个人会员",
        2 => "公司会员"
    ),
    
    //标签类型
    'TAGS_TYPE'=>array(
        1 => "商品",
        2 => "热门搜索",
    ),
    
    //寄件物流类型
    'SHIPMENTS_TYPE'=>array(
        1 => "商品",
        2 => "发票",
    ),
    
    //商家认证
    'BUSINESS_IDENTITY_AUTH'=>array(
        1 => "营业执照",
        2 => "开户证明",
        3 => "经营场地",
    ),
    
    //订单凭证审核状态
    'BUSINESS_AUTH_STATUS'=>array(
        1 => "待审核",
        2 => "审核成功",
        3 => "审核失败",
    ),
    
    //商家结算申请单
    'BUSINESS_SETTLEMENT_STATUS'=>array(
        1 => '待确认',
        2 => '已作废',
        3 => '已确认',
        4 => '已完成',
    ),
    
    //订单销售类型
    'ORDER_SALES_TYPE'=>array(
        1 => "自营订单",
        2 => "商家订单",
    ),
    
    //积分兑换订单状态
    'POINTS_ORDER_STATUS'=>array(
        1 => '待确认',
        2 => '已作废',
        3 => '已确认',
        4 => '已完成',
    ),
    
    //积分兑换订单发货状态
    'POINTS_ORDER_SHIPPING_STATUS'=>array(
        1 => "未发货",
        2 => "已发货",
        3 => "部分发货",
        4 => "部分退货",
        5 => "已退货",
    ),
    
    //合同状态
    'CONTRACT_ORDER_STATUS'=>array(
        1 => "待执行",
        2 => "执行中",
        3 => "已完成",
    ),
    
    //商品是否下架
    'PRODUCT_IS_SALE'=>array(
        1 => '上架',
        2 => '下架',
    ),
    
    //商品是否热门
    'PRODUCT_IS_HOT'=>array(
        1 => '是',
        2 => '否',
    ),
    
    //商品是否新品
    'PRODUCT_IS_NWE'=>array(
        1 => '是',
        2 => '否',
    ),
    
    //商品是否精品
    'PRODUCT_IS_BEST'=>array(
        1 => '是',
        2 => '否',
    ),
    
    //会员级别
    'USER_LEVEL'=>array(
        1 => '注册',
        2 => '铜牌',
        3 => '银牌',
        4 => '金牌',
        5 => '钻石',
        6 => '皇冠',
    ),
    
    //会员认证状态
    'USER_IDENTITY_STATUS'=>array(
        1 => '未认证',
        2 => '待认证',
        3 => '认证通过',
        4 => '认证失败',
    ),
    
);

?>