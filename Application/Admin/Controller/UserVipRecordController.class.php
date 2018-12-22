<?php

/**
 * 会员升级记录-控制器
 * 
 * @author zongjl
 * @date 2018-08-25
 */
namespace Admin\Controller;
use Admin\Model\UserVipRecordModel;
use Admin\Service\UserVipRecordService;
class UserVipRecordController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserVipRecordModel();
        $this->service = new UserVipRecordService();
    }
}