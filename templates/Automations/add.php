<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Automation $automation
 * @var \Cake\Collection\CollectionInterface|string[] $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Automations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="automations form content">
            <?= $this->Form->create($automation) ?>
            <fieldset>
                <legend><?= __('Add Automation') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $people]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('cron');
                    echo $this->Form->control('active');
                    echo $this->Form->control('aplied_on', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
