<?php

// You must first create a clound foundry mysql service and bind it to the application.

function get_db_service_credentials()
{
    $vcap_services = json_decode($_ENV["VCAP_SERVICES"]);
    $vcap_service_name = key($vcap_services);
    $vcap_service = $vcap_services->{$vcap_service_name};
    return $vcap_service[0]->credentials;
}

// This assumes only a single  service is mapped to the application.

function inject_db_service_credentials_into_config()
{
    global $sugar_config;

    $db_cred = get_db_service_credentials();

    $sugar_config['dbconfig']['db_type'] = 'mysql';
    $sugar_config['dbconfig']['db_name'] = $db_cred->db_name;
    $sugar_config['dbconfig']['db_user_name'] = $db_cred->username;
    $sugar_config['dbconfig']['db_password'] = $db_cred->password;
    $sugar_config['dbconfig']['db_host_name'] = $db_cred->host;
    $sugar_config['dbconfig']['db_port'] = $db_cred->port;
    $sugar_config['dbconfig']['db_host_instance'] = 'SQLEXPRESS';
    $sugar_config['dbconfig']['db_manager'] = 'MysqliManager';

    return;
}

?>
