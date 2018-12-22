<?php

/**
 * 站点栏目-服务类
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ItemCateModel;
class ItemCateService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ItemCateModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-07-20
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        $list = $this->mod->getChilds(0,0,1);
        return message("操作成功",true,$list);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-07-20
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $is_cover = (isset($data['is_cover']) && $data['is_cover']=="on") ? 1 : 2;
        $data['is_cover'] = $is_cover;
        $cover = trim($data['cover']);
        
        //封面验证
        if($is_cover==1 && !$data['id'] && !$cover) {
            return message('请上传栏目封面',false);
        }
        if($is_cover==1) {
            if(strpos($cover, "temp")) {
                $data['cover'] = \Zeus::saveImage($cover, 'itemCate');
            }
        }else if($is_cover==2){
            $data['cover'] = '';
        }
        return parent::edit($data);
        
    }
    
}