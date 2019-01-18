<?php
// +----------------------------------------------------------------------
// | RXThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2019 http://rxthink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

/**
 * 优惠券-服务类
 * 
 * @author 牧羊人
 * @date 2018-11-28
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\CouponModel;
class CouponService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new CouponModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-11-28
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //标题
        $title = trim($param['title']);
        if($title) {
            $map['title'] = array('like',"%{$title}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     *
     * @author zongjl
     * @date 2019-01-14
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
    
        //满减金额以分为单位存储
        $data['amount'] = $data['amount']*100;
        
        //优惠券面值
        $data['face_value'] = $data['face_value']*100;
    
        return parent::edit($data);
    }
    
}