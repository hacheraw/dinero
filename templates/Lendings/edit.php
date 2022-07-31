<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 * @var string[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lending->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lendings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lendings form content">
            <?= $this->Form->create($lending) ?>
            <fieldset>
                <legend><?= __('Edit Lending') ?></legend>
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
