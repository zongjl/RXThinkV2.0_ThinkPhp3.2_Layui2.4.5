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
 * 系统设置-控制器
 * 
 * @author 牧羊人
 * @date 2018-07-18
 */
namespace Admin\Controller;
use Admin\Model\AdminSettingModel;
use Admin\Service\AdminSettingService;
class AdminSettingController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminSettingModel();
        $this->service = new AdminSettingService();
    }
}