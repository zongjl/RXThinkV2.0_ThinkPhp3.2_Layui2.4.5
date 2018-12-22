<?php

/**
 * 部门-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\AdminDepModel;
use Admin\Service\AdminDepService;
class AdminDepController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminDepModel();
        $this->service = new AdminDepService();

    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::edit()
     */
    function edit() {
        $pid = I("get.pid",0);
        if($pid) {
            $pInfo = $this->mod->getInfo($pid);
        }
        parent::edit([
            'parent_id'=>$pid,
            'parent_name'=>$pInfo['name'],
        ]);
    }
    
}