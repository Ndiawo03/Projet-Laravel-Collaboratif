# Dev setup PowerShell script
Write-Host 'Starting dev setup...' -ForegroundColor Cyan

# Copy .env if missing
if (-Not (Test-Path .env)) {
    Copy-Item .env.example .env
    Write-Host 'Copied .env.example -> .env'
} else {
    Write-Host '.env already exists'
}

# Ensure database folder exists
if (-Not (Test-Path database)) { New-Item -ItemType Directory database | Out-Null }

# Create sqlite file if missing
if (-Not (Test-Path database\database.sqlite)) {
    New-Item -ItemType File database\database.sqlite | Out-Null
    Write-Host 'Created database/database.sqlite'
} else {
    Write-Host 'database/database.sqlite already exists'
}

Write-Host 'Generating app key (if missing)...'
php artisan key:generate --ansi | Out-Null

Write-Host 'Running migrations and seeders (force)'
php artisan migrate --force --seed --ansi

Write-Host 'Dev setup complete.' -ForegroundColor Green
