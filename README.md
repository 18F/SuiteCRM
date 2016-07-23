##Running SuiteCRM 7.6.6 on Cloud Foundry (e.g. cloug.gov)


1. Clone this repository
2. Push this application to your Cloud Foundry host, but don't start it. `cf push APP_NAME --no-start`, for example `cf push crm --no-start`
3. If you don't already have a Clound Foundry MySQL service instance (check via `cf services`), create one:
  - Take a look at the available services via `cf marketplace`
  - Create your service via `cf create-service SERVICE_NAME PLAN_NAME MY_SERVICE_NAME`, for example `cf create-service aws-rds shared-mysql cg-crm-db`
4. Bind your MySQL service to your Cloud Foundry application via `cf bind-service APP_NAME MY_SERVICE_NAME`, e.g. `cf bind-service crm cg-crm-db`.
5. Start your application via `cf start APP_NAME`, for example `cf start crm`.
6. Now open SuiteCRM in your browser and complete the on-screen installation. The database credentials will already be prepopulated.
7. Once the installation is complete you need to persist your configuration:
  - Download the contents of `.htaccess` into your repository `cf files crm app/htdocs/.htaccess`
  - Download the contents of `config.php` into your repository `cf files crm app/htdocs/config.php`
  - Download the contents of `config_override.php` into your repository `cf files crm app/htdocs/config_override.php`
  - Finally, push your application again so that all future instances of your application will be configured. `cf push crm`

#License
This project is a fork of SuiteCRM and adheres to the license requirements of SuiteCRM. SuiteCRM is published under the AGPLv3 license.

You can find SuiteCRM at https://github.com/salesagility/SuiteCRM

