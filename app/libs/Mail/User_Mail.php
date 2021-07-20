<?

require_once '/../Mail.php';

class User_Mail extends Mail
{
    protected $_to;
    protected $_subject;
    protected $_message;

    public function __construct($data)
    {
        $this->_to = $data['email'];
        $this->_subject = 'About ' . $data['product_name'] . ' complain.';
        $this->_message = 'The problem about ' . $data['product_name'] . ' was fixed.';
        ini_set("SMTP","smtp.gmail.com");
        ini_set("SMTP_PORT", 465);
        ini_set("sendmail_from","alexisonfire@abv.bg");
    }

    public function sendUserEmail()
    {
        $this->sendEmail($this->_to, $this->_subject, $this->_message);
    }

}

?>