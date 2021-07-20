<?

class Users extends Controller
{
    protected $_usersModel;

	public function __construct()
	{
        parent::__construct();
        $this->_usersModel = $this->loadModel('Users');
	}

    public function Index($params = null)
    {
        $items = $this->_usersModel->getItems();

        $this->view->items = $items;
        $this->view->render('users/index');
    }
}

?>