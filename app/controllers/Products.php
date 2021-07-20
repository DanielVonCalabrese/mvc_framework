<?

require_once '/../libs/Forms/Products.php';

class Products extends Controller
{
    protected $_productsModel;

	public function __construct()
	{
        parent::__construct();
        $this->_productsModel = $this->loadModel('Products');
	}

    public function Index()
    {
        $items = $this->_productsModel->getItems();

        $this->view->items = $items;
        $this->view->render('products/index');
    }

    public function edit()
    {
        $form = new Form_Products();

        if(isset($_POST['submit']))
        {
            if($this->helper->checkPost($_POST))
            {
                $product = $this->_productsModel->getItemByName($_POST['product_name']);
                if($product)
                {
                    $this->view->errorMessages = 'Product with this name already exists!';
                }
                else
                {
                    $this->_productsModel->insertItem($_POST);
                    $this->helper->redirect('products/index');
                }
            }
            else
            {
                $this->view->errorMessages = $this->helper->getPostMessages();
            }
        }

        $this->view->form = $form->init();
        $this->view->render('products/edit');
    }
}

?>