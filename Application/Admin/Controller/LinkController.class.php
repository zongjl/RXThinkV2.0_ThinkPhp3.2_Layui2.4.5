<?php

/**
 * 友链-控制器
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Controller;
use Admin\Model\LinkModel;
use Admin\Service\LinkService;
class LinkController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new LinkModel();
        $this->service = new LinkService();
    }
}