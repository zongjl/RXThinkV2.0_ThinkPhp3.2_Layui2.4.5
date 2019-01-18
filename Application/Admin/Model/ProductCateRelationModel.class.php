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
 * 商品类型关系-模型
 * 
 * @author 牧羊人
 * @date 2018-11-30
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ProductCateRelationModel extends CBaseModel {
    function __construct() {
        parent::__construct('product_cate_relation');
    }
    
}