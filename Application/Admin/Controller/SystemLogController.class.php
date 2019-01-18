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
 * 系统日志-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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