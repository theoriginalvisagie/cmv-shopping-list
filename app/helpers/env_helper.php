<?php
    function loadEnv($envFile) {
        if (!file_exists($envFile)) {
            throw new Exception("Environment file not found: $envFile");
        }
    
        // Read the .env file line by line
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
        foreach ($lines as $line) {
            // Ignore comments and empty lines
            if (strpos(trim($line), '#') === 0 || empty($line)) {
                continue;
            }
    
            // Split by '=' sign
            list($key, $value) = explode('=', $line, 2);
            
            // Trim spaces around the key and value
            $key = trim($key);
            $value = trim($value);
    
            // Set the environment variable using putenv
            putenv("$key=$value");
        }
    }
?>