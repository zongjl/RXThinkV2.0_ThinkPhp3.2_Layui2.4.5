<?php

/**
 * 分类-模型
 * 
 * @author zongjl
 * @date 2018-10-09
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class CateModel extends CBaseModel {
    function __construct() {
        parent::__construct('category');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-09
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //获取上级分类
            if($info['parent_id']) {
                $cateInfo = M("category")->find($info['parent_id']);
                $info['parent_name'] = $cateInfo['name'];
            }
            
            //图标
            if($info['icon']) {
                $info['icon_url'] = IMG_URL . $info['icon'];
            }
            
            //类型
            if($info['type']) {
                $info['type_name'] = C('SYSTEM_CATE')[$info['type']];
            }
            
        }
        return $info;
    }
    
    /**
     * 获取子级数据
     * 
     * @author zongjl
     * @date 2018-10-09
     */
    function getChilds($parentId,$flag=false) {
        $list = array();
        $result = $this->where([
            'parent_id' =>$parentId,
            'mark'      =>1
        ])->order("id asc")->select();
        if($result) {
            foreach ($result as $val) {
                $id = (int)$val['id'];
                $info = $this->getInfo($id);
                if($flag) {
                    $childList = $this->getChilds($id,$flag);
                    if(is_array($childList)) {
                        $info['children'] = $childList;
                    }
                }
                $list[] = $info;
            }
        }
        return $list;
    }
    
    /**
     * 获取分类
     * 
     * @author zongjl
     * @date 2018-11-02
     */
    function getCateName($cateId, $delimiter="") {
        do {
            $info = $this->getInfo($cateId);
            $names[] = $info['name'];
            $cateId = $info['parent_id'];
        } while($cateId>0);
        $names = array_reverse($names);
//         if (strpos($names[1], $names[0])===0) {
//             unset($names[0]);
//         }
        return implode($delimiter, $names);
    }
    
}