<?php

/**
 * 广告-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\AdModel;
use Admin\Model\AdSortModel;
use Admin\Service\AdService;
class AdController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdModel();
        $this->service = new AdService();
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
        //获取广告位
        $adSortMod = new AdSortModel();
        $sortList = $adSortMod->where(['status'=>1,'mark'=>1])->select();
        $this->assign('sortList',$sortList);
        
        parent::edit([
            't_type'=>1,
            'type'=>1,
        ]);
    }
    
}