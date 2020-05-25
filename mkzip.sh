#!/bin/bash

# creates a zip archive from master from github.

CWD=`pwd`

DIR=`mktemp -d -p /tmp plugin.XXXXXXXX`

pushd ${DIR}

git clone https://github.com/pipfrosch/pipfrosch-jquery-ui.git

cd pipfrosch-jquery-ui

# git specific file / directory
rm -f .gitignore
rm -f themes/.gitignore
rm -rf .git

# not needed in zip
rm -f mkzip.sh
rm -f README.md
cd themes
mv mksri.sh mksri.txt
cd ..

VERSION=`grep "Version:" pipfrosch-jquery.php |head -1 |cut -d':' -f2 |tr -d '[:space:]'`

cd ..

zip -r pipfrosch-jquery-ui.zip pipfrosch-jquery-ui

mv pipfrosch-jquery-ui.zip "${CWD}"/pipfrosch-jquery-ui-v${VERSION}.zip
rm -rf pipfrosch-jquery-ui

popd
rmdir ${DIR}

exit 0
