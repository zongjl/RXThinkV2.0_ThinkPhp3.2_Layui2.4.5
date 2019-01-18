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
 * 积分商城品牌-服务类
 * 
 * @author 牧羊人
 * @date 2019-01-11
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\PointsProductBrandModel;
class PointsProductBrandService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new PointsProductBrandModel();
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2019-01-11
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [
            'type'=>2,
        ];
        
        //品牌名称
        $name = trim($param['name']);
        if($name) {
            $map['name'] = array('like',"%{$name}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     * 
     * @author 牧羊人
     * @date 2019-01-11
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        
        //首字母
        $data['first_letter'] = getFirstCharter($data['name']);
        
        //LOGO处理
        $logo = trim($data['logo']);
        if(strpos($logo, "temp")) {
            $data['logo'] = \Zeus::saveImage($logo, 'brand');
        }
        
        return parent::edit($data);
    }
    
}