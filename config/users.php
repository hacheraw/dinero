<?php

/**
 * Se puede ver un ejemplo con todas las claves en:
 * @see vendor/cakedc/users/config/users.php
 *
 * Este archivo sólo se carga si está descomentada la línea de Aplication::bootstrap() en src/Application.php
 */
return [
    //'Auth.AuthenticationComponent.loginRedirect' => ['plugin' => false, 'controller' => 'Excursions', 'action' => 'index'],
    'Users' => [
        'Registration' => [
            'active' => false,
            'allowLoggedIn' => false, // ! Para poder acceder a /register aun estando logeados
            'agencies' => [
                'active' => false,
            ]
        ],
    ]
];
