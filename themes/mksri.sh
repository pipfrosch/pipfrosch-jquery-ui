#!/bin/bash

for theme in base black-tie blitzer cupertino dark-hive dot-luv eggplant excite-bike flick hot-sneaks humanity le-frog mint-choc overcast pepper-grinder redmond smoothness south-street start sunny swanky-purse trontastic ui-darkness ui-lightness vader; do
  echo ${theme}
  pwd
  cd ${theme}
  pwd
  echo "jquery-ui.min.css: sha256-`shasum -b -a 256 "jquery-ui.min.css" |awk '{ print $1 }' |xxd -r -p |base64`"  > sri.txt
  echo "jquery-ui.min.css: sha384-`shasum -b -a 384 "jquery-ui.min.css" |awk '{ print $1 }' |xxd -r -p |base64`" >> sri.txt
  cd ..
done
