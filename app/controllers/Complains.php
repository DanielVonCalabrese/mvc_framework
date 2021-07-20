<?

require_once '/../libs/Forms/Complains.php';
require_once '/../libs/Mail/User_Mail.php';
require_once '/../libs/Mail/Admin_Mail.php';

class Complains extends Controller
{
    protected $_productsModel;

    public function __construct()
    {
        parent::__construct();
        $this->_complainsModel = $this->loadModel('Complains');
        $this->_productsModel = $this->loadModel('Products');
        $this->_usersModel = $this->loadModel('Users');
    }

    public function Index()
    {
        $items = $this->_complainsModel->getItemsByUser($this->_user['user_id']);
        $this->view->items = $items;
        $this->view->render('complains/index');
    }

    public function viewAll()
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

    public function edit()
    {
        $form = new Form_Complains($this->_user['user_id'], $this->_productsModel);

        if(isset($_POST['submit']))
        {
            if($this->helper->checkPost($_POST))
            {
                $productItem = $this->_productsModel->getItem($_POST['product_id']);
                $_POST['product_name'] = $productItem['product_name'];
                $_POST['user'] = $this->_user;
                $this->_complainsModel->insertItem($_POST);

                $mailer = new Admin_Mail($_POST);
                $mailer->sendAdminEmail();
                $this->helper->redirect('complains/index');
            }
            else
            {
                $this->view->errorMessages = $this->helper->getPostMessages();
            }
        }

        $this->view->form = $form->init();
        $this->view->render('complains/edit');
    }

    public function set()
    {
        $params = $this->helper->getParams();
        if($params[5] == 'fixed')
        {
            $this->_complainsModel->setAsFixed($params[3], $params[5], $this->_user['user_id']);
            $productItem = $this->_productsModel->getItem($params[3]);
            $user = $this->_usersModel->getItemById($params[7]);
            $data['product_name'] = $productItem['product_name'];
            $data['email'] = $user['email'];
            $mailer = new User_Mail($data);
            $mailer->sendUserEmail();
        }
        else
        {
            $this->_complainsModel->updateItem($params[3], $params[5]);
        }
        $this->helper->redirect('complains/viewAll');
    }
}

?>