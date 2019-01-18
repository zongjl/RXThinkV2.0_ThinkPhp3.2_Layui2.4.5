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
 *通知公告-服务类
 *
 * @author 牧羊人
 * @date 2018-12-04
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\SystemNoticeModel;
class SystemNoticeService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new SystemNoticeModel();
    }

    /**
     * 获取数据列表
     *
     * @author 牧羊人
     * @date 2018-12-04
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        $param = I("request.");

        $map = [];
        //查询条件
        $keywords = trim($param['keywords']);
        if($keywords) {
            $map['title'] = array('like',"%{$keywords}%");
        }
        return parent::getList($map);
    }

    /**
     * 添加或编辑
     *
     * @author 牧羊人
     * @date 2018-12-04
     */
    function edit() {
        $data = I('post.', '', 'trim');
        //内容处理
        //\Zeus::saveImageByContent($data['content'],$data['title'],"systemNotice");

        return parent::edit($data);

    }

}