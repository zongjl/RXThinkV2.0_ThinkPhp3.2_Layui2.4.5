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
 * 标签-模型
 * 
 * @author 牧羊人
 * @date 2018-10-19
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class TagsModel extends CBaseModel {
    function __construct() {
        parent::__construct('tags');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //类型
            if($info['type']) {
                $info['type_name'] = C('TAGS_TYPE')[$info['type']];
            }
            
        }
        return $info;
    }
    
}