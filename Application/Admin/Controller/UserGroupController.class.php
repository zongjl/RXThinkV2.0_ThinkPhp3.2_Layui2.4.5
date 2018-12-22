<?php

/**
 * 会员分组-控制器
 * 
 * @author zongjl
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