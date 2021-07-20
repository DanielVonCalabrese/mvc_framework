<h1>Users List</h1>
<table cellpadding="3" cellspacing="1" border="0" width="100%">
    <tr>
        <th width="35%">
            Username
        </th>
        <th width="35%">
            Email
        </th>
        <th width="20%">
            Phone
        </th>
        <th width="10%">
            Role
        </th>
    </tr>
<? foreach($this->items as $item): ?>
    <tr>
        <td>
            <?=$item['username']?>
        </td>
        <td>
            <?=$item['email']?>
        </td>
        <td>
            <?=$item['phone']?>
        </td>
        <td>
            <?=$item['role']?>
        </td>
    </tr>
<? endforeach; ?>
</table>