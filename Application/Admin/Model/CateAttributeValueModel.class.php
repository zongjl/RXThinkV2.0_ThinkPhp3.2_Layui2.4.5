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
 * 属性值-模型
 * 
 * @author 牧羊人
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class CateAttributeValueModel extends CBaseModel {
    function __construct() {
        parent::__construct('category_attribute_value');
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
            
            //分类属性
            if($info['category_attribute_id']) {
                $cateAttrMod = new CateAttributeModel();
                $cateAttrInfo = $cateAttrMod->getInfo($info['category_attribute_id']);
                $info['category_attribute_name'] = $cateAttrInfo['name'];
                $info['category_name'] = $cateAttrInfo['category_name'];
            }
            
        }
        return $info;
    }
    
}