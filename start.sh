#!/bin/bash

# Start PHP Artisan server in the background
echo "Starting PHP Artisan server..."
php artisan serve &
ARTISAN_PID=$!

# Start Vite development server with HMR in the background
echo "Starting Vite development server..."
npm run dev &
VITE_PID=$!

# Clean up function to terminate background processes when the script exits
cleanup() {
    echo "Shutting down servers..."
    kill $ARTISAN_PID
    kill $VITE_PID
    exit
}

# Register the cleanup function for when the script is terminated
trap cleanup SIGINT SIGTERM

# Wait for processes to finish
wait