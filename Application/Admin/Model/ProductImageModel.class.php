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
 * 商品SKU图片
 * 
 * @author 牧羊人
 * @date 2018-11-01
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ProductImageModel extends CBaseModel {
    function __construct() {
        parent::__construct('product_image');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-11-01
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //商品图集
            if($info['imgs']) {
                $imgsList =  unserialize($info['imgs']);
                foreach ($imgsList as &$row) {
                    $row = IMG_URL . $row;
                }
                $info['imgsList'] = $imgsList;
            }
            
        }
        return $info;
    }
    
}