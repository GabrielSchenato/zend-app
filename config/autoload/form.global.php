<?php

use CodeEmailMKT\Infrastructure\View\HelperPluginManagerFactory;
use Zend\Form\ConfigProvider;
use Zend\Stdlib\ArrayUtils;
use Zend\View\HelperPluginManager;

$forms = [
    'dependencies' => [
        'alias' => [],
        'invokables' => [],
        'factories' => [
        HelperPluginManager::class => HelperPluginManagerFactory::class,
        ]
    ],
    'view_helpers' => [
        'alias' => [],
        'invokables' => [],
        'factories' => [
        ]
    ]
];
$configProviderForm = (new ConfigProvider())->__invoke();
return ArrayUtils::merge($configProviderForm, $forms);
