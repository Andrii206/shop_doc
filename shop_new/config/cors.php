<?php

return [
    'paths' => ['api/*'], // Шляхи, на яких буде застосовуватися CORS
    'allowed_methods' => ['*'], // Дозволені HTTP-методи
    'allowed_origins' => ['*'], // Дозволені домени
    'allowed_headers' => ['*'], // Дозволені HTTP-заголовки
    'exposed_headers' => [], // Відкриті HTTP-заголовки
    'max_age' => 0, // Максимальний вік кешу CORS-запитів
    'supports_credentials' => false, // Чи підтримуються CORS-запити з автентифікацією
];
