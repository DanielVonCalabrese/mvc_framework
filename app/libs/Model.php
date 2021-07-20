<?

require_once('Database.php');

abstract class Model extends Database
{
    public function __construct()
    {
        parent::__construct('localhost', 'root', '');
    }
    
    public function query($sql)
    {
        $sql = $this->escape_sql($sql);
        return mysql_query($sql);
    }
    
    public function selectRow($sql)
    {
        $result = array();
        $query = $this->query($sql);
        if($query != false)
        {
            $result = mysql_fetch_array($query);;
        }
        return $result;
    }
    
    public function selectAll($sql)
    {
        $result = array();
        $query = $this->query($sql);
        if($query != false)
        {
            while($row = mysql_fetch_assoc($query))
            {
                $result[] = $row;
            }
        }
        return $result;
    }
    
    public function insert($sql)
    {
        $this->query($sql);
    }
    
    public function update($sql)
    {
        $this->query($sql);
    }
    
    protected function escape_sql($string)
    {
        $result = stripslashes(str_replace("\n", "", mysql_real_escape_string(trim($string))));
        return $result;
    }
}

?>