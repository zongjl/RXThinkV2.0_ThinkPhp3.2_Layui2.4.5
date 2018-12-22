<?php

/**
 * 系统日志-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\SystemLogModel;
use Admin\Service\SystemLogService;
class SystemLogController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new SystemLogModel();
        $this->service = new SystemLogService();
        
    }
    
    /**
     * 查看系统日志详情
     * 
     * @author zongjl
     * @date 2018-07-26
     */
    function detail() {
        $id = I("get.id",0);
        if($id) {
            $info = $this->mod->getInfo($id);
            $this->assign('info',$info);
        }
        $this->render();
    }
    
}