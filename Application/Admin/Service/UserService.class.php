<?php

/**
 * 会员-服务类
 * 
 * @author zongjl
 * @date 2018-09-08
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\UserModel;
class UserService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new UserModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-09-08
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $map['mobile'] = $mobile;
        }
        
        //类型
        $type = (int)$param['type'];
        if($type) {
            $map['type'] = $type;
        }
        
        return parent::getList($map);
    }
    
    /**
     * 设置会员状态
     * 
     * @author zongjl
     * @date 2018-09-08
     */
    function setStatus() {
        $data = I('post.', '', 'trim');
        if(!$data['id']) {
            return message('会员ID不能为空',false);
        }
        if(!$data['status']) {
            return message('会员状态不能为空',false);
        }
        return parent::edit($data);
    }
    
}