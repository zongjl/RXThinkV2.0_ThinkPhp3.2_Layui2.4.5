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
 * 站点-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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