<?php

/**
 * 发票-控制器
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Controller;
use Admin\Model\InvoiceModel;
use Admin\Service\InvoiceService;
class InvoiceController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new InvoiceModel();
        $this->service = new InvoiceService();
    }
}