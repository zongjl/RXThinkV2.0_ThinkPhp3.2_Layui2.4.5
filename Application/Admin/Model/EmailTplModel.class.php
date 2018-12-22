<?php

/**
 * 邮件模板-模型
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class EmailTplModel extends CBaseModel {
    function __construct() {
        parent::__construct('template_email');
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
     * @author zongjl
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