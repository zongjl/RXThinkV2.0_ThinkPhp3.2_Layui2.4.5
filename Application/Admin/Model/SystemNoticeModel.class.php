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
 * 通知公告-模型
 * 
 * @author 牧羊人
 * @date 2018-12-03
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class SystemNoticeModel extends CBaseModel {
    function __construct() {
        parent::__construct('system_notice');
    }

    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-12-03
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //获取栏目
            if($info['cate_id']) {
                $cateMod = M("itemCate");
                $cateInfo = $cateMod->getInfo($info['cate_id']);
                $info['cate_name'] = $cateInfo['name'];
            }
            
            //封面
            if($info['cover']) {
                $info['cover_url'] = IMG_URL . $info['cover'];
            }

            
            //图集
            if($info['imgs']) {
                $imgsList =  unserialize($info['imgs']);
                foreach ($imgsList as &$row) {
                    $row = IMG_URL . $row;
                }
                $info['imgsList'] = $imgsList;
            }

        }
        return $info;
    }
    
}