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
 * 友链-服务类
 * 
 * @author 牧羊人
 * @date 2018-07-17 
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\LinkModel;
class LinkService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new LinkModel();
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
        $name = trim($param['name']);
        if($name) {
            $map['name'] = array('like',"%{$name}%");
        }
        
        return parent::getList($map);
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
        $data['is_show'] = (isset($data['is_show']) && $data['is_show']=="on") ? 1 : 2;
        $logo = trim($data['logo']);
        $t_type = (int)$data['t_type'];
        
        //字段验证
        if(!$data['id'] && $t_type==2 && !$logo) {
            return message('请上传图片',false);
        }
        if($t_type==1) {
            //文字
            $data['logo'] = '';
        }
        
        //图片处理
        if(strpos($logo, "temp")) {
            $data['logo'] = \Zeus::saveImage($logo,'link');
        }
        
        return parent::edit($data);
    }
    
}