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
 * 短信模型-模型
 * 
 * @author 牧羊人
 * @date 2018-07-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class SmsTplModel extends CBaseModel {
    function __construct() {
        parent::__construct('template_sms');
    }
    
    //自动验证
    protected $_validate = array(
        array('title', '1,50', '模板标题长度不合法', self::EXISTS_VALIDATE, 'length',3),
        array('content', 'require', '模板内容不能为空！', 1, '', 3),
        array('content', '1,150', '模板内容长度不合法', self::EXISTS_VALIDATE, 'length',3),
    );
    
    /**
     * 获取缓存信息
     *
     * @author 牧羊人
     * @date 2018-08-16
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