<?php

namespace Questioner;

use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\QuestionController::class => InvokableFactory::class,
            Controller\CorrectionController::class => InvokableFactory::class,
            Controller\UserController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'question' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/question[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\QuestionController::class,
                        'action'     => 'index',
                    ],
                ]
            ],
            'correction' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/correction[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CorrectionController::class,
                        'action'     => 'index',
                    ],
                ]
            ],
            'user' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ]
            ]
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'questioner' => __DIR__.'/../view'
        ]
    ]
];