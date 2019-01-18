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
 * 组织机构-控制器
 * 
 * @author 牧羊人
 * @date 2018-07-23
 */
namespace Admin\Controller;
use Admin\Model\AdminOrgModel;
use Admin\Service\AdminOrgService;
class AdminOrgController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminOrgModel();
        $this->service = new AdminOrgService();
    }
    
    /**
     * 删除
     *
     * @author 牧羊人
     * @date 2018-08-29
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::drop()
     */
    function drop() {
        if(IS_POST) {
            $id = I('post.id');
            $count = M("admin")->where(['organization_id'=>$id])->count();
            if($count) {
                $this->ajaxReturn(message("当前组织机构已经在使用中，无法删除",false));
                return;
            }
            parent::drop();
        }
    }
    
}