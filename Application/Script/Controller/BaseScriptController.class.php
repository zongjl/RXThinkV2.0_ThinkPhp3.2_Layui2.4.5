<?php

/**
 * 脚本基类
 * 
 * @author zongjl
 * @date 2018-09-06
 */
namespace Script\Controller;
use Think\Controller;
class BaseScriptController extends Controller {
    //模型、服务
    protected $mod,$service;
    function __construct() {
        parent::__construct();
    }
}