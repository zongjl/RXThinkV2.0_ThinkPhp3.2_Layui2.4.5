<?php

/**
 * 属性值-控制器
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\CateAttributeValueModel;
use Admin\Service\CateAttributeValueService;
class CateAttributeValueController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new CateAttributeValueModel();
        $this->service = new CateAttributeValueService();
    }
}