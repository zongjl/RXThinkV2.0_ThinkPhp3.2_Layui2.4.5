<?php

/**
 * 职位管理-模型
 * 
 * @author zongjl
 * @date 2018-07-13
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class AdminPositionModel extends CBaseModel {
    function __construct() {
        parent::__construct("admin_position");
    }
    
    //自动验证
    protected $_validate = array(
        array('name', 'require', '职位名称不能为空！', self::EXISTS_VALIDATE, '', 3),
        array('name', '1,30', '职位名称长度不合法', self::EXISTS_VALIDATE, 'length',3),
    );
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-07-13
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            //TODO...
        }
        return $info;
    }
    
}