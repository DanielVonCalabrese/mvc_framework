<?

class Form_Register extends Form
{
    protected $_output;

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        $this->_output .= $this->createForm('post', BASE_URL . 'index/register');
        $this->_output .= $this->createElement('text', 'username', 'username', 'User name: ');
        $this->_output .= $this->createElement('password', 'password_plane', 'password_plane', 'Password: ');
        $this->_output .= $this->createElement('text', 'email', 'email', 'Email: ');
        $this->_output .= $this->createElement('text', 'phone', 'phone', 'Phone: ');
        $this->_output .= $this->createElement('submit', 'submit', 'submit', 'Register');
        $this->_output .= $this->endForm();

        return $this->_output;
    }
}

?>