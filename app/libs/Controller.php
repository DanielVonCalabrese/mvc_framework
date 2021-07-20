<?

class Controller
{
    protected $_user;

    public function __construct()
    {
        session_start();
        if(isset($_SESSION['user']))
        {
            $this->_user = $_SESSION['user'];
        }
        $this->view = new View();
        $this->helper = new Helper();
    }

    public function loadModel($modelName)
    {
        $path = '../app/Models/Models_' . $modelName . '.php';
        if(file_exists($path))
        {
            require_once $path;
            $file = 'Models_' . $modelName;
            return $this->model = new $file();
        }
    }

}

?>