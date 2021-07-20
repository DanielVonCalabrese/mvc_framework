<?

class Bootstrap
{
    public function __construct()
    {
        if(isset($_GET['url']))
        {
            $getUrl = rtrim($_GET['url'], '/');
            foreach(explode('/', $getUrl) as $urlSegment)
            {
                $url[] = $urlSegment;
            }

            if(isset($url[0]))
            {
                $controllerUrl = '../app/controllers/' . $url[0] . '.php';
                if(file_exists($controllerUrl))
                {
                    require_once($controllerUrl);
                    $controller = new $url[0];
                    if(isset($url[1]))
                    {
                        $controller->{$url[1]}();
                        if(isset($url[2]))
                        {
                        $controller->{$url[1]}($url[2]);
                        }
                    }
                    else
                    {
                        try
                        {
                            $controller->{'index'}();
                        }
                        catch(Exception $e)
                        {
                            echo $e->getMessage();
                        }
//                        echo $controller->{'index'}();exit;
//                        var_dump($response, 'pass');
                    }
                }
                else
                {
//                    require '../app/controllers/index.php';
//                    $controller = new Index();
//                    $controller->{'index'}();
//                    return false;
                    throw new Exception('No such Controller!');
                    return false;
//                    echo 'no';
//                    require_once('../app/controllers/error.php');
//                    $controller = new Error;
                }
            }

            //echo $url . '<br />';
        }
        else
        {
            require '../app/controllers/index.php';
            $controller = new Index();
            $controller->{'index'}();
            return false;
        }
    }
}

?>