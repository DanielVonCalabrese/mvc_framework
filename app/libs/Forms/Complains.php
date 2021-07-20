<?

class Form_Complains extends Form
{
    protected $_output;
    protected $_userId;

    public function __construct($userId, $productsModel)
    {
        parent::__construct();
        $this->_userId = $userId;
        $this->_productsModel = $productsModel;
    }

    public function init()
    {
        $this->_output .= $this->createForm('post', BASE_URL . 'complains/edit');
        $this->_output .= $this->createElement('textarea', 'complain_desc', 'complain_desc', 'Coplain description: ');
        $this->_output .= $this->createElement('select', 'product_id', 'product_id', 'Product: ', $this->_productsModel->listProducts());
        $this->_output .= $this->createElement('text', 'product_version', 'product_version', 'Product version: ');
        $this->_output .= $this->createElement('hidden', 'user_id', 'user_id', $this->_userId);
        $this->_output .= $this->createElement('submit', 'submit', 'submit', 'Submit');
        $this->_output .= $this->endForm();

        return $this->_output;
    }
}

?>