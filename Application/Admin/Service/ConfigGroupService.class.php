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
 * 配置分组-服务类
 * 
 * @author 牧羊人
 * @date 2018-09-22
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ConfigGroupModel;
class ConfigGroupService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ConfigGroupModel();
    }
    
    /**
     * 获取数据列表
     *
     * @author 牧羊人
     * @date 2018-11-22
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
    
        $map = [];
    
        //查询条件
        $name = trim($param['name']);
        if($name) {
            $map['name'] = array('like',"%{$name}%");
        }
    
        return parent::getList($map);
    }
    
}