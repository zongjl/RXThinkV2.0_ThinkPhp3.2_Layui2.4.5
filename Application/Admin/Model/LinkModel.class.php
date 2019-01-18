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
 * 友链-模型
 * 
 * @author 牧羊人
 * @date 2018-07-17
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class LinkModel extends CBaseModel {
    function __construct() {
        parent::__construct('link');
    }
    
    //自动验证
    protected $_validate = array(
        array('name', 'require', '友链名称不能为空！', self::EXISTS_VALIDATE, '', 3),
        array('name', '1,50', '友链名称长度不合法', self::EXISTS_VALIDATE, 'length',3),
    );
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //LOGO
            if($info['logo']) {
                $info['logo_url'] = IMG_URL . $info['logo'];
            }
            
            //使用平台
            if($info['platform']) {
                $info['platform_name'] = C('PLATFORM_TYPE')[$info['platform']];
            }
            
            //友链类型
            if($info['t_type']) {
                $info['t_type_name'] = C('LINK_TYPE')[$info['t_type']];
            }
            
        }
        return $info;
    }
    
}