<?php

/**
 * 品牌-控制器
 * 
 * @author zongjl
 * @date 2018-10-08
 */
namespace Admin\Controller;
use Admin\Model\BrandModel;
use Admin\Service\BrandService;
class BrandController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new BrandModel();
        $this->service = new BrandService();
    }
}