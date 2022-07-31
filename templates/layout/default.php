<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Dinero | <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Los</span>DINERO</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('People', ['plugin' => false, 'controller' => 'People', 'action' => 'index']) ?>
            <?= $this->Html->link('Lendings', ['plugin' => false, 'controller' => 'Lendings', 'action' => 'index']) ?>
            <?= $this->Html->link('Automations', ['plugin' => false, 'controller' => 'Automations', 'action' => 'index']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>
