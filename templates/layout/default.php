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
<html data-bs-theme="<?= isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'dark' : 'light' ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

       <!-- font awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!--bootstrap css-->

    <?= $this->Html->css("https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css") ?>

    <!-- jquery -->
    <?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>

    <!-- datatable -->
    <?= $this->Html->css('https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css') ?>
    
    <!-- custom css -->
    <!-- <?= $this->Html->css("custom.css") ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    



 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <?= $this->Html->link('Emerit', ['controller' => 'Pages', 'action' => 'landing'], ['class' => 'navbar-brand']) ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($this->Identity->isLoggedIn()): ?>
            <?php if ($this->Identity->get('role') === 'admin'): ?>
                <!-- Admin Navigation -->
                <li class="nav-item">
                    <?= $this->Html->link('Dashboard', ['controller' => 'Pages', 'action' => 'admin_dashboard'], ['class' => 'nav-link']) ?>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Controls
                    </a>
                    <ul class="dropdown-menu">
                        <?= $this->Html->link('User Management', ['controller' => 'Users', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('Merit Letter Requests', ['controller' => 'MeritLetterRequests', 'action' => 'AdminIndex'], ['class' => 'dropdown-item']) ?>
                    </ul>
                </li>
            <?php else: ?>
                <!-- Student Navigation -->
                <li class="nav-item">
                    <?= $this->Html->link('Dashboard', ['controller' => 'Pages', 'action' => 'user_dashboard'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Merit
                    </a>
                    <ul class="dropdown-menu">
                        <?= $this->Html->link('Merit Points', ['controller' => 'StudentMerits', 'action' => 'myPoints'], ['class' => 'dropdown-item']) ?> <!-- havent done yet -->
                        <?= $this->Html->link('Activities History', ['controller' => 'Activities', 'action' => 'myActivities'], ['class' => 'dropdown-item']) ?> <!-- havent done yet -->
                        <?= $this->Html->link('Achievements', ['controller' => 'Students', 'action' => 'achievements'], ['class' => 'dropdown-item']) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link('Request Merit Letter', ['controller' => 'MeritLetterRequests', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('Check Request Status', ['controller' => 'MeritLetterRequests', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('View Activities', ['controller' => 'Activities', 'action' => 'available'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('My Profile', ['controller' => 'Students', 'action' => 'profile'], ['class' => 'nav-link']) ?>
                </li>
                

            <?php endif; ?>
        <?php endif; ?>
        <div class="d-flex align-items-center">
                    <!-- Dark mode toggle button -->
                    <button class="btn btn-link text-white me-3" id="darkModeToggle" aria-label="Toggle dark mode">
                        <i class="fas fa-moon fs-5"></i>
                    </button>
        </div>
      </ul>
       
      <!-- Auth Links -->
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
  </div>
</nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>

        
    </main>
    <footer class = "site-footer bg-dark text-light mt-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-6">
                    <p class="mb-0 fs-6">&copy; <?= date('Y') ?> Emerit. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0 fs-6">Powered by CakePHP</p>
                </div>
            </div>
        </div>
    </footer>

  

    <<!-- Dark mode JavaScript -->
    <?php $this->append('script'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const darkModeToggle = document.getElementById('darkModeToggle');
                const html = document.documentElement;
                
                // Check for saved dark mode preference
                const darkMode = localStorage.getItem('darkMode') === 'true';
                if (darkMode) {
                    html.setAttribute('data-bs-theme', 'dark');
                    darkModeToggle.innerHTML = '<i class="fas fa-sun fs-5"></i>';
                }
                
                // Toggle dark mode
                darkModeToggle.addEventListener('click', function() {
                    const isDark = html.getAttribute('data-bs-theme') === 'dark';
                    const newTheme = isDark ? 'light' : 'dark';
                    html.setAttribute('data-bs-theme', newTheme);
                    localStorage.setItem('darkMode', !isDark);
                    darkModeToggle.innerHTML = isDark ? 
                        '<i class="fas fa-moon fs-5"></i>' : 
                        '<i class="fas fa-sun fs-5"></i>';
                });
            });
        </script>
        <?php $this->end(); ?>
        <!--bootstrap js-->
      <?= $this->Html->script([
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'
]) ?>
    <!-- datatable -->
    <?= $this->Html->script('https://code.jquery.com/jquery-3.7.1.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js') ?>
    <?= $this->fetch('script') ?>

    


</body>

</html>