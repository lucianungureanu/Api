<?
include('api/ApiClass.php');

$permission = array('xxx-xxx-xxx','zzz-zzz');

$key = $_POST['app_key'];
$action = $_POST['action'];
if((!$key && !$action) || !in_array($key, $permission)){
	die('You don\'t have permission ');
}
$data = $_POST;
unset($data['app_key']);
unset($data['action']);

$api = new Api($data);

switch ($action) {
	case 'login':
		$api->login();
		break;
	case 'add':
		$api->insert();
		break;
	case 'delete':
		$api->delete();
		break;
	case 'update':
		$api->update();
		break;
	case 'all':
		$api->getList();
		break;	
	case 'info':
		$api->getRow();
		break;	
	default:
		# code...
		break;
}


$api = new Api();