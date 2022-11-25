#!/bin/bash
cd ../../minimighty-ecommerce/packages/backend &
git pull origin main &
git add packages &
git commit -m "automatic commit" &
git push origin main &