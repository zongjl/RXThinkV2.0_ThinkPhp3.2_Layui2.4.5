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
 * 配置-控制器
 * 
 * @author 牧羊人
 * @date 2018-09-22
 */
namespace Admin\Controller;
use Admin\Model\ConfigModel;
use Admin\Service\ConfigService;
class ConfigController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ConfigModel();
        $this->service = new ConfigService();
    }
}