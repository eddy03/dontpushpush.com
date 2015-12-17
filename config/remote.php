<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Remote Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default connection that will be used for SSH
    | operations. This name should correspond to a connection name below
    | in the server list. Each connection will be manually accessible.
    |
    */

    'default'     => 'production',

    /*
    |--------------------------------------------------------------------------
    | Remote Server Connections
    |--------------------------------------------------------------------------
    |
    | These are the servers that will be accessible via the SSH task runner
    | facilities of Laravel. This feature radically simplifies executing
    | tasks on your servers, such as deploying out these applications.
    |
    */

    'connections' => [
        'production' => [
            'host'      => env('SSH_HOST', '127.0.0.1'),
            'username'  => env('SSH_USERNAME', ''),
            'password'  => env('SSH_PASSWORD', ''),
            'key'       => env('SSH_KEY', ''),
            'keytext'   => env('SSH_KEYTEXT', 'ssh-rsa AAAAB3NzaC1yc2EAAAABJQAAAQEAglBMcj8XBauOXzE185pvbrRGaADqWiMGiTT0dT2NVhAu6e59fPfSETmL9Qa4Vvx21ZgizszZnN9cYZiSWhuz5a69l2hYPZQ2hsS3Un3V00ot1kFa4BMDnZzDXRvSf2fqYzeeeRbQxVxAzrtkRf8TKH6h5xxsSdayxl0yJ6BB5bcLn+oWBKXPhqPd9IJiYkwCHB1+wvHXr4FE6MIdlsJu1y7WH/8QBBz2PqadFu60uWvh5HhxCidSKqDvR5aHh6/LJEx2T+dfPulnUcD3Ha63xnyCB09JpMHEP91yZ2vcFkqYfIBbngCYN2yrxs5MzhZMzYC5p5WWr4rHrPyXKLTQWQ== rsa-key-20150907'),
            'keyphrase' => '',
            'agent'     => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Remote Server Groups
    |--------------------------------------------------------------------------
    |
    | Here you may list connections under a single group name, which allows
    | you to easily access all of the servers at once using a short name
    | that is extremely easy to remember, such as "web" or "database".
    |
    */

    'groups'      => [
        'web' => ['production'],
    ],

];
