<?php

//DES加解密KEY
define('API_KEY', 'IaRt5201');

return array(
	//'配置项'=>'配置值'
	
    //【加载扩展配置文件】
    'LOAD_EXT_CONFIG' => 'msgConfig,smsConfig',//扩展配置可以支持自动加载额外的自定义配置文件
    
    //【配置扩展函数文件】
    'LOAD_EXT_FILE' => 'SMS',//加载自定义公共函数文件
    
);