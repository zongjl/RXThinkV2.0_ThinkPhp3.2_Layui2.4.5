<?php

/**
 * 城市-控制器
 * 
 * @author zongjl
 * @date 2018-11-22
 */
namespace Script\Controller;
use Script\Model\CityModel;
use Script\Service\CityService;
class CityController extends BaseScriptController {
    function __construct() {
        parent::__construct();
        $this->mod = new CityModel();
        $this->service = new CityService();
    }
    
    /**
     * 城市选择组件数据
     * 备注：将获取的数据转为JSON提供给城市选择组件使用
     * 
     * @author zongjl
     * @date 2018-11-22
     */
    function getCityList() {
        $result = $this->service->getCityList();
        print_r(json_encode($result));exit;
    }
    
}