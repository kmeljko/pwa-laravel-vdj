@echo off
echo Pokrecem Laravel setup...

:: 1. Provera da li postoji composer (mozes podesiti putanju ako nije u PATH)
where composer >nul 2>&1
if errorlevel 1 (
    echo Composer nije pronadjen u PATH. Molim te instaliraj Composer i dodaj ga u PATH.
    pause
    exit /b 1
)

:: 2. Instaliraj dependencije
echo Instaliram composer dependencije...
composer install

:: 3. Kopiraj .env fajl ako ne postoji
if not exist .env (
    echo Kopiram .env fajl...
    copy .env.example .env
)

:: 4. Generisi app key
echo Generisem aplikacioni key...
php artisan key:generate

:: 5. Pokreni migracije i seede
echo Pokrecem migracije i seede...
php artisan migrate --seed --force

:: 6. Napravi symbolic link za storage
echo Pravimo symbolic link za storage...
php artisan storage:link

:: 7. Pokreni Laravel development server
echo Pokrecem Laravel server na localhost:8000...
start php artisan serve --host=127.0.0.1 --port=8000

echo Laravel aplikacija je spremna. Otvori http://localhost:8000 u browseru.

pause
