<?php

/**
 * 菜单管理-服务类
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\MenuModel;
class MenuService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new MenuModel();
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
        $list = $this->mod->getChilds(0);
        return message("操作成功",1,$list);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-07-26
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['is_show'] = (isset($data['is_show']) && $data['is_show']=="on") ? 1 : 2;
        $data['is_public'] = (isset($data['is_public']) && $data['is_public']=="on") ? 1 : 2;
        return parent::edit($data);
    }
    
    /**
     * 批量设置节点
     * 
     * @author zongjl
     * @date 2018-11-03
     */
    function batchFunc() {
        $data = I('post.', '', 'trim');

        //菜单ID
        $menuId = (int)$data['menu_id'];
        if(!$menuId) {
            return message('菜单ID不能为空',false);
        }
        $info = $this->mod->getInfo($menuId);
        if(!$info) {
            return message('菜单信息不存在',false);
        }
        if($info['type']!=3) {
            return message('当前不是菜单,无法添加权限节点',false);
        }
        
        //菜单名称
        $name = trim($data['name']);
        if(!$name) {
            return message('菜单名称不能为空',false);
        }
        
        //节点数组
        $func = $data['func'];
        if(!$func) {
            return message('请选择权限节点',false);
        }
        $funcList = array_keys($func);
        
        $sortNum = 0;
        $totalNum = 0;
        foreach ($funcList as $val) {
            $sortNum++;
            $funcArr = explode('|', $val);
            $item = [
                'parent_id'=>$menuId,
                'name'=>$funcArr[1],
                'type'=>4,
            ];
            $act = $funcArr[0]==='add' ? 'edit' : $funcArr[0];
            //重复性验证
            $info = $this->mod->getRowByAttr($item);
            $item['id'] = $info['id'];
            $item['url'] =  "/".ucfirst($name)."/{$act}";
            $item['auth'] = "sys:".lcfirst($name).":{$funcArr[0]}";
            $item['sort_order'] = $sortNum*5;
            $rowId = $this->mod->edit($item);
            if($rowId) $totalNum++;
        }
        return message("本次共添加【{$totalNum}】个节点权限");
        
    }
    
    /**
     * 获取菜单配置列表
     *
     * @author zongjl
     * @date 2018-07-09
     */
    function getMenuList($auth) {
        if(is_array($auth)) {
            $list1 = array();
            $list2 = array();
            $list3 = array();
            foreach ($auth as $key=>$val) {
                if(count($val)<=0) continue;

                //查看节点状态
                if(is_array($val)) {
                    $funcIds = implode(',', $val);
                    $funcNum = $this->mod->where([
                        'id'=>array('in',$funcIds),
                        'is_show'=>1,
                    ])->count();
                    if($funcNum<=0) continue;
                }
                
                $item = array();
                do{
                    $info = $this->mod->getInfo($key,true);
                    if($info && $info['is_show']==1) {
                        $info['title'] = $info['name'];
                        $info['font'] = "larry-icon";
                        $info['url'] = $info['to_url'];
                        $item[] = $info;
                        $key = (int)$info['parent_id'];
                        
//                         //查看节点
//                         $funcNum = 0;
//                         foreach ($val as $func) {
//                             $funcInfo = $this->mod->getInfo($func);
//                             if($funcInfo['is_show']==1) $funcNum++;
//                         }
//                         if($funcNum<=0) {
//                             $key = 0;
//                         }
                        
                    }else{
                        $key = 0;
                    }
                }while($key>0);
                if(is_array($item) && count($item)>0) {
                    $result = array_reverse($item);
                    
                    $item1 = $result[0];
                    $item2 = $result[1];
                    $item3 = $result[2];
                    
                    $list1[$item1['id']] = $item1;
                    $list2[$item1['id']][$item2['id']] = $item2;
                    $list3[$item2['id']][$item3['id']] = $item3;
                    
                }
            }

            //遍历数据源
            $list = array();
            foreach ($list1 as $key=>&$val) {
                $menuList2 = $list2[$key];
                if(!is_array($menuList2)) {
                    continue;
                }
                foreach ($menuList2 as $kt=>&$vt) {
                    $menuList3 = $list3[$kt];
                    if(!is_array($menuList3)) {
                        continue;
                    }
                    $menuList3 = array_merge($menuList3,array());
//                     array_multisort($menuList3,SORT_ASC,SORT_NUMERIC);
                    $vt['children'] = $menuList3;
                }
                $menuList2 = array_merge($menuList2,array());
//                 array_multisort($menuList2,SORT_ASC,SORT_NUMERIC);
                $val['children'] = $menuList2;
                $list[] = $val;
            }
            $list = array_merge($list,array());
//             array_multisort($list,SORT_ASC,SORT_NUMERIC);
        }
        return message("操作成功",true,$list);
    }
    
}