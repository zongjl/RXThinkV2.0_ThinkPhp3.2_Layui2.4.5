<?php

/**
 * 会员分组-模型
 * 
 * @author zongjl
 * @date 2018-08-17
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class UserGroupModel extends CBaseModel {
    function __construct() {
        parent::__construct('user_group');
    }
    
    //自动验证
    protected $_validate = array(
        array('name', 'require', '会员分组不能为空！', self::EXISTS_VALIDATE, '', 3),
        array('name', '1,30', '会员分组长度不合法', self::EXISTS_VALIDATE, 'length',3),
    );
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-08-17
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        return parent::getInfo($id,true);
    }
    
    
}