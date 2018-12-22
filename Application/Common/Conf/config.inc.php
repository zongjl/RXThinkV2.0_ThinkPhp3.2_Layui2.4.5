<?php

/**
 * 系统常规配置
 * 
 * @author zongjl
 * @date 2018-09-06
 */

//定义域名常量
define('MAIN_URL','http://main.kuangjia.com');
define('SITE_URL','http://www.kuangjia.com');
define('WAP_URL','http://h5.kuangjia.com');
define('API_URL','http://api.kuangjia.com');
define('IMG_URL','http://images.kuangjia.com');
define('ATTACHMENT_PATH', 'D:/xampp/htdocs/Kivii/TPV3.2.3/Uploads');
define('IMG_PATH', ATTACHMENT_PATH."/img");
define('UPLOAD_TEMP_PATH', IMG_PATH . '/temp');

return array(
    'SITE_NAME' => '南京云多普网络科技有限公司',
    'NICK_NAME' => '企业级框架V2.0',
    'DB_CONFIG' => 'mysql://root:111111@127.0.0.1:3306/kivii',
    'CACHE_CONFIG'=>'redis://:@127.0.0.1:6379/1',
    //'CACHE_CONFIG'=> 'memcache://:@127.0.0.1:11211',
    'DB_PREFIX' => 'yk_',
    'DB_CHARSET' => 'utf8mb4',
    'UPLOAD' => array(
        'UPLOAD_IMG_EXT' => 'jpg|png|gif|bmp|jpeg',
        'UPLOAD_IMG_SIZE' => 1024*10,//最大上传10MB文件
        'UPLOAD_IMG_NUM' => 9,//最大上传张数
    ),
    'CKEY' => 'Kivii',//缓存前缀
);

?>