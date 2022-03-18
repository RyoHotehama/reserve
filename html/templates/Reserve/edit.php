<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserve $reserve
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reserve->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reserve->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reserve'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reserve form content">
            <?= $this->Form->create($reserve) ?>
            <fieldset>
                <legend><?= __('Edit Reserve') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('registration_date');
                    echo $this->Form->control('delflg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
