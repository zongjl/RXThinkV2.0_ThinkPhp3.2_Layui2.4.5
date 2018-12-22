<?php

/**
 * 短信平台账号
 * 
 * @author zongjl
 * @date 2018-08-30
 */
return array(
    
    'SMS_1' => array(
        'api_url'=>'http://223.68.139.178:9010/YidaInterface/SendSms.do?',
        'method'=>"GET",
        'params'=>array(
            'sname'=>"njjhy",
            'spwd'=>"mywater112233",
            'sphones'=>"{MOBILE}",
            'smsg'=>'{CONTENT}【{SIGN}】',
            'msg_id'=>0
        ),
        'result'=>function($response, &$errorMsg) {
            $errorMsg= trim($response);
            if (!$response) return 2;
            if ($response[0]=="0") return 1;
            return 2;
        }
    ),
    
    'SMS_2' => array(
        'api_url'=>'http://send.18sms.com/msg/HttpBatchSendSM',
        'method'=>"POST",
        'params'=>array(
            'account'   =>  '196qm4',
            'pswd'  =>    'yjm#0928',
            'mobile'    =>  '{MOBILE}',
            'msg'   =>  '{CONTENT}',
            'needstatus' => false,
            'extno' =>  '3225'
        ),
        'result'=>function($response, &$errorMsg) {
            $errorMsg = $response;
            if (!$response) {
                $errorMsg = "网络异常";
                return 2;
            }
            list($taskId, $code) = explode(",", $response);
            if ($code==="0") {
                return 1;
            }
            return 2;
        }
    )
     
);