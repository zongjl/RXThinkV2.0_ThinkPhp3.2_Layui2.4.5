<?php

/**
 * 部门选择-挂件
 * 
 * @author zongjl
 * @date 2018-07-19
 */
namespace Admin\Widget;
use Think\Controller;
use Admin\Model\AdminDepModel;
class AdminDepWidget extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 部门选择
     * 
     * @author zongjl
     * @date 2018-07-19
     */
    function select($idStr,$selectId) {
        $adminDepMod = new AdminDepModel();
        $adminDepList = $adminDepMod->getChilds(0,1);
        $this->assign('idStr',$idStr);
        $this->assign("selectId",$selectId);
        $this->assign('adminDepList',$adminDepList);
        $this->display("AdminDep:adminDep.select");
    }
    
}