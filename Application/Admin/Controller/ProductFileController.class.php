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
 * 商品附件-控制器
 * 
 * @author 牧羊人
 * @date 2018-12-21
 */
namespace Admin\Controller;
use Admin\Model\ProductFileModel;
use Admin\Service\ProductFileService;
class ProductFileController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ProductFileModel();
        $this->service = new ProductFileService();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-12-21
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        parent::index([
            'product_id'=>(int)$_GET['product_id'],
        ]);
    }
    
    /**
     * 添加或编辑
     * 
     * @author 牧羊人
     * @date 2018-12-21
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::edit()
     */
    function edit() {
        parent::edit([
            'product_id'=>$_GET['product_id'],
        ]);
    }

}