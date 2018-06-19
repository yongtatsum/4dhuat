<?php
Event::listen('generic.event',function($client_data){
    
    echo sprintf($client_data->data->message);
    return BrainSocket::message('generic.event',array('message'=>'A message from a generic event fired in Laravel!'));
});


Event::listen('connect.me',function($client_data){
    
    echo sprintf($client_data->data->me->id);
    return BrainSocket::success(array('message'=>'A message from a generic event fired in Laravel!'));
});

Event::listen('app.success',function($client_data){
    return BrainSocket::success(array('There was a Laravel App Success Event!'));
});

Event::listen('app.error',function($client_data){
    return BrainSocket::error(array('There was a Laravel App Error!'));
});