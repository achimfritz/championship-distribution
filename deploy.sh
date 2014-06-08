
export FLOW_CONTEXT=Production
git pull
composer install
./flow flow:cache:flush
./flow flow:cache:warmup
