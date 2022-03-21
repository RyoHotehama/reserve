<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<div class="add-form">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend>
            <?= __('予定の追加') ?>
            <?= $this->Flash->render() ?>
        </legend>
        <div class="main_form">
            <?= $this->Form->label('タイトル') ?>
            <?= $this->Form->input('title') ?>
            <?= $this->Form->label('予定開始日時') ?>
            <?= $this->Form->input('schedule_date', array(
                'type' => 'datetime-local',
            )); ?>
            <?= $this->Form->label('予定終了日時') ?>
            <?= $this->Form->input('finish_date', array(
                'type' => 'datetime-local',
            )) ?>
            <?= $this->Form->label('内容') ?>
            <?= $this->Form->input('body') ?>
        </div>
    </fieldset>
    <div class="add_button">
        <?= $this->Form->button(__('追加'), ['class' => 'button']); ?>
    </div>
</div>