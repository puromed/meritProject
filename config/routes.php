<?php
// filepath: /c:/laragon/www/meritProject/config/routes.php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    // Set the default route class
    $routes->setRouteClass(DashedRoute::class);

    // Define the main scope
    $routes->scope('/', function (RouteBuilder $builder): void {
        // Landing page before login
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'landing']);

        // User dashboard route
        $builder->connect('/dashboard', ['controller' => 'Pages', 'action' => 'user_dashboard']);

        // Admin dashboard route
        $builder->connect('/admin/dashboard', ['controller' => 'Pages', 'action' => 'admin_dashboard']);

        // Connect '/pages/*' to Pages controller's display action
        $builder->connect('/pages/*', 'Pages::display');

        // Connect '/student-merits' to StudentMerits controller
        $builder->connect('/student-merits', ['controller' => 'StudentMerits']);

        // Connect '/achievements' to Pages controller's achievements action
        $builder->connect('/achievements', ['controller' => 'Pages', 'action' => 'achievements']);

       

        /**
         * Admin and student merit letter request routes
         */

         // User/Student-prefixed routes
         $builder->connect('/meritletterrequests', [
            'controller' => 'MeritLetterRequests', 
            'action'=>'index'
         ]);

        $builder->connect('/meritletterrequests/add', [
                'controller' => 'MeritLetterRequests', 
                'action'=>'add'
        ]);

        $builder->connect('/meritletterrequests/edit/{id}', [
                'controller' => 'MeritLetterRequests',
                'action'=>'edit'
        ]);

        // Admin-prefixed routes
        $builder->prefix('admin', function (RouteBuilder $adminBuilder) {
            // Connect '/admin/merit-letter-requests' to adminIndex action
            $adminBuilder->connect('/meritletterrequests', [
                'controller' => 'MeritLetterRequests',
                'action' => 'adminIndex'
            ]);

            // Connect '/admin/merit-letter-requests/approve/*' to approve action
            $adminBuilder->connect('/meritletterrequests/approve/*', [
                'controller' => 'MeritLetterRequests',
                'action' => 'approve'
            ]);

            // Connect '/admin/merit-letter-requests/deny/*' to deny action
            $adminBuilder->connect('/meritletterrequests/deny/*', [
                'controller' => 'MeritLetterRequests',
                'action' => 'deny'
            ]);
        });


        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * It is NOT recommended to use fallback routes after your initial prototyping phase!
         * See https://book.cakephp.org/5/en/development/routing.html#fallbacks-method for more information
         */
        $builder->fallbacks();
    });
};