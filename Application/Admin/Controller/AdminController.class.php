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
 * 人员管理-控制器
 * 
 * @author 牧羊人
 * @date 2018-07-10
 */
namespace Admin\Controller;
use Admin\Service\AdminService;
use Admin\Model\AdminModel;
class AdminController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminModel();
        $this->service = new AdminService();
    }
    
    /**
     * 设置人员角色
     * 
     * @author 牧羊人
     * @date 2018-07-19
     */
    function setRole() {
        if(IS_POST) {
            $message = $this->service->setRole();
            $this->ajaxReturn($message);
            return;
        }
        $adminId = I("get.admin_id",0);
        $this->assign('admin_id',$adminId);
        
        //获取人员角色ID集合
        $roleIds = M("adminRmr")->where(['admin_id'=>$adminId,'mark'=>1])->getField('role_id',true);
    
        //获取全部角色
        $list = M("adminRole")->where(['status'=>1,'mark'=>1])->select();
        if($list) {
            foreach ($list as &$val) {
                if(in_array($val['id'], $roleIds)) {
                    $val['selected'] = 1;
                }
            }
        }
        $this->assign('list',$list);
        
        $this->render("admin.role.html");
    }
    
    /**
     * 重置密码
     *
     * @author 牧羊人
     * @date 2018-07-23
     */
    function resetPwd() {
        if(IS_POST) {
            $message = $this->service->resetPwd();
            $this->ajaxReturn($message);
            return ;
        }
        $id = I('get.id',0);
        $this->assign('id',$id);
        $this->render("admin.resetPwd.html");
    }
    
}