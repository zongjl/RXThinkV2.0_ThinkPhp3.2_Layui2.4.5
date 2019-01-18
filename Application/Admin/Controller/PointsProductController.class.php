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
 * 积分商城-控制器
 * 
 * @author 牧羊人
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\PointsProductModel;
use Admin\Service\PointsProductService;
class PointsProductController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new PointsProductModel();
        $this->service = new PointsProductService();
    }
}