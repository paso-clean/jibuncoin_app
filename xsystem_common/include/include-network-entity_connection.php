<?php
require_once XSYSTEM_COMMON_DIR .'class/class-network.php';
$networkIns = new Network();

$networkIns->delete_expired_session(XSYSTEM_PRODUCT);

$cmd = $url_param[4];

if($cmd == 'set'){
    $entity_type = $url_param[5];
    $entity_code = $url_param[6];
    $session_name = xsystem_random_num(16);
    $session_code = xsystem_random_code(16);
//     $session = $networkIns->create_network_session($session_name,$session_code,'connection',$entity_type,$entity_code,'',1);
    $networks = $networkIns->get_active_networks($entity_type);
    $network = $networks[0];
    $server = $networkIns->get_network_base_server($entity_type, $network['network_code'], APP_URL);
    $domain = $server['domain'];
    $url = $domain . 'api/netowork/entity_connection/call_back/' . $session_name . '/' . $session_code . '/';
//     $data = xsystem_curl($url);
    $data['content'] = $url;
    echo json_encode($data);
    
}elseif($cmd == 'call_back'){
    $session_name = $url_param[5];
    $session_code = $url_param[6];
    
    
    $url = $server['domain'] . 'api/network/entity_connection/data/' . $session_name . '/' . $session_code . '/';
    $data = xsystem_curl($url);    
    echo json_encode($data);
    
}elseif($cmd == 'data'){
    $data['content'] = XSYSTEM_APP_URL;
    echo json_encode($data);
}


// if($cmd == 'call_back'){
//     $data_type = $url_param[5];
//     $session_name = $url_param[6];
//     $session_code = $url_param[7];
//     $base64 = $url_param[8];
    
//     $param = xsystem_base64_decode($base64);
    
//     $connection = $param['connection'];
//     $url = $connection . 'data/' . $data_type . '/' . $session_name . '/' . $session_code . '/';
    
        
//     $data = xsystem_curl($url);
        
//     if(isset($data) || $data != 'NULL'){
//         $networkIns->connection_network($data);
//         $res['status'] = 1;
//     }else{
//         $res['status'] = 0;
//     }

    
//     echo json_encode($res);
    
// }elseif($cmd == 'data'){
//     $data_type = $url_param[5];
//     $session_name = $url_param[6];
//     $session_code = $url_param[7];
//     if($session = $networkIns->get_common_session($session_code)){

//         $network = $networkIns->get_network($session['target_code']);
//         $network['servers'] = $networkIns->get_network_servers($network['network_code']);
        
//         echo json_encode($network);
//     }
    
// }


?>