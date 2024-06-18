<?php

$host = 'localhost';
$port = 8000;
$docroot = __DIR__ . '/public';

// Verifica se la directory public esiste
if (!is_dir($docroot)) {
    fwrite(STDERR, "\033[0;31mError: Directory 'public' not found.\033[0m\n");
    exit(1);
}

// Messaggio di avvio del server
echo "\033[0;32mStarting server at http://$host:$port\033[0m\n";
echo "\033[0;34mDocument root is $docroot\033[0m\n";
echo "Press Ctrl-C to quit.\n";

// Comando per avviare il server
$command = sprintf('php -S %s:%d -t %s', $host, $port, $docroot);

// Esegui il comando
passthru($command);
