#!/bin/bash
rm -rf output
mkdir output
pipenv run publish
cd output
rsync -rclpvh --delete -e ssh . stieglma@sagitta.uberspace.de:/var/www/virtual/stieglma/edelweiss-gaishofen.de

