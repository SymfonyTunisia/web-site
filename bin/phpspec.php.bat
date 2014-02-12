@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/phpspec/phpspec/scripts/phpspec.php
php "%BIN_TARGET%" %*
