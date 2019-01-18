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
 * 广告-服务类
 * 
 * @author 牧羊人
 * @date 2018-07-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\AdModel;
class AdService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new AdModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //查询条件
        $title = trim($param['title']);
        if($title) {
            $map['title'] = array('like',"%{$title}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     * 
     * @author 牧羊人
     * @date 2018-07-19
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $id = (int)$data['id'];
        $cover = trim($data['cover']);
        $type = (int)$data['type'];
        $t_type = (int)$data['t_type'];
        $type_id = (int)$data['type_id'];

        //头像验证
        if(!$id && ($t_type!=2 && !$cover)) {
            return message('请上传广告封面',false);
        }
        
        if($t_type==4 && (!$type || !$type_id)) {
            return message('请选择推荐的类型',false);
        }
        
        //数据处理
        if(strpos($cover, "temp")) {
            $data['cover'] = \Zeus::saveImage($cover, 'ad');
        }
        if($t_type==4) {
            $data['type'] = $type;
            $data['type_id'] = $type_id;
        }else{
            $data['type'] = 0;
            $data['type_id'] = 0;
        }
        return parent::edit($data);
        
    }
    
}