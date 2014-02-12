#!/usr/bin/env sh
SRC_DIR="`pwd`"
cd "`dirname "$0"`"
cd "../vendor/phpspec/phpspec/scripts"
BIN_TARGET="`pwd`/phpspec.php"
cd "$SRC_DIR"
"$BIN_TARGET" "$@"
