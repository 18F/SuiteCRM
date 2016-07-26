APP_NAME="crm"

cf files $APP_NAME app/htdocs/config_override.php | tail -n +3 | sed '/./,$!d' > ./config_override.php
cf files $APP_NAME app/htdocs/config.php | tail -n +3 | sed '/./,$!d' > ./config.php
cf files $APP_NAME app/htdocs/.htaccess | tail -n +3 | sed '/./,$!d' > ./.htaccess

cf push $APP_NAME
