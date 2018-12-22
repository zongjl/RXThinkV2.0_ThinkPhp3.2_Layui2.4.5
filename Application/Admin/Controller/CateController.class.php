<?php

/**
 * 分类-控制器
 * 
 * @author zongjl
 * @date 2018-10-09
 */
namespace Admin\Controller;
use Admin\Model\CateModel;
use Admin\Service\CateService;
class CateController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new CateModel();
        $this->service = new CateService();
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-10-09
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::edit()
     */
    function edit() {
        $pid = I("get.pid",0);
        if($pid) {
            $cateInfo = M("category")->find($pid);
            $this->assign('parent_name',$cateInfo['name']);
        }
        parent::edit([
            'parent_id'=>$pid,
            'parent_name'=>$cateInfo['name'],
        ]);
    }
    
    /**
     * 获取子级【挂件专用】
     *
     * @author zongjl
     * @date 2018-11-02
     */
    function getChilds() {
        if(IS_POST) {
            $id = I("post.p_cate_id",0);
            $list = $this->mod->getChilds($id);
            $this->ajaxReturn(message('获取成功',true,$list));
        }
    }
    
}