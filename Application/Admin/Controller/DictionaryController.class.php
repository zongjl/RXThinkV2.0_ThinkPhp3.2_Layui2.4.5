<?php
// +----------------------------------------------------------------------
// | RXThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2019 http://rxthink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

/**
 * 字典-控制器
 * 
 * @author 牧羊人
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