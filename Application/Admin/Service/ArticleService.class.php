<?php

/**
 * 文章管理-服务类
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ArticleModel;
class ArticleService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ArticleModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-07-17
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
     * @author zongjl
     * @date 2018-07-17
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $cover = trim($data['cover']);
        
        //图集处理
        $imgsList = trim($data['imgs']);
        if($imgsList) {
            $imgArr = explode(',', $imgsList);
            foreach ($imgArr as $key => $val) {
                if(strpos($val, "temp")) {
                    //新上传图片
                    $imgStr[] = \Zeus::saveImage($val, 'article');
                }else{
                    //过滤已上传图片
                    $imgStr[] = str_replace(IMG_URL, "", $val);
                }
            }
        }
        $data['imgs'] = serialize($imgStr);
        
        //封面处理
        if(strpos($cover, "temp")) {
            $data['cover'] = \Zeus::saveImage($cover, 'article');
        }
        
        //内容处理
        \Zeus::saveImageByContent($data['content'],$data['title'],"article");

        return parent::edit($data);
        
    }
    
}