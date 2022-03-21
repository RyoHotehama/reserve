<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>

<div class="view mt-5">
  <h3>
    <?= h($date); ?>の予定
  </h3>
  <?php foreach ($schedules as $schedule) :?>
  <dl class="p-4">
    <dt class=>タイトル</dt>
    <dd><?= h($schedule['title']) ?></dd>
    <dt>開始</dt>
  
    <dd><?= h(date("Y年n月j日", strtotime($schedule['schedule_date'])))?></dd>
    <dt>終了</dt>
    <dd><?= h(date("Y年n月j日", strtotime($schedule['finish_date'])))?></dd>
    <dt>メモ</dt>
    <dd><?= h($schedule['body']) ?></dd>
    <a href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'edit', '?' => ['id' => 3]]); ?>">編集</a>
    <a href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'delete', '?' => ['id' => 3]]); ?>">削除</a>
  </dl>
  <?php endforeach; ?>
</div>