<?php

//$config['appId'] = '367848656606301';
//$config['secret'] = 'SECRET_HERE';


$config['facebook']['api_id'] = '367848656606301';
$config['facebook']['app_secret'] = 'YOUR APP SECRET';
$config['facebook']['redirect_url'] = 'http://localhost/social/index.php/facebook/';
$config['facebook']['permissions'] = array(
    'email',
    'user_location',
    'user_birthday'
);
