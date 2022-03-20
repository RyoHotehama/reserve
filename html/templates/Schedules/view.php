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
  <dl class="p-4">
    <dt class="h5">タイトル</dt>
    <dd>あああああ</dd>
    <dt>開始</dt>
    <dd>3月20日10時</dd>
    <dt>終了</dt>
    <dd>3月20日20時</dd>
    <dt>メモ</dt>
    <dd>あああああ</dd>
    <a href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'edit', '?' => ['id' => 3]]); ?>">編集</a>
    <a href ="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'delete', '?' => ['id' => 3]]); ?>">削除</a>
  </dl>
</div>