<?

class Layout
{
    public function __construct()
    {
        
    }

    public function render($view)
    {
        require_once('../app/views/header.php');
        require_once('../app/views/' . $view . '.php');
        require_once('../app/views/footer.php');
    }

}

?>