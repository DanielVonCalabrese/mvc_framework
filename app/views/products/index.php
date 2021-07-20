<h1>Products List</h1>
<table cellpadding="3" cellspacing="1" border="0" width="100%">
    <tr>
        <th width="80%">
            Product Name
        </th>
        <th width="20%">
            Product Type
        </th>
    </tr>
<? foreach($this->items as $item): ?>
    <tr>
        <td>
            <?=$item['product_name']?>
        </td>
        <td>
            <?=$item['product_type']?>
        </td>
    </tr>
<? endforeach; ?>
</table>