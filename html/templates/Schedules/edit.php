<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="edit_form text-center mt-5">
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
      <div class ="format-label">
        <?= $this->Form->label('タイトル') ?>
      </div>
      <div class ="format">
      <?= $this->Form->input('title', array('value' => $schedule['title'],)) ?>
      </div>
      <div class ="format-label">
      <?= $this->Form->label('予定開始日時') ?>
      </div>
      <div class ="format">
      <?= $this->Form->input('schedule_date', array('type' => 'datetime-local',
      'value' => date('Y-m-d\TH:i', strtotime($schedule['schedule_date'])),)); ?>
      </div>
      <div class ="format-label">
      <?= $this->Form->label('予定終了日時') ?>
      </div>
      <div class ="format">
      <?= $this->Form->input('finish_date', array('type' => 'datetime-local',
      'value' => date('Y-m-d\TH:i', strtotime($schedule['finish_date'])),)); ?>
      </div>
      <div class ="format-label">
      <?= $this->Form->label('内容') ?>
      </div>
      <div class ="format">
      <?= $this->Form->input('body', array('value' => $schedule['body'],)) ?>
      </div>
    </div>
    <div class="add_button">
    <?= $this->Form->button(__('変更'), ['class' => 'btn btn-primary']); ?>  
    <?= $this->Form->end() ?>
    </div>
    <?php endforeach; ?>
  </fieldset>
</div>
