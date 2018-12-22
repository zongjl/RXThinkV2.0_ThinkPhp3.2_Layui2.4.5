<?php

/**
 * 分类属性-控制器
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\CateAttributeModel;
use Admin\Service\CateAttributeService;
class CateAttributeController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new CateAttributeModel();
        $this->service = new CateAttributeService();
    }
}