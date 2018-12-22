<?php

/**
 * CMS管理-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\ArticleModel;
use Admin\Service\ArticleService;
class ArticleController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ArticleModel();
        $this->service = new ArticleService();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-08-17
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        if(IS_POST) {
            $message = $this->service->getList();
            $this->ajaxReturn($message);
            return;
        }
        
        if($_GET['simple']) {
            $this->render("article.simple.html");
            return;
        }
        
        $this->render();
    }
    
}