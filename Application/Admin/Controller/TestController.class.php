<?php

/**
 * 测试模块-控制器
 * 
 * @author zongjl
 * @date 2018-11-22
 */
namespace Admin\Controller;
class TestController extends BaseController {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 获取首页
     * 
     * @author zongjl
     * @date 2018-11-22
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        $this->render("test5.index");
    }
    
}