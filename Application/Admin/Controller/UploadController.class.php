<?php

/**
 * 文件上传-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Think\Upload;
class UploadController extends BaseController {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 单文件上传
     * 
     * @author zongjl
     * @date 2018-07-16
     */
    function uploadImg(){
        $upload = new Upload();// 实例化上传类
        $upload->maxSize = C('UPLOAD')['UPLOAD_IMG_SIZE']*1024;// 设置附件上传大小
        $upload->exts = explode('|', C('UPLOAD')['UPLOAD_IMG_EXT']);// 设置附件上传类型
        $upload->rootPath = IMG_PATH; // 设置附件上传根目录
        $upload->savePath = '/temp/';
        $upload->subName = "";
        $info = $upload->uploadOne($_FILES['file']);
        if(!$info) {
            // 上传错误提示错误信息
            //$this->error($upload->getError());
            $this->ajaxReturn(message($upload->getError(),false));
        }else{
            // 上传成功 获取上传文件信息
            $filePath = $info['savepath'].$info['savename'];
            if(strpos($filePath , IMG_URL) === FALSE) {
                $filePath = IMG_URL . $filePath;
            }
            $this->ajaxReturn(message('上传成功',true,$filePath));
        }
    }
    
}