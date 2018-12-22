<?php

/**
 * 商品-服务类
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ProductModel;
use Admin\Model\ProductAttributeModel;
use Admin\Model\CateAttributeModel;
use Admin\Model\CateAttributeValueModel;
use Admin\Model\ProductSkuModel;
use Admin\Model\ProductImageModel;
class ProductService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ProductModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //商品名称
        $name = trim($param['name']);
        if($name) {
            $map['name'] = array('like',"%{$name}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['is_sale'] = (isset($data['is_sale']) && $data['is_sale']=="on") ? 1 : 2;
        $data['is_hot'] = (isset($data['is_hot']) && $data['is_hot']=="on") ? 1 : 2;
        $data['is_new'] = (isset($data['is_new']) && $data['is_new']=="on") ? 1 : 2;
        $data['is_best'] = (isset($data['is_best']) && $data['is_best']=="on") ? 1 : 2;
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        
        //商品单价
        $data['price'] = $data['price']*100;
        
        //商品分类
        $cateList = $data['category_id'];
        if(!is_array($cateList)) {
            return message('请选择商品分类',false);
        }
        $cateStr = implode(',', array_keys($cateList));
        $data['category_id'] = $cateStr;
        
        //商品封面
        $cover = trim($data['cover']);
        if(strpos($cover, "temp")) {
            $data['cover'] = \Zeus::saveImage($cover, 'product');
        }
        
        //图集处理
        $imgsList = trim($data['image']);
        if($imgsList) {
            $imgArr = explode(',', $imgsList);
            foreach ($imgArr as $key => $val) {
                if(strpos($val, "temp")) {
                    //新上传图片
                    $imgStr[] = \Zeus::saveImage($val, 'product');
                }else{
                    //过滤已上传图片
                    $imgStr[] = str_replace(IMG_URL, "", $val);
                }
            }
        }
        $data['image'] = serialize($imgStr);
        
        //商品详情
        \Zeus::saveImageByContent($data['content'],$data['name'],"product");
        
        return parent::edit($data);
    }
    
    /**
     * 设置产品规格状态
     * 
     * @author zongjl
     * @date 2018-10-25
     */
    function setIsSpec() {
        $data = I('post.', '', 'trim');
        $productId = (int)$data['product_id'];
        $is_spec = (int)$data['is_spec'];
        if(!$productId) {
            return message('商品ID不能为空',false);
        }
        if(!$is_spec) {
            return message('规格状态不能为空',false);
        }
        
        $data = [
            'id'=>$productId,
            'is_spec'=>$is_spec,
        ];
        $rowId = $this->mod->edit($data);
        if($rowId) {
            return message();
        }
        return message('规格状态设置失败',false);
        
    }
    
    /**
     * 产品规格管理
     * 
     * @author zongjl
     * @date 2018-10-24
     */
    function productModel() {
        $data = I('post.', '', 'trim');
        $productId = (int)$data['product_id'];
        $result = json_decode($data['result'],true);
        
        //商品属性处理
        $cateAttrMod = new CateAttributeModel();
        $cateAttrValueMod = new CateAttributeValueModel();
        $productAttrMod = new ProductAttributeModel();
        $productSkuMod = new ProductSkuModel();
        
        //开启事务
        $this->mod->startTrans();
        
        //删除商品属性
        $attrList = $productAttrMod->where([
            'product_id'=>$productId,
            'mark'=>1,
        ])->select();
        if(is_array($attrList)) {
            foreach ($attrList as $attr) {
                if(!$productAttrMod->drop($attr['id'])) {
                    //事务回滚
                    $this->mod->rollback();
                    return message("商品属性删除失败",false);
                    break;
                }
            }
        }
        
        //删除商品SKU
        $skuList = $productSkuMod->where([
            'product_id'=>$productId,
            'mark'=>1,
        ])->select();
        if(is_array($skuList)) {
            foreach ($skuList as $sku) {
                if(!$productSkuMod->drop($sku['id'])) {
                    //事务回滚
                    $this->mod->rollback();
                    return message("商品SKU删除失败",false);
                    break;
                }
            }
        }
        
        //SKU数据处理
        if(is_array($result)) {
            foreach ($result as $val) {
                $itemArr = [];
                foreach ($val['ids'] as $vt) {
                    foreach ($vt as $k=>$v) {
                        
                        $item = [
                            'product_id'=>$productId,
                            'category_attribute_id'=>$k,
                            'category_attribute_value_id'=>$v,
                        ];
                        $attrInfo = $productAttrMod->where($item)->find();
                        if(!$attrInfo) {
                            $cateAttrInfo = $cateAttrMod->getInfo($k);
                            $cateAttrValueInfo = $cateAttrValueMod->getInfo($v);
                            $item['attr_name'] = $cateAttrInfo['name'];
                            $item['attr_value'] = $cateAttrValueInfo['attribute_value'];
                        }else{
                            $item['id'] = $attrInfo['id'];
                        }
                        $item['mark'] = 1;
                        $attributeId = $productAttrMod->edit($item);
                        if(!$attributeId) {
                            //事务回滚
                            $this->mod->rollback();
                            return message("商品属性添加失败",false);
                            break;
                        }
                        $itemArr[] = $attributeId;
                        
                    }
                }
                
                //更新SKU
                $skuInfo = $productSkuMod->where([
                    'product_id'=>$productId,
                    'product_attr_ids'=>implode('_', $itemArr),
                ])->find();
                $data = [
                    'id'=>$skuInfo['id'],
                    'product_id'=>$productId,
                    'product_attr_ids'=>implode('_', $itemArr),
                    'price'=>$val['price']*100,
                    'stock'=>$val['stock'],
                    'is_default'=>$val['is_default'],
                    'mark'=>1,
                ];
                $res = $productSkuMod->edit($data);
                if(!$res) {
                    //事务回滚
                    $this->mod->rollback();
                    return message("商品SKU添加失败",false);
                }
            }
        }
        
        //提交事务
        $this->mod->commit();
        
        return message("商品规格更新成功",true);
    }
    
    /**
     * 获取产品SKU列表
     * 
     * @author zongjl
     * @date 2018-10-25
     */
    function getSkuList($productId) {
        $productAttrMod = new ProductAttributeModel();
        $productSkuMod = new ProductSkuModel();
        $result = $productSkuMod->where([
            'product_id'=>$productId,
            'mark'=>1,
        ])->order("id ASC")->select();
        $list = [];
        if(is_array($result)) {
            $data = [];
            foreach ($result as $val) {
                $cateArr = explode('_', $val['product_attr_ids']);
                $itemArr = [];
                foreach ($cateArr as $vt) {
                    $attrInfo = $productAttrMod->getInfo($vt);
                    $itemArr[] = [
                        $attrInfo['category_attribute_id']=>$attrInfo['category_attribute_value_id'],
                    ];
                }
                
                $data = [
                    'ids'=>$itemArr,
                    'id'=>$val['id'],
                    'price'=>\Zeus::formatToYuan($val['price']),
                    'stock'=>$val['stock'],
                    'sku'=>0,
                ];
                $list[] = $data;
            }
        }
        return $list;
    }
    
    /**
     * SKU图集
     * 
     * @author zongjl
     * @date 2018-11-01
     */
    function skuImgs() {
        $data = I('post.', '', 'trim');
        $sku_id = (int)$data['sku_id'];
        
        //获取商品ID
        $skuMod = new ProductSkuModel();
        $skuInfo = $skuMod->getInfo($sku_id);
        if(!$skuInfo) {
            return message('商品SKU信息不存在',false);
        }
        $data['product_id'] = $skuInfo['product_id'];
        
        //SKU图集处理
        $imgsList = trim($data['imgs']);
        if($imgsList) {
            $imgArr = explode(',', $imgsList);
            foreach ($imgArr as $key => $val) {
                if(strpos($val, "temp")) {
                    //新上传图片
                    $imgStr[] = \Zeus::saveImage($val, 'product');
                }else{
                    //过滤已上传图片
                    $imgStr[] = str_replace(IMG_URL, "", $val);
                }
            }
        }
        $data['imgs'] = serialize($imgStr);
        
        $productImageMod = new ProductImageModel();
        $error = '';
        $result = $productImageMod->edit($data,$error);
        if($result) {
            return message();
        }
        return message($error,false);
        
    }
    
}