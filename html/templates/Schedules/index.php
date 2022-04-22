<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule[]|\Cake\Collection\CollectionInterface $schedules
 */
?>

<div class="container">
    <h3 class="mb-4">
        <a href="?ym=<?= $prev; ?>">&lt;</a>
        <?= $html_title; ?>
        <a href="?ym=<?= $next; ?>"> &gt;</a>
    </h3 class="text-success">
    <h3><?= $this->Flash->render() ?></h3>
    <div class="container wrap row">
        <h4 class="col">
            ようこそ<?= $authuser['name'] ?> さん
        </h4>
        <h4 class="col schedule">
            <a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'add'])?>" role="button">予定を追加</a>
        </h4>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
        <?php foreach ($weeks as $week) : ?>
            <?= $week; ?>
        <?php endforeach; ?>
    </table>
</div>