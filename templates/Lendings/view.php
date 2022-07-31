<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lending'), ['action' => 'edit', $lending->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lending'), ['action' => 'delete', $lending->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lendings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lending'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lendings view content">
            <h3><?= h($lending->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $lending->has('person') ? $this->Html->link($lending->person->name, ['controller' => 'People', 'action' => 'view', $lending->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($lending->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($lending->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lending->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($lending->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($lending->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($lending->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Automatic') ?></th>
                    <td><?= $lending->automatic ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
