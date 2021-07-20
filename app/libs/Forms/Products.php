<?

class Form_Products extends Form
{
    protected $_output;

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        $this->_output .= $this->createForm('post', BASE_URL . 'products/edit');
        $this->_output .= $this->createElement('text', 'product_name', 'product_name', 'Product name: ');
        $this->_output .= $this->createElement('select', 'product_type', 'product_type', 'Product type: ', Models_Products::listProductTypes());
        $this->_output .= $this->createElement('submit', 'submit', 'submit', 'Submit');
        $this->_output .= $this->endForm();

        return $this->_output;
    }
}

?>