<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],  // Asegúrate de incluir rutas que necesiten acceso CORS
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],  // Permite cualquier origen en desarrollo
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
