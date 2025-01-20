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
        Emerit - Student Merit System:
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
                        <?= $this->Html->link('Activities History', ['controller' => 'Activities', 'action' => 'myActivities'], ['class' => 'dropdown-item']) ?> <!-- completed -->
                        <?= $this->Html->link('Achievements', ['controller' => 'Pages', 'action' => 'achievements'], ['class' => 'dropdown-item']) ?>
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
                <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?> <!-- completed -->
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
            <div class="flash-messages">
                <?php
                $flashMessages = $this->Flash->render();
                if ($flashMessages):
                    $dom = new DOMDocument();
                    $dom->loadHTML(mb_convert_encoding($flashMessages, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $messages = $dom->getElementsByTagName('div');
                    
                    foreach ($messages as $message):
                        $messageText = $message->textContent;
                        $class = $message->getAttribute('class');
                        $type = strpos($class, 'success') !== false ? 'success' : 
                               (strpos($class, 'error') !== false ? 'danger' : 
                               (strpos($class, 'warning') !== false ? 'warning' : 'info'));
                ?>
                    <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <?php if ($type === 'success'): ?>
                                <i class="fas fa-check-circle me-2"></i>
                            <?php elseif ($type === 'danger'): ?>
                                <i class="fas fa-exclamation-circle me-2"></i>
                            <?php elseif ($type === 'warning'): ?>
                                <i class="fas fa-exclamation-triangle me-2"></i>
                            <?php else: ?>
                                <i class="fas fa-info-circle me-2"></i>
                            <?php endif; ?>
                            <?= $messageText ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>

        
    </main>
    <footer class="site-footer bg-dark py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Company Info -->
            <div class="col-lg-4">
                <h5 class="footer-heading mb-3">Emerit</h5>
                <p class="footer-text mb-4">Empowering student achievements through digital merit recognition.</p>
                <div class="social-links">
                    <a href="#" class="social-link me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-4">
                <h5 class="text-white mb-3">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#" class="text-muted">About Us</a></li>
                    <li><a href="#" class="text-muted">Contact</a></li>
                    <li><a href="#" class="text-muted">Privacy Policy</a></li>
                    <li><a href="#" class="text-muted">Terms of Service</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-4">
                <h5 class="text-white mb-3">Contact</h5>
                <ul class="list-unstyled text-muted">
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@emerit.com</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (60) 123-456-789</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> Puncak Perdana, Malaysia</li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="row mt-4 pt-3 border-top border-secondary">
            <div class="col-md-6">
                <p class="mb-0 text-muted">&copy; <?= date('Y') ?> Emerit. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0 text-muted">Powered by CakePHP</p>
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