<?php

// Define a constant for the base directory
define('BASE_DIR', __DIR__);

// Generate a new AuthKey
$authKey = bin2hex(random_bytes(4));

// Sanitize and normalize the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = rtrim($requestUri, '/');
$requestUri = filter_var($requestUri, FILTER_SANITIZE_URL);

if ($requestUri === '' || $requestUri === '/index.php') {
    $requestUri = '/';
}

// Initialize query parameters array
$queryParams = [];

// Check if QUERY_STRING is set
if (isset($_SERVER['QUERY_STRING'])) {
    // Parse query parameters
    parse_str($_SERVER['QUERY_STRING'], $queryParams);
}

// If AuthKey is not present in the query parameters, append it and redirect
if (!isset($queryParams['AuthKey'])) {
    $queryParams['AuthKey'] = $authKey;
    $newQuery = http_build_query($queryParams);
    header("Location: $requestUri?$newQuery");
    exit;
}

// Allowed routes
$routes = [
    '' => 'mainPage.php',
    '/' => 'mainPage.php',
    'unescoPeaceProgramInfo' => 'JuniorPeacePolicy.php',
    'unescoSummerProgramInfo' => 'SummerDiplomacyPolicy.php',
    'JuniorPeaceFormApplication' => 'JuniorPeace.php',
    'SummerDiplomacyFormApplication' => 'SummerDiplomacy.php',
    'SuccessfulRegisteration' => 'signUpSuccessful.php',
    'secretAdmin' => 'login.php',
    'applicationFormAdminPanel' => 'admin_panel.php',
    'JuniorPeace' => 'JuniorPeace.php',
    'contact' => 'contact.php',
];

// Function to include the appropriate file if it exists
function includeFile($file) {
    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(404);
        require BASE_DIR . '/error404.php';
    }
}

// Check if the request is in the allowed routes
$route = ltrim($requestUri, '/');
if (array_key_exists($route, $routes)) {
    $fileToInclude = BASE_DIR . '/' . $routes[$route];
    includeFile($fileToInclude);
} else {
    http_response_code(404);
    require BASE_DIR . '/error404.php';
}


?>
