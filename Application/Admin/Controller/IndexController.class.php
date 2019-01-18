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
 * 后台主页-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
     * @date 2018-06-21
     */
    public function index() {
        $this->display();
    }
    
    
    /**
     * 后台主页入口
     * 
     * @author 牧羊人
     * @date 2018-07-09
     */
    public function main() {
        $this->display();
    }
    
    /**
     * 消息查阅
     */
    public function msg() {
        $this->display();
    }
    
}