<?php

/**
 * 积分-控制器
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\UserPointsRecordModel;
use Admin\Service\UserPointsRecordService;
class UserPointsRecordController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserPointsRecordModel();
        $this->service = new UserPointsRecordService();
    }
}