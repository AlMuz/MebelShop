<div class="mailer index large-9 medium-8 columns content">
  <h3 class="page-header"><?= __('Send email to all users') ?></h3>
  <?= $this->Form->create() ?>
    <div class="form-group">
      <fieldset>
        <?php
            echo $this->Form->control('subject',['class' => 'form-control','required' => true]);
            echo $this->Ck->input('message',['class' => 'form-control','required' => true]);

            // echo $this->Form->control('message',['class' => 'form-control','required' => true]);
        ?>
      </fieldset>
    <?= $this->Form->button(__('Send'),['class'=>'btn btn-success margintop10']) ?>
    </div>
  <?= $this->Form->end() ?>
</div>
