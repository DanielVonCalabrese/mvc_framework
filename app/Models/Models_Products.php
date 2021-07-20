<?

class Models_Products extends Model
{
    protected $_table = 'products';

    const WEB = 'web';
    const DESKTOP = 'desktop';

    public static function listProductTypes()
    {
        return array(
            self::WEB => self::WEB,
            self::DESKTOP => self::DESKTOP
        );
    }
    
    public function listProducts()
    {
        $items = array();
        foreach($this->getItems() as $key => $value)
        {
            $items[$value['product_id']] = $value['product_name'];
        }

        return $items;
    }

    public function getItemByName($productName)
    {
        return $this->selectRow('SELECT * FROM ' . $this->_table . ' WHERE product_name = "' . $productName . '"');
    }

    public function getItems()
    {
        return $this->selectAll('SELECT * FROM ' . $this->_table);
    }

    public function getItem($productId)
    {
        return $this->selectRow('SELECT * FROM ' . $this->_table . ' WHERE product_id = ' . $productId);
    }
    
    public function insertItem($data)
    {
        return $this->insert('INSERT INTO ' . $this->_table . ' (product_name, product_type) VALUES("' . $data['product_name'] . '","' . $data['product_type'] . '")');
    }
}

?>