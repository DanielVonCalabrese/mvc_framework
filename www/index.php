<?

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once('../app/libs/Bootstrap.php');
require_once('../app/libs/Controller.php');
require_once('../app/libs/Model.php');
require_once('../app/libs/View.php');
require_once('../app/libs/Database.php');
require_once('../app/libs/Form.php');
require_once('../app/libs/Helpers.php');
require_once('../app/config/config.php');

$app = new Bootstrap();

?>