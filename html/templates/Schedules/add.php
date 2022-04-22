<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<div class="add-form text-center mt-5">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend>
            <?= __('予定の追加') ?>
            <?= $this->Flash->render() ?>
        </legend>
        <div class="main_form">
            <div class ="format-label">
                <?= $this->Form->label('タイトル') ?> 
            </div>
            <div class ="format">
                <?= $this->Form->input('title') ?>
            </div>
            <div class ="format-label">
                <?= $this->Form->label('予定開始日時') ?>
            </div>
            <div class ="format">
                <?= $this->Form->input('schedule_date', array(
                'type' => 'datetime-local',
                'default' => (!empty($date)) ? date('Y-m-d\TH:i', strtotime($date)): "",
                )); ?>
            </div>
            <div class ="format-label">
                <?= $this->Form->label('予定終了日時') ?>
            </div>
            <div class ="format">
                <?= $this->Form->input('finish_date', array(
                'type' => 'datetime-local',
                )) ?>
            </div>
            <div class ="format-label">
                <?= $this->Form->label('内容') ?>
            </div>
            <div class ="format">
                <?= $this->Form->input('body') ?>
            </div>
        </div>
    </fieldset>
    <div class="add_button">
        <?= $this->Form->button(__('追加'), ['class' => 'btn btn-primary']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>