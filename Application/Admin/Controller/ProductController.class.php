<?php

/**
 * 商品-控制器
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\ProductModel;
use Admin\Service\ProductService;
use Admin\Service\CateAttributeService;
use Admin\Model\ProductImageModel;
class ProductController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ProductModel();
        $this->service = new ProductService();
    }
    
    /**
     * 设置规格状态
     *
     * @author zongjl
     * @date 2018-10-25
     */
    function setIsSpec() {
        if(IS_POST) {
            $message = $this->service->setIsSpec();
            $this->ajaxReturn($message);
            return ;
        }
    }
    
    /**
     * 商品规格
     * 
     * @author zongjl
     * @date 2018-10-24
     */
    function productModel() {
        if(IS_POST) {
            $message = $this->service->productModel();
            $this->ajaxReturn($message);
            return ;
        }
        $productId = I("get.product_id",0);
        $this->assign('product_id',$productId);
        
        //获取商品属性
        $categoryAttrService = new CateAttributeService();
        $list = $categoryAttrService->getAttributeList();
        $this->assign('list',json_encode($list));
        
        //获取SKU列表
        $skuList = $this->service->getSkuList($productId);
        $this->assign('skuList',json_encode($skuList));

        $this->render();
    }
    
    /**
     * 上传SKU图集
     * 
     * @author zongjl
     * @date 2018-11-01
     */
    function skuImgs() {
        if(IS_POST) {
            $message = $this->service->skuImgs();
            $this->ajaxReturn($message);
            return;
        }
        //SKU编号
        $skuId = (int)$_GET['sku_id'];
     
        $productImageMod = new ProductImageModel();
        $result = $productImageMod->getRowByAttr([
            'sku_id'=>$skuId,
        ],'id');
        if($result) {
            $info = $productImageMod->getInfo((int)$result['id']);
        }else{
            $info['sku_id'] = $skuId;
        }
        $this->assign('info',$info);
        $this->render();
    }
    
}