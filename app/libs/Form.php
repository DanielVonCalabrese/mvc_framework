<?

class Form
{
    protected $_form;

    public function __construct()
    {
        
    }

    public function createForm($method, $action)
    {
        return $this->_form = '<form method="' . $method . '" action="' . $action . '">';
    }

    public function endForm()
    {
        return $this->_form = '</form>';
    }

    public function createElement($element, $name, $id = '', $value = '', $options = array())
    {
        switch($element)
        {
            case 'text':
                $this->_form = '<label>' . $value . '</label><input type="text" name="' . $name . '" id="' . $id . '" /><br />';
                break;
            
            case 'hidden':
                $this->_form = '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '" /><br />';
                break;

            case 'password':
                $this->_form = '<label>' . $value . '</label><input type="password" name="' . $name . '" id="' . $id . '" /><br />';
                break;

            case 'textarea':
                $this->_form = '<label>' . $value . '</label><textarea name="' . $name . '" id="' . $id . '" /></textarea><br />';
                break;

            case 'checkbox':
                $this->_form = '<label>' . $value . '</label><input type="checkbox" name="' . $name . '" id="' . $id . '" /><br />';
                break;

            case 'radio':
                $this->_form = '<label>' . $value . '</label><input type="radio" name="' . $name . '" id="' . $id . '" /><br />';
                break;

            case 'select':
                $this->_form = '<label>' . $value . '</label><select name="' . $name . '" id="' . $id . '" />';
                    foreach($options as $key => $value)
                    {
                        $this->_form .= '<option value="' . $key . '">' . $value . '</option>';
                    }
                $this->_form .= '</select><br />';
                break;

            case 'submit':
                $this->_form = '<input type="submit" name="' . $name . '" id="' . $id . '" value="' . $value . '"/><br />';
                break;

        }

        return $this->_form;
    }
}

?>