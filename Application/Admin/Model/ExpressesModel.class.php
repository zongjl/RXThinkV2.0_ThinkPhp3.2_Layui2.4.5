<?php

/**
 * 快递公司-模型
 * 
 * @author 牧羊人
 * @date 2018-10-18
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ExpressesModel extends CBaseModel {
    function __construct() {
        parent::__construct('expresses');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-10-18
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            //TODO...
        }
        return $info;
    }
    
}