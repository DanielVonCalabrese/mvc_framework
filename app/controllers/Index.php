<?

require_once '/../libs/Forms/login.php';
require_once '/../libs/Forms/Register.php';

class Index extends Controller
{
    protected $_usersModel;

    public function __construct()
    {
        parent::__construct();
        $this->_complainsModel = $this->loadModel('Complains');
        $this->_productsModel = $this->loadModel('Products');
        $this->_usersModel = $this->loadModel('Users');
    }

    public function Index($params = null)
    {
        if($this->_user['role'] == 'developer' || $this->_user['role'] == 'admin')
        {
            $items = $this->_complainsModel->getItems();
        }
        else
        {
            $items = $this->_complainsModel->getItemsByUser($this->_user['user_id']);
        }
        $this->view->user = $this->_user;
        $this->view->items = $items;
        $this->view->render('complains/viewAll');
    }

    public function Register()
    {
        $form = new Form_Register();

        if(isset($_POST['submit']))
        {
            if($this->helper->checkPost($_POST))
            {

                $user = $this->_usersModel->getItemByEmail($_POST['email']);
                if($user)
                {
                    $this->view->errorMessages = 'User with this email already exists!';
                }
                else
                {
                    $this->_usersModel->insertItem($_POST);
                    $this->helper->redirect('index/index');
                }
            }
            else
            {
                $this->view->errorMessages = $this->helper->getPostMessages();
            }
        }

        $this->view->form = $form->init();
        $this->view->render('index/register');
    }

    public function Login()
    {
        $form = new Form_Login();

        if(isset($_POST['submit']))
        {
            if($this->helper->checkPost($_POST))
            {
                $user = $this->_usersModel->getItem($_POST['username'], $_POST['password_plane']);
                if($user)
                {
                    $_SESSION['user'] = $user;
                    $this->helper->redirect('index/index');
                }
                else
                {
                    $this->view->errorMessages = 'Wrong username or password!';
                }
            }
            else
            {
                $this->view->errorMessages = $this->helper->getPostMessages();
            }
            
        }

        $this->view->form = $form->init();
        $this->view->render('index/login');
    }

    public function logout()
    {
        session_destroy();
        $this->helper->redirect('index/index');
    }
}

?>