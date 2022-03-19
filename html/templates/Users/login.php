<div class="users form mt-5">
  <?= $this->Form->create() ?>
    <fieldset class="form">
      <legend class="text-center">
        ログイン
      </legend>
      <?= $this->Flash->render() ?>
      <div class="main_form">
        <?= $this->Form->label('メールアドレス') ?> 
        <?= $this->Form->input('email') ?>
        <?= $this->Form->label('パスワード') ?> 
        <?= $this->Form->input('password') ?>
      </div>
    </fieldset>
    <div class="login">
    <?= $this->Form->button(__('ログイン'), ['class' => 'button']); ?>
    </div>
  <?= $this->Form->end() ?>
</div>