@echo off
Title SIARKIM - Sistem Informasi Arsip DISPERKIM
@for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do (
    set "MY_IP=%%a"
)

start chrome %MY_IP%
exit