<?

require_once '/../Mail.php';

class Admin_Mail extends Mail
{
    protected $_to;
    protected $_subject;
    protected $_message;

    public function __construct($data)
    {
        $this->_to = 'admin@admin.com';
        $this->_subject = 'New complain about ' . $data['product_name'] . ' from ' . $data['user']['username'];
        $this->_message = $data['complain_desc'];
        ini_set("SMTP","smtp.gmail.com");
        ini_set("SMTP_PORT", 465);
        ini_set("sendmail_from","alexisonfire@abv.bg");
    }

    public function sendAdminEmail()
    {
        $this->sendEmail($this->_to, $this->_subject, $this->_message);
    }

}

?>