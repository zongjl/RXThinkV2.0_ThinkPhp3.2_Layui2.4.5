<?php

/**
 * 组织机构-模型
 * 
 * @author zongjl
 * @date 2018-07-23
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class AdminOrgModel extends CBaseModel {
    function __construct() {
        parent::__construct('admin_org');
    }
    
    //自动验证
    protected $_validate = array(
//         array('name','','组织机构名称已经存在！',self::EXISTS_VALIDATE,'unique',3),
        array('name', '1,50', '组织机构名称长度不合法', self::EXISTS_VALIDATE, 'length',3),
//         array('email', '', '邮箱已经存在！', 0, 'unique', 3),
        array('email', 'email', '邮箱不合法！', 0, '', 3),
    );
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-07-24
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
            
            //获取所属城市
            if($info['district_id']) {
                $cityMod = new CityModel();
                $cityName = $cityMod->getCityName($info['district_id'],">>",true);
                $info['city_name'] = $cityName;
            }
            
        }
        return $info;
    }
    
}