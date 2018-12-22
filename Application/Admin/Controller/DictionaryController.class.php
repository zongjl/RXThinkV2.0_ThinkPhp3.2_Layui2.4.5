<?php

/**
 * 字典-控制器
 * 
 * @author zongjl
 * @date 2018-07-20
 */
namespace Admin\Controller;
use Admin\Model\DictionaryModel;
use Admin\Service\DictionaryService;
class DictionaryController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new DictionaryModel();
        $this->service = new DictionaryService();
    }
}