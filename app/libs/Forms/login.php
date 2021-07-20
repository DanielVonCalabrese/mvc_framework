<?

class Form_Login extends Form
{
    protected $_output;

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        $this->_output .= $this->createForm('post', BASE_URL . 'index/login');
        $this->_output .= $this->createElement('text', 'username', 'username', 'User name: ');
        $this->_output .= $this->createElement('password', 'password_plane', 'password_plane', 'Password: ');
        $this->_output .= $this->createElement('submit', 'submit', 'submit', 'Login');
        $this->_output .= $this->endForm();

        return $this->_output;
    }
}

?>