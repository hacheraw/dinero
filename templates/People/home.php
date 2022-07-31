<div class="home people">
    <?php foreach ($people as $person) : ?>
        <div class="person text-center">
            <h2 class="name"><?= $this->Html->link($person->name, ['action' => 'view', $person->id]) ?></h2>
            <h3 class="balance"><?= $person->balance ?>€</h3>
            <div class="actions">
                <?= $this->Html->link('Deuda', ['controller' => 'lendings', 'action' => 'add', $person->id, 'debt']) ?>
                <?= $this->Html->link('Pago', ['controller' => 'lendings', 'action' => 'add', $person->id, 'payment']) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
