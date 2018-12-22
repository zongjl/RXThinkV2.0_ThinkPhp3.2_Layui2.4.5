<?php

/**
 * 城市-服务类
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\CityModel;
class CityService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new CityModel();
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
        $list = $this->mod->getAll();
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
        $data['is_public'] = (isset($data['is_public']) && $data['is_public']=="on") ? 1 : 2;
        
        //获取级别
        $parentId = (int)$data['parent_id'];
        if($parentId) {
            $info = $this->mod->getInfo($data['parent_id']);
            $data['level'] = $info['level']+1;
        }
        $error = '';
        $rowId = $this->mod->edit($data,$error);
        if($rowId) {
            //重置缓存
            $this->mod->resetFuncCache("all");
            return message();
        }
        return message($error,false);
        
    }
    
}