<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $schedule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Schedules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="schedules form content">
            <?= $this->Form->create($schedule) ?>
            <fieldset>
                <legend><?= __('Edit Schedule') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('reserve_id');
                    echo $this->Form->control('schedule_date');
                    echo $this->Form->control('title');
                    echo $this->Form->control('body');
                    echo $this->Form->control('delflg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
