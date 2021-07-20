<?

class Models_Complains extends Model
{
    protected $_table = 'products_complains';

    const WEB = 'web';
    const DESKTOP = 'desktop';

    public static function listProductTypes()
    {
        return array(
            self::WEB => self::WEB,
            self::DESKTOP => self::DESKTOP
        );
    }

    public function getItemsByUser($userId)
    {
        return $this->selectAll('SELECT * FROM ' . $this->_table . ' AS a LEFT JOIN products AS b ON a.product_id = b.product_id LEFT JOIN users AS c ON a.fixed_by = c.user_id WHERE a.added_by = "' . $userId . '"');
    }

    public function getItems()
    {
        return $this->selectAll('SELECT * FROM ' . $this->_table . ' AS a LEFT JOIN products AS b ON a.product_id = b.product_id LEFT JOIN users AS c ON a.fixed_by = c.user_id');
    }

    public function insertItem($data)
    {
        $dateAdded = date('Y-m-d H:i:s');
        return $this->insert('INSERT INTO ' . $this->_table . ' (complain_desc, product_id, product_version, date_added, added_by) VALUES("' . $data['complain_desc'] . '","' . $data['product_id'] . '","' . $data['product_version'] . '","' . $dateAdded . '","' . $data['user_id'] . '")');
    }

    public function setAsFixed($complainId, $action = false, $userId = null)
    {
        $dateFixed = date('Y-m-d H:i:s');
        return $this->update('UPDATE products_complains SET status = "' . $action . '", date_fixed = "' . $dateFixed . '", fixed_by = "' . $userId . '" WHERE complain_id = ' . $complainId);
    }

    public function updateItem($complainId, $action = false, $userId = null)
    {
        return $this->update('UPDATE products_complains SET status = "' . $action . '", fixed_by = NULL, date_fixed = NULL WHERE complain_id = ' . $complainId);
    }
}

?>