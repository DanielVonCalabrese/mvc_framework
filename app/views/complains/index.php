<h1>My Complains</h1>

<? if(!empty($this->items)): ?>
    <table cellpadding="3" cellspacing="1" border="0" width="100%">
        <tr>
            <th width="20%">
                Complain
            </th>
            <th width="15%">
                Product
            </th>
            <th width="5%">
                Product Version
            </th>
            <th width="20%">
                Date Added
            </th>
            <th width="20%">
                Date Fixed
            </th>
            <th width="15%">
                Fixed By
            </th>
            <th width="5%">
                Status
            </th>
        </tr>
    <? foreach($this->items as $item): ?>
        <tr>
            <td>
                <?=$item['complain_desc']?>
            </td>
            <td>
                <?=$item['product_name']?>
            </td>
            <td>
                <?=$item['product_version']?>
            </td>
            <td align="center">
                <?=$this->helper->myDateFromDb($item['date_added'])?>
            </td>
            <td align="center">
                <? if($item['date_fixed'] != '0000-00-00 00:00:00'): ?>
                    <?=$this->helper->myDateFromDb($item['date_fixed'])?>
                <? else: ?>
                    <?='-'?>
                <? endif; ?>
            </td>
            <td>
                <?=$item['username'] ? $item['username'] : '-'?>
            </td>
            <td align="center">
                <?=$item['status']?>
            </td>
        </tr>
    <? endforeach; ?>
    </table>
<? else: ?>
    No complains for now!
<? endif; ?>