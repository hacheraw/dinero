<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Automation $automation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Automation'), ['action' => 'edit', $automation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Automation'), ['action' => 'delete', $automation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $automation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Automations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Automation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="automations view content">
            <h3><?= h($automation->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $automation->has('person') ? $this->Html->link($automation->person->name, ['controller' => 'People', 'action' => 'view', $automation->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($automation->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cron') ?></th>
                    <td><?= h($automation->cron) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($automation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($automation->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($automation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($automation->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Aplied On') ?></th>
                    <td><?= h($automation->aplied_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $automation->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
