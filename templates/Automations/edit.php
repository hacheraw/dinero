<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Automation $automation
 * @var string[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $automation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $automation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Automations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="automations form content">
            <?= $this->Form->create($automation) ?>
            <fieldset>
                <legend><?= __('Edit Automation') ?></legend>
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
