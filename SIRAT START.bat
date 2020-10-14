@echo off
Title SIARKIM - Sistem Informasi Arsip Surat
@for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do (
    set "MY_IP=%%a"
)

cd /d "C:\xampp\htdocs\SIRAT"
php artisan serve --host %MY_IP% --port 80
pause>nul & exit