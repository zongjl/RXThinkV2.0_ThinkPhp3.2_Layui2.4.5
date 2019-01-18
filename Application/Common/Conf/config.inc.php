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
 * 系统常规配置
 * 
 * @author 牧羊人
 * @date 2018-09-06
 */

//定义域名常量
define('MAIN_URL','http://main.rxthink.com');
define('SITE_URL','http://www.rxthink.com');
define('WAP_URL','http://h5.rxthink.com');
define('API_URL','http://api.rxthink.com');
define('IMG_URL','http://images.rxthinkbeta.com');
define('ATTACHMENT_PATH', 'E:/xampp/htdocs/Kivii/RXThink/Uploads');
define('IMG_PATH', ATTACHMENT_PATH."/img");
define('UPLOAD_TEMP_PATH', IMG_PATH . '/temp');

return array(
    'SITE_NAME' => 'RXThink企业级框架TP3版V2.0',
    'NICK_NAME' => 'RXThink框架',
    'DB_CONFIG' => 'mysql://root:111111@127.0.0.1:3306/rxthink',
    'CACHE_CONFIG'=>'redis://:@127.0.0.1:6379/1',
    //'CACHE_CONFIG'=> 'memcache://:@127.0.0.1:11211',
    'DB_PREFIX' => 'yk_',
    'DB_CHARSET' => 'utf8mb4',
    'UPLOAD' => array(
        'UPLOAD_IMG_EXT' => 'jpg|png|gif|bmp|jpeg',
        'UPLOAD_IMG_SIZE' => 1024*10,//最大上传10MB文件
        'UPLOAD_IMG_NUM' => 9,//最大上传张数
    ),
    'CKEY' => 'RX',//缓存前缀
);

?>