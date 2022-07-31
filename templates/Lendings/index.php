<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>
<div class="lendings index content">
    <?= $this->Html->link(__('New Lending'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lendings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('automatic') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lendings as $lending): ?>
                <tr>
                    <td><?= $this->Number->format($lending->id) ?></td>
                    <td><?= $lending->has('person') ? $this->Html->link($lending->person->name, ['controller' => 'People', 'action' => 'view', $lending->person->id]) : '' ?></td>
                    <td><?= h($lending->name) ?></td>
                    <td><?= $this->Number->format($lending->amount) ?></td>
                    <td><?= h($lending->type) ?></td>
                    <td><?= h($lending->automatic) ?></td>
                    <td><?= h($lending->created) ?></td>
                    <td><?= h($lending->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lending->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lending->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lending->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id)]) ?>
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
