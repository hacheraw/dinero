<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 * @var \Cake\Collection\CollectionInterface|string[] $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lendings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lendings form content">
            <?= $this->Form->create($lending) ?>
            <fieldset>
                <legend><?= __('Add Lending') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $people]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
