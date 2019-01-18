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
 * 网站设置-服务类
 * 
 * @author 牧羊人
 * @date 2018-09-11
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\WebSettingModel;
class WebSettingService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new WebSettingModel();
    }
}