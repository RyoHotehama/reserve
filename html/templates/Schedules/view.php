<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>

<div class="view mt-5">
  <h3 class="text-center">
    <?= h($date); ?>の予定
  </h3>
  <h4 class="text-center">
    <a class="btn btn-primary" href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'add', '?' => ['date' => $today]]); ?>" role="button">追加</a>
  </h4>
  <?php foreach ($schedules as $schedule) :?>
  <dl class="p-4">
    <dt class=>タイトル</dt>
    <dd><?= h($schedule['title']) ?></dd>
    <dt>開始</dt>
  
    <dd><?= h(date("Y年n月j日 H時i分", strtotime($schedule['schedule_date'])))?></dd>
    <dt>終了</dt>
    <dd><?= h(date("Y年n月j日 H時i分", strtotime($schedule['finish_date'])))?></dd>
    <dt>メモ</dt>
    <dd><?= h($schedule['body']) ?></dd>
    <div class="btn-wrap">
    <a class="btn btn-primary" href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'edit', '?' => ['id' => $schedule['id']]]); ?>" role="button">編集</a>
    <a class="btn btn-primary" href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'delete', '?' => ['id' => $schedule['id']]]); ?>" role="button">削除</a>
    </div>
  </dl>
  <?php endforeach; ?>
</div>