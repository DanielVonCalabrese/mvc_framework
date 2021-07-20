<?

class Models_Users extends Model
{
    protected $_table = 'users';

    public function getItem($username, $password)
    {
        return $this->selectRow('SELECT * FROM ' . $this->_table . ' WHERE username = "' . $username . '" AND password_plane = "' . $password . '" LIMIT 1');
    }

    public function getItemById($userId)
    {
        return $this->selectRow('SELECT * FROM ' . $this->_table . ' WHERE user_id = "' . $userId . '" LIMIT 1');
    }

    public function getItems()
    {
        return $this->selectAll('SELECT * FROM ' . $this->_table);
    }

    public function getItemByEmail($email)
    {
        return $this->selectRow('SELECT * FROM ' . $this->_table . ' WHERE email = "' . $email . '" LIMIT 1');
    }

    public function insertItem($data)
    {
        return $this->insert('INSERT INTO ' . $this->_table . ' (username, password_plane, email, phone) VALUES("' . $data['username'] . '","' . $data['password_plane'] . '","' . $data['email'] . '","' . $data['phone'] . '")');
    }
}

?>