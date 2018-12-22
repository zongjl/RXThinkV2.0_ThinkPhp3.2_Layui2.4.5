<?php

/**
 * 商品-模型
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ProductModel extends CBaseModel {
    function __construct() {
        parent::__construct('product');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-16
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //商品封面
            if($info['cover']) {
                $info['cover_url'] = IMG_URL . $info['cover'];
            }
            
            //商品内容
            if($info['content']) {
                while(strstr($info['content'],"[IMG_URL]")){
                    $info['content'] = str_replace("[IMG_URL]", IMG_URL, $info['content']);
                }
            }
            
            //标签
            if($info['tags_id']) {
                $tagsMod = new TagsModel();
                $tagsInfo = $tagsMod->getInfo($info['tags_id']);
                $info['tags_name'] = $tagsInfo['name'];
            }
            
            //品牌
            if($info['brand_id']) {
                $brandMod = new BrandModel();
                $brandInfo = $brandMod->getInfo($info['brand_id']);
                $info['brand_name'] = $brandInfo['name'];
            }
            
            //商品价格
            if($info['price']) {
                $info['format_price'] = \Zeus::formatToYuan($info['price']);
            }
            
            //商品图集
            if($info['image']) {
                $imgsList =  unserialize($info['image']);
                foreach ($imgsList as &$row) {
                    $row = IMG_URL . $row;
                }
                $info['imageList'] = $imgsList;
            }
            
            //商品上下架
            $info['is_sale_name'] = C('PRODUCT_IS_SALE')[$info['is_sale']];
            
            //商品是否热门
            $info['is_hot_name'] = C('PRODUCT_IS_HOT')[$info['is_hot']];
            
            //商品是否新品
            $info['is_new_name'] = C('PRODUCT_IS_NWE')[$info['is_new']];
            
            //商品是否精品
            $info['is_best_name'] = C('PRODUCT_IS_BEST')[$info['is_best']];
            
        }
        return $info;
    }
    
}