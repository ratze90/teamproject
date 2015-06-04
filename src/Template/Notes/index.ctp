<br>
<div class="col-lg-2 col-md-2 col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Neue Notiz anlegen'), ['action' => 'add']) ?></li>
    </ul>
</div>

<?php
$items_array = array();
foreach ($items as $item) {
    $items_array[$item->id] = $item->name;
}
?>
<div class="col-lg-10 col-md-10 col-xs-10">
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
        <thead>
        <th>#</th>
        <th>Inhalt</th>
        <th>Tool (gegebenenfalls)</th>
        <th class="actions"><?= __('Aktionen') ?></th>
        </thead>
        <tbody>
        <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= $this->Number->format($note->id) ?></td>
                <td><?= h($note->content) ?></td>
                <td><?php if (isset($note->item_id)) { echo $items_array[$note->item_id]; } ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $note->id]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $note->id], ['confirm' => __('Bist du sicher?')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('vorherige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('nächste') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

