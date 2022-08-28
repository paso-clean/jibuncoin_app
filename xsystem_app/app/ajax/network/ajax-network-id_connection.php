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
$user = $userIns->get_user_by_session($_COOKIE['xsystem_' . XSYSTEM_APP . '_session']);





echo '<div class="content-block" style="text-align:center;padding:20px;">';
// foreach($_POST as $key=>$item){
//     echo $key . ' : ' . $item . '<br>';
// }
$url = XSYSTEM_APP_URL . 'api/network/entity_connection/set/id/' . $user['user_code'] . '/';
echo $url . '<br>';

echo '<div class="btn btn-primary btn-lg btn-api"';
echo 'data-url="' . $url . '"';
echo 'data-done="refresh_done"';
echo 'data-session_name="' . '' . '"';
echo 'data-session_code="' . '' . '"';
echo 'data-entity_type="user"';
echo 'data-entry="' . '' . '"';
echo '>';
echo 'データ連携';
echo '</div>';
echo '</div>';







?>