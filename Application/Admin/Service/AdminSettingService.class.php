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
 * 系统设置-服务类
 * 
 * @author 牧羊人
 * @date 2018-07-18
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\AdminSettingModel;
class AdminSettingService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminSettingModel();
    }
}