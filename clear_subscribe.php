<?php
require_once('./assets/init.php');
$users_id = $db->where('subscriber_price',0,'>')->get(T_USERS,null,array('id'));
$ids = array();
foreach ($users_id as $key => $value) {
	$ids[] = $value->id;
}
$db->where('user_id',$ids,"IN")->where('time',strtotime("-30 days"),'<')->delete(T_SUBSCRIPTIONS);