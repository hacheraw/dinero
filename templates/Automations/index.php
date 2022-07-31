<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Automation[]|\Cake\Collection\CollectionInterface $automations
 */
?>
<div class="automations index content">
    <?= $this->Html->link(__('New Automation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Automations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('cron') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('aplied_on') ?></th>
                    <th>Calculations</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($automations as $automation): ?>
                <tr>
                    <td><?= $automation->has('person') ? $this->Html->link($automation->person->name, ['controller' => 'People', 'action' => 'view', $automation->person->id]) : '' ?></td>
                    <td><?= h($automation->name) ?></td>
                    <td><?= $this->Number->format($automation->amount) ?></td>
                    <td><?= h($automation->cron) ?></td>
                    <td><?= h($automation->active) ?></td>
                    <td><?= h($automation->aplied_on) ?></td>
                    <td>
                        <p><strong>IsDue:</strong> <?= $automation->is_due ? 'Yes' : 'No' ?></p>
                        <p><strong>Prev:</strong> <?= $automation->previous_run_date->format('Y-m-d H:i:s') ?></p>
                        <p><strong>Next:</strong> <?= $automation->next_run_date->format('Y-m-d H:i:s') ?></p>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $automation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $automation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $automation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $automation->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
