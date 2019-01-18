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
 * 广告-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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