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
 * 部门-控制器
 * 
 * @author 牧羊人
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\AdminDepModel;
use Admin\Service\AdminDepService;
class AdminDepController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminDepModel();
        $this->service = new AdminDepService();

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
        $pid = I("get.pid",0);
        if($pid) {
            $pInfo = $this->mod->getInfo($pid);
        }
        parent::edit([
            'parent_id'=>$pid,
            'parent_name'=>$pInfo['name'],
        ]);
    }
    
}