<?php
if ($_SERVER['REMOTE_ADDR'] == '193.93.78.106') {
    $config['modules']['rights']['debug'] = true;
    $config['components']['db']['enableProfiling'] = true;
    $config['components']['db']['enableParamLogging'] = true;
    $config['components']['authManager']['showErrors'] = true;
    $config['components']['log'] = array(
        'class' => 'CLogRouter',
        'routes' => array(
            'profile' => array(
                'class' => 'CProfileLogRoute',
                'enabled' => true,
            ),
            'web' => array(
                'class' => 'CWebLogRoute',
                'showInFireBug' => true,
                'enabled' => true,
            ),
        )
    );
}