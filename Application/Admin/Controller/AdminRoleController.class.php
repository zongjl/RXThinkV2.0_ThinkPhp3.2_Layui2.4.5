<?php

/**
 * 角色管理-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Service\AdminRoleService;
use Admin\Model\AdminRoleModel;
class AdminRoleController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->service = new AdminRoleService();
        $this->mod = new AdminRoleModel();
    }
    
    /**
     * 删除
     * 
     * @author zongjl
     * @date 2018-08-16
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::drop()
     */
    function drop() {
        if(IS_POST) {
            $id = I('post.id');
            $info = $this->mod->getInfo($id);
            if($info['auth']) {
                $this->ajaxReturn(message("当前角色已经配置了权限，无法删除",false));
                return;
            }
            parent::drop();
        }
    }
    
}