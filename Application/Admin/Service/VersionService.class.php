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
 * 版本管理-服务类
 * 
 * @author 牧羊人
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\VersionModel;
class VersionService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new VersionModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
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
    
    /**
     * 添加或编辑
     * 
     * @author 牧羊人
     * @date 2018-07-20
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['is_update'] = (isset($data['is_update']) && $data['is_update']=="on") ? 1 : 2;
        $data['is_force'] = (isset($data['is_force']) && $data['is_force']=="on") ? 1 : 2;
        
        return parent::edit($data);
    }
    
}