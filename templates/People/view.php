<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people view content">
            <h3><?= h($person->name) ?></h3>
            <div class="related">
                <h4><?= __('Related Lendings') ?></h4>
                <?php if (!empty($person->lendings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Automatic') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->lendings as $lendings) : ?>
                        <tr>
                            <td><?= h($lendings->name) ?></td>
                            <td><?= h($lendings->amount) ?></td>
                            <td><?= h($lendings->type) ?></td>
                            <td><?= h($lendings->automatic) ?></td>
                            <td><?= h($lendings->created) ?></td>
                            <td><?= h($lendings->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lendings', 'action' => 'view', $lendings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lendings', 'action' => 'edit', $lendings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lendings', 'action' => 'delete', $lendings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Automations') ?></h4>
                <?php if (!empty($person->automations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Cron') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Aplied On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->automations as $automations) : ?>
                        <tr>
                            <td><?= h($automations->name) ?></td>
                            <td><?= h($automations->amount) ?></td>
                            <td><?= h($automations->cron) ?></td>
                            <td><?= h($automations->active) ?></td>
                            <td><?= h($automations->created) ?></td>
                            <td><?= h($automations->modified) ?></td>
                            <td><?= h($automations->aplied_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Automations', 'action' => 'view', $automations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Automations', 'action' => 'edit', $automations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Automations', 'action' => 'delete', $automations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $automations->name)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
