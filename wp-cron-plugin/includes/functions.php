<?php

// Cron function
// Add sceduler time
function my_cron_schedules($schedules){
    if(!isset($schedules["10min"])){
        $schedules["10min"] = array(
            'interval' => 10*60,
            'display' => __('Once every 10 minutes'));
    }
    return $schedules;
}
add_filter('cron_schedules','my_cron_schedules');



// add scheduler event
if ( ! wp_next_scheduled( 'my_cron_schedules' ) ) {
    wp_schedule_event( time(), '10min', 'my_cron_schedules' );
}


add_action( 'my_cron_schedules', 'schedule_hook_update_db' );
function schedule_hook_update_db() {
    try {
        create_custom_logs('test message');
    }catch (\Exception $ex) {
        return $ex->getMessage();
    }
}


// This function is a simple one to create a log text every 10 minutes
// You can add any function you need (e.g: Sending E-mails to users every period of time) Or whatever you want
function create_custom_logs($message) {
    if(is_array($message)) {
        $message = json_encode($message);
    }
    file_put_contents(__DIR__ . '/Log/custom_logs.log', $message, FILE_APPEND | LOCK_EX);
}









?>