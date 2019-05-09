#!/bin/bash
cd output
rsync -rclpvh --delete -e ssh . stieglma@sagitta.uberspace.de:/var/www/virtual/stieglma/edelweiss-gaishofen.de
