<?php

/**
 * 站点-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Model\ItemModel;
use Admin\Service\ItemService;
class ItemController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ItemModel();
        $this->service = new ItemService();
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
            $count = M("ItemCate")->where(["item_id"=>$id,'mark'=>1])->count();
            if($count>0) {
                $this->ajaxReturn(message("当前站点已经在使用,无法删除",false));
                return;
            }
            parent::drop();
        }
    }
    
}