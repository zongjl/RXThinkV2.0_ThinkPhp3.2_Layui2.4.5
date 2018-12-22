<?php

/**
 * 积分商城-模型
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class PointsProductModel extends CBaseModel {
    function __construct() {
        parent::__construct('points_product');
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
        $info = parent::getInfo($id);
        if($info) {
            
            //商品封面
            if($info['cover']) {
                $info['cover_url'] = IMG_URL . $info['cover'];
            }
            
            //商品内容
            if($info['content']) {
                while(strstr($info['content'],"[IMG_URL]")){
                    $info['content'] = str_replace("[IMG_URL]", IMG_URL, $info['content']);
                }
            }

        }
        return $info;
    }
    
}