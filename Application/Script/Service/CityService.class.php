<?php

/**
 * 城市-服务类
 * 
 * @author zongjl
 * @date 2018-11-22
 */
namespace Script\Service;
use Script\Model\CityModel;
class CityService extends ScriptServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new CityModel();
    }
    
    /**
     * 获取城市组件数据列表
     * 
     * @author zongjl
     * @date 2018-11-22
     */
    function getCityList() {
        $list[86] = [
            'A-G'=>[],
            'H-K'=>[],
            'L-S'=>[],
            'T-Z'=>[],
        ];
        
        //获取省份信息
        $result = $this->mod->where([
            'level'=>1,
            'mark'=>1,
        ])->order('id asc')->select();
        if($result) {
            foreach ($result as $val) {
                $provinceId = (int)$val['id'];
                $provinceName = $val['name'];
                //首字母
                $firstLetter = getFirstCharter($provinceName);
                $data = [
                    'code'=>$provinceId,
                    'address'=>$provinceName,
                ];
                if(in_array($firstLetter, ['A','B','C','D','E','F','G'])) {
                    $list[86]['A-G'][] = $data;
                }else if(in_array($firstLetter, ['H','I','J','K'])) {
                    $list[86]['H-K'][] = $data;
                }else if(in_array($firstLetter, ['L','M','N','O','P','Q','R','S'])) {
                    $list[86]['L-S'][] = $data;
                }else if(in_array($firstLetter, ['T','U','V','W','X','Y','Z'])) {
                    $list[86]['T-Z'][] = $data;
                }
                
                //获取城市信息
                $cityList = $this->mod->where([
                    'parent_id'=>$provinceId,
                    'mark'=>1,
                ])->order("id asc")->select();
                if($cityList) {
                    foreach ($cityList as $vt) {
                        $cityId = (int)$vt['id'];
                        $cityName = trim($vt['name']);
                        $list[$provinceId][$cityId] = $cityName;
                        
                        //获取县区
                        $districtList = $this->mod->where([
                            'parent_id'=>$cityId,
                            'mark'=>1,
                        ])->order("id asc")->select();
                        if($districtList) {
                            foreach ($districtList as $v) {
                                $districtId = (int)$v['id'];
                                $districtName = trim($v['name']);
                                $list[$cityId][$districtId] = $districtName;
                            }
                        }
                    }
                }
                
            }
        }

        return $list;
    }
    
}