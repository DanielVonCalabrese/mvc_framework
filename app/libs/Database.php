<?

abstract class Database
{
    public function __construct($host = '', $user = 'root', $password = '')
    {
        mysql_connect($host, $user, $password);
        $dbSelected = mysql_select_db('mvc');
        if($dbSelected == false)
        {
            die("Database error!");
        }
    }
}

?>