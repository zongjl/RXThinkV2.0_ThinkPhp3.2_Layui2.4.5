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
 * 职位选择-挂件
 * 
 * @author 牧羊人
 * @date 2018-07-19
 */
namespace Admin\Widget;
use Think\Controller;
use Admin\Model\AdminPositionModel;
class PositionWidget extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 选择职位
     *
     * @author 牧羊人
     * @date 2018-07-19
     */
    function select($param,$selectId) {
        $arr = explode('|', $param);
        
        //参数
        $idStr = $arr[0];
        $isV = $arr[1];
        $msg = $arr[2];
        $show_name = $arr[3];
        $show_value = $arr[4];
    
        $positionMod = new AdminPositionModel();
        $positionList = $positionMod->where(['status'=>1,'mark'=>1])->select();
    
        $this->assign('idStr',$idStr);
        $this->assign('isV',$isV);
        $this->assign('msg',$msg);
        $this->assign('show_name',$show_name);
        $this->assign('show_value',$show_value);
        $this->assign('positionList',$positionList);
        $this->assign("selectId",$selectId);
        $this->display("AdminPosition:AdminPosition.select");
    
    }
    
}