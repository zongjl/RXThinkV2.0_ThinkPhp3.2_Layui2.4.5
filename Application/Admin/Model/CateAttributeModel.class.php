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
 * 分类属性-模型
 * 
 * @author 牧羊人
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class CateAttributeModel extends CBaseModel {
    function __construct() {
        parent::__construct('category_attribute');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-10-16
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {

            //属性类型
            $info['type_name'] = C("CATEGORY_ATTRIBUTE")[$info['type']];
            
            //所属分类
            if($info['category_id']) {
                $cateMod = new CateModel();
                $cateInfo = $cateMod->getInfo($info['category_id']);
                $info['category_name'] = $cateInfo['name'];
            }
            
        }
        return $info;
    }
    
}