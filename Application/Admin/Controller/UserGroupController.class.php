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
 * 会员分组-控制器
 * 
 * @author 牧羊人
 * @date 2018-08-17
 */
namespace Admin\Controller;
use Admin\Model\UserGroupModel;
use Admin\Service\UserGroupService;
class UserGroupController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserGroupModel();
        $this->service = new UserGroupService();
    }
}