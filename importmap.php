<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.12',
    ],
    '@stimulus-components/scroll-to' => [
        'version' => '5.0.1',
    ],
    'daisyui' => [
        'version' => '4.12.23',
    ],
    'postcss-js' => [
        'version' => '4.0.1',
    ],
    'picocolors' => [
        'version' => '1.1.1',
    ],
    'css-selector-tokenizer' => [
        'version' => '0.8.0',
    ],
    'culori/require' => [
        'version' => '4.0.1',
    ],
    'camelcase-css' => [
        'version' => '2.0.1',
    ],
    'postcss' => [
        'version' => '8.5.2',
    ],
    'fastparse' => [
        'version' => '1.1.2',
    ],
    'cssesc' => [
        'version' => '3.0.0',
    ],
    'nanoid/non-secure' => [
        'version' => '5.0.9',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
];
