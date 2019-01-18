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
 * 分类属性关系-控制器
 * 
 * @author 牧羊人
 * @date 2018-12-24
 */
namespace Admin\Controller;
use Admin\Model\CateAttributeRelationModel;
use Admin\Service\CateAttributeRelationService;
class CateAttributeRelationController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new CateAttributeRelationModel();
        $this->service = new CateAttributeRelationService();
    }
}