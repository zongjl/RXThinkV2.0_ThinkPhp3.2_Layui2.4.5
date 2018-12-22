<?php
return array(
	//'配置项'=>'配置值'
	
    //【加载自定义标签】
    'TAGLIB_LOAD' => true,//加载标签库打开
    'APP_AUTOLOAD_PATH'         =>'@.TagLib',
//     'TAGLIB_PRE_LOAD' => 'TagLib\Migo',// 预先加载标签
    'TAGLIB_BUILD_IN' => 'Cx,Test', //Cx为核心标签库名称,Tag为自定义标签库
    
);