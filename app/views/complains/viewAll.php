<h1>Complains</h1>

<? if($this->items != null): ?>
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
            <? if($this->user['role'] == 'developer' || $this->user['role'] == 'admin'): ?>
                <th width="15%">
                    Set
                </th>
            <? endif; ?>
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
                <?=$item['username']?>
            </td>
            <td align="center">
                <?=$item['status']?>
            </td>
            <? if($this->user['role'] == 'developer' || $this->user['role'] == 'admin'): ?>
                <td>
                    <? if($item['status'] == 'fixed'): ?>
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'readed'))?>">readed</a> |
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'unfounded'))?>">unfounded</a>
                    <? elseif($item['status'] == 'unreaded'): ?>
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'unfounded'))?>">unfounded</a> |
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'fixed', 'user_id' => $this->user['user_id']))?>">fixed</a>
                    <? elseif($item['status'] == 'unfounded'): ?>
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'readed'))?>">readed</a> |
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'fixed', 'user_id' => $this->user['user_id']))?>">fixed</a>
                    <? elseif($item['status'] == 'readed'): ?>
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'unfounded'))?>">unfounded</a> |
                        <a href="<?=$this->helper->myUrl('set', 'complains', array('complainId' => $item['complain_id'], 'action' => 'fixed', 'user_id' => $this->user['user_id']))?>">fixed</a>
                    <? endif; ?>
                </td>
            <? endif; ?>
        </tr>
    <? endforeach; ?>
    </table>
<? else: ?>
    No complains for now!
<? endif; ?>