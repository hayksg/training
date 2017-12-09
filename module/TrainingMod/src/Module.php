<?php

namespace TrainingMod;

use Zend\Router\Http\Literal;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return [
            'router' => [
                'routes' => [
                    'training' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/welcome',
                        ],
                    ],
                ],
            ],
            'view_manager' => [
                'template_map' => [
                    'training/index/index' => __DIR__ . '/../view/training-mod/index/index.phtml',
                ],
            ],
        ];
    }
}
