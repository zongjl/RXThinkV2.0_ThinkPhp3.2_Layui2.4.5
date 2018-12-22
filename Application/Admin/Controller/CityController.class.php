<?php

/**
 * 城市-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\CityModel;
use Admin\Service\CityService;
class CityController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new CityModel();
        $this->service = new CityService();
    }
    
    /**
     * 添加或编辑
     *
     * @author zongjl
     * @date 2018-07-16
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::edit()
     */
    function edit() {
        $pid = I("get.pid",0);
        if($pid) {
            $cityInfo = M("city")->find($pid);
            $this->assign('parent_name',$cityInfo['name']);
        }
        parent::edit([
            'parent_id'=>$pid,
            'parent_name'=>$cityInfo['name'],
        ]);
    }
    
    /**
     * 获取子级【挂件专用】
     * 
     * @author zongjl
     * @date 2018-07-19
     */
    function getChilds() {
        if(IS_POST) {
            $id = I("post.id",0);
            $list = $this->mod->getChilds($id);
            $this->ajaxReturn(message('获取成功',true,$list));
        }
    }
    
}