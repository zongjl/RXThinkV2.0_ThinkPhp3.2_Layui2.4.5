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
 * 职位管理-模型
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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