<?php

/**
 * 配置文件读取器
 * 
 * @author zongjl
 * @date 2018-11-15
 */
class Config {
    
    /**
     * 根据配置名称获取配置信息
     * 
     * @author zongjl
     * @date 2018-11-15
     */
    static function getConfig($tag) {
        $map = [
            'tag'=>$tag,
            'status'=>1,
            'mark'=>1,
        ];
        $info = M("config")->where($map)->find();
        if($info) {
            //数据类型：1单行文本 2多行文本 3富文本 4图片 5图片集
            $type = (int)$info['type'];
            if($type==4) {
                //单图
                $content = IMG_URL . $info['content'];
            }else if($type==5) {
                //图片集
                $imgsList =  unserialize($info['content']);
                foreach ($imgsList as &$row) {
                    $row = IMG_URL . $row;
                }
                $content = $imgsList;
            }else {
                //其他类型
                $content = $info['content'];
            }
        }
        return $content;
    }
    
}