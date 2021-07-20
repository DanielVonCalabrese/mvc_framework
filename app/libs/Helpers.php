<?

class Helper
{
    protected $_postMessages;

    public function __construct()
    {
        
    }

    public function myUrl($action = '', $controller = '', $params = array())
    {
        $urlParams = '';
        foreach($params as $key => $value)
        {
            $urlParams .= $key . '/' . $value . '/';
        }
        return rtrim(BASE_URL . $controller . '/' .  $action . '/' . $urlParams, '/');
    }

    public function myDateFromDb($date, $format = 'd-m-Y H:i:s')
    {
        $result = '';
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
        $hour = substr($date, 11, 2);
        $min = substr($date, 14, 2);
        $sec = substr($date, 17, 2);
        $result = date($format, mktime($hour, $min, $sec, $month, $day, $year));

        return $result;
    }

    public function getParams()
    {
        $params = explode('/', $_GET['url']);
        return $params;
    }

    public function redirect($path = '', $params = array())
    {
        header('Location: ' . rtrim(BASE_URL . $path));
    }

    public function checkPost($post = array())
    {
        $result = true;
        foreach($post as $key => $value)
        {
            if(strlen($value) == 0 && $value == '')
            {
                if($key == 'complain_desc')
                {
                    $this->_postMessages[] = 'Complain description can\'t be empty!';
                }
                elseif($key == 'product_version')
                {
                    $this->_postMessages[] = 'Product version can\'t be empty!';
                }
                elseif($key == 'product_name')
                {
                    $this->_postMessages[] = 'Product name can\'t be empty!';
                }
                else
                {
                    $this->_postMessages[] = $key . ' can\'t be empty!';
                }
            }
            if($key == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                $this->_postMessages[] = $key . ' isn\'t valid!';
            }
        }
        if(!empty($this->_postMessages))
        {
            $result = false;
        }

        return $result;
    }

    public function getPostMessages()
    {
        return $this->_postMessages;
    }

}

?>