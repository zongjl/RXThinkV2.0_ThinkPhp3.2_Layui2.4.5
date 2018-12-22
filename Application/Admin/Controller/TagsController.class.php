<?php

/**
 * 标签-控制器
 * 
 * @author zongjl
 * @date 2018-10-19
 */
namespace Admin\Controller;
use Admin\Model\TagsModel;
use Admin\Service\TagsService;
class TagsController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new TagsModel();
        $this->service = new TagsService();
    }
}