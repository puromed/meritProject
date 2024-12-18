<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--bootstrap css-->

    <?= $this->Html->css("https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css") ?>
    
    <!-- custom css -->
    <?= $this->Html->css("custom.css") ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <?= $this->Html->link('Emerit', ['controller' => 'Pages', 'action' => 'dashboard'], ['class' => 'navbar-brand']) ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?= $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'dashboard'], ['class' => 'nav-link active']) ?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
          </a>
          <ul class="dropdown-menu">
            <?= $this->Html->link('Students', ['controller' => 'Students', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Student Merits', ['controller' => 'StudentMerits', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Activities', ['controller' => 'Activities', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Merits', ['controller' => 'Merits', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
          </ul>
        </li>
      </ul>
      <!-- auth links -->
      <ul class="navbar-nav">
        <?php if ($this->Identity->isLoggedIn()): ?>
            <li class="nav-item">
                <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Register', ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
            </li>
        <?php endif; ?>
      </ul>
    </div>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

     

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

    <!--bootstrap js-->
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') ?>
</body>
</html>
