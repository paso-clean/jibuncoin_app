<?php
require_once XSYSTEM_COMMON_DIR . 'class/class-user.php';
require_once XSYSTEM_COMMON_DIR . 'class/class-network.php';

if(!isset($_COOKIE['xsystem_' . XSYSTEM_APP . '_session'])){
//     $redirect = XSYSTEM_APP_URL . 'login/';
//     header("Location: $redirect");
    echo 'error.';
    exit;
}
$userIns = new User();
$networkIns = new Network();

$user = $userIns->get_user_by_session($_COOKIE['xsystem_' . XSYSTEM_APP . '_session']);


if(isset($_POST['network_code'])){
    $network_type = $_POST['network_type'];
    $network_code = $_POST['network_code'];
    $server = $networkIns->get_network_base_server($network_type,$network_code,APP_URL);
}else{
    exit;
}


$url = $server['domain'] . 'api/network/info/';


$json = file_get_contents($url);
$data = json_decode($json,true);


$url = $data['component_unit'] . $user['user_code'] . '/';


$component_unit = file_get_contents($url);

echo $component_unit;

?>
<div id="url-<?php echo $user['user_code']; ?>" data-url="<?php echo XSYSTEM_APP_URL; ?>ajax/network/id_connection/" data-entry="<?php echo $data['entry']; ?>" class="content-block" style="text-align:center;padding:20px;display:none;"></div>