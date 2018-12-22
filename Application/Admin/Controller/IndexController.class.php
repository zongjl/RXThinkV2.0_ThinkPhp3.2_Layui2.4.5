<?php

/**
 * 后台主页-控制器
 * 
 * @author zongjl
 * @date 2018-07-18
 */
namespace Admin\Controller;
class IndexController extends BaseController {
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 首页入口
     * 
     * @author zongjl
     * @date 2018-06-21
     */
    public function index() {
        $this->display();
    }
    
    
    /**
     * 后台主页入口
     * 
     * @author zongjl
     * @date 2018-07-09
     */
    public function main() {
        $this->display();
    }
    
}