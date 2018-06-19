<?php

return array(

    'name' => 'Lesys Tenancy Backend System',

    'admin' => array(

    	'email' => 'teon.ooi@gmail.com',

    ),

	'facebook' => array(
		'id' => '',
		'secret' => ''
	),    

	'ipay88' => array(
//		'code' => 'M07416',
//		'key' => 'Otp926Zv7B',
                'code' => 'M08747',
		'key' => 'Mp7FIn6fFM',
		'currency' => 'MYR',
		'url' => 'https://www.mobile88.com/epayment/entry.asp',

        'payment_methods' => array(
            '2'   => 'Credit Card (MYR)',
            '6'   => 'Maybank2U',
            '8'   => 'Alliance Online',
            '10'  => 'AmOnline',
            '14'  => 'RHB Online',
            '15'  => 'Hong Leong Online',
            '16'  => 'FPX',
            '20'  => 'CIMB Click',
            '22'  => 'Web Cash',
            '100' => 'Celcom AirCash',
            '102' => 'Bank Rakyat Internet Banking',
            '103' => 'AffinOnline',
            '48'  => 'PayPal (MYR)',
        ),
	),    

	'category' => array(
		'Sales' => 'Sales', 
		'Rent' => 'Rent', 
		'New' => 'New'
	),	

	'direction' => array(
		'North' => 'North', 
		'North-East' => 'North-East', 
		'East' => 'East', 
		'South-East' => 'South-East', 
		'South' => 'South', 
		'South-West' => 'South-West', 
		'West' => 'West', 
		'North-West' => 'North-West'
	),

	'renovation' => array(
		'Basic' => 'Basic', 
		'Semi Renovation' => 'Semi Renovation', 
		'Full renovation' => 'Full renovation'
	),

	'type' => array(
		'Apartment' => 'Apartment',
		'Condominium' => 'Condominium',
		'Terrace' => 'Terrace',
		'Semi-Detacted' => 'Semi-Detacted',
		'Residential Land' => 'Residential Land'
	),

	'payment_type' => array(
		'ipay' => 'iPay',
		'manual' => 'Manual',
	),

);
