<?php

/**
 * 广告描述-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Model\AdSortModel;
use Admin\Service\AdSortService;
class AdSortController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdSortModel();
        $this->service = new AdSortService();
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
            $count = M("Ad")->where(["ad_sort_id"=>$id,'mark'=>1])->count();
            if($count>0) {
                $this->ajaxReturn(message("当前广告位已经在使用,无法删除",false));
                return;
            }
            parent::drop();
        }
    }
    
}