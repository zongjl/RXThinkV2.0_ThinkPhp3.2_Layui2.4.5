<?php

/**
 * 会员分组-服务类
 * 
 * @author zongjl
 * @date 2018-08-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\UserGroupModel;
class UserGroupService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new UserGroupModel();
    }
    
}