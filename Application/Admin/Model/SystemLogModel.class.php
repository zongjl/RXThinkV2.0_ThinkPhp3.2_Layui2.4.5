<?php

/**
 * 系统日志-模型
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class SystemLogModel extends CBaseModel {
    private $type;
    function __construct() {
        parent::__construct('system_log');
        
        //日志类型：1登录 2登出 3新增 4修改 5删除 6查询
        $this->type = array(
            1 => '登录',
            2 => '登出',
            3 => '新增',
            4 => '修改',
            5 => '删除',
            6 => '查询',
        );
        
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //日志类型
            if($info['type']) {
                $info['type_name'] = $this->type[$info['type']];
            }
            
            //请求时间
            if($info['start_time']) {
                $info['format_start_time'] = date('Y-m-d H:i:s',$info['start_time']);
            }
            
            //请求参数
            if($info['param']) {
                $info['format_param'] = unserialize($info['param']);
            }
            
            //返回结果
            if($info['result']) {
                $info['format_result'] = unserialize($info['result']);
            }
            
        }
        return $info;
    }
    
}