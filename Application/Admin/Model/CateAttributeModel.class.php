<?php

/**
 * 分类属性-模型
 * 
 * @author zongjl
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
     * @author zongjl
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