<?php

/**
 * 系统基类-控制器
 * 备注：基本控制器未经允许不得擅自更改,以免对系统全局造成影响
 * 
 * @author zongjl
 * @date 2018-09-30
 */
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 初始化方法
     * 
     * @author zongjl
     * @date 2018-09-30
     */
    public function _initialize() {
        //TODO...
    }
    
}