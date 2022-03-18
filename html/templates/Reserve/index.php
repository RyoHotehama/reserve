<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserve[]|\Cake\Collection\CollectionInterface $reserve
 */
?>
<div class="reserve index content">
    <?= $this->Html->link(__('New Reserve'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reserve') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('registration_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th><?= $this->Paginator->sort('delflg') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserve as $reserve): ?>
                <tr>
                    <td><?= $this->Number->format($reserve->id) ?></td>
                    <td><?= $reserve->has('user') ? $this->Html->link($reserve->user->name, ['controller' => 'Users', 'action' => 'view', $reserve->user->id]) : '' ?></td>
                    <td><?= h($reserve->registration_date) ?></td>
                    <td><?= h($reserve->created) ?></td>
                    <td><?= h($reserve->updated) ?></td>
                    <td><?= $this->Number->format($reserve->delflg) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reserve->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserve->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserve->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserve->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
