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
 * 站点栏目-服务类
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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
     * @author 牧羊人
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