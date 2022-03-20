<div class="header p-3">
  <div class="top-label">
    <a href="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'index']); ?>" class="top mx-4 h5">スケジュール</a>
    <a href="<?= $this->Url->build(['controller' => 'Reserve', 'action' => 'index']); ?>" class="top mx-4 h5">予約</a>
    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>" class="top mx-4 h5">ログアウト</a>
  </div>
</div>