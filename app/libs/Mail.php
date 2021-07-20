<?

class Mail
{
    public function __construct()
    {

    }

    public function sendEmail($to, $subject, $message)
    {
        mail($to, $subject, $message);
    }

}

?>