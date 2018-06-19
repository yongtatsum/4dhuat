<?php

return array(

    'appNameIOS'     => array(
         'environment' => 'development',
//        'environment' => 'production',
         'certificate' =>app_path() . '/../ck.pem',
//        'certificate' => app_path() . '/../pro.pem',
        'passPhrase'  => '123456',
        'service'     => 'apns'
    ),
    'appNameAndroid' => array(
        'environment' => 'production',
        'apiKey'      => 'AAAAMwfEnJ8:APA91bEsel2_1tsYon1axKdihWt0_CnZrjjaAJjRLb8ikHeAngE66OEaSqRBWgTnqx6Hv5WgQ45admssvbZPJBZF547d971bVRibrHLs2QkosFCwmW3fyVCiY_0AY3kNiWdytrg2oFBQ',
        'service'     => 'gcm'
    )

);