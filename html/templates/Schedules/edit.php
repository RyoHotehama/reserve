<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="edit_form">
  <?= $this->Form->create($data, [
    'type' => 'post'
  ]) ?>
  <fieldset>
    <legend>
      <?= __('編集') ?>
      <?= $this->Flash->render() ?>
    </legend>
    <?php foreach ($schedules as $schedule): ?>
    <div class="main_form">
      <?= $this->Form->label('タイトル') ?>
      <?= $this->Form->input('title', array('value' => $schedule['title'],)) ?>
      <?= $this->Form->label('予定開始日時') ?>
      <?= $this->Form->input('schedule_date', array('type' => 'datetime-local',
      'value' => date('Y-m-d\TH:i', strtotime($schedule['schedule_date'])),)); ?>
      <?= $this->Form->label('予定終了日時') ?>
      <?= $this->Form->input('finish_date', array('type' => 'datetime-local',
      'value' => date('Y-m-d\TH:i', strtotime($schedule['finish_date'])),)); ?>
      <?= $this->Form->label('内容') ?>
      <?= $this->Form->input('body', array('value' => $schedule['body'],)) ?>
    </div>
    <div class="add_button">
    <?= $this->Form->button(__('変更'), ['class' => 'button']); ?>  
    <?= $this->Form->end() ?>
    </div>
    <?php endforeach; ?>
  </fieldset>
</div>
