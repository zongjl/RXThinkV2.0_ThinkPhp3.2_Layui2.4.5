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
 * 系统基类-控制器
 * 备注：基本控制器未经允许不得擅自更改,以免对系统全局造成影响
 * 
 * @author 牧羊人
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
     * @author 牧羊人
     * @date 2018-09-30
     */
    public function _initialize() {
        //TODO...
    }
    
}