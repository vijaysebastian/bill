<?php

return[
    /**
     * Cart page
     */
    'cart' => [
        "name"=>"{{name}}",
        "price"=>"{{price}}",
        "feature"=>"<li>{{feature}}</li>",
        "subscription"=>"{{subscription}}",
        "url"=>"{{url}}",
    ],
    /**
     * This is for welcome mail content
     */
    'welcome_mail'=>[
        "name"=>"{{name}}",
        "username"=>"{{username}}",
        "password"=>"{{password}}",
        "url"=>"{{url}}"
    ],
    
    /**
     * This is for order mail content
     */
    'order_mail'=>[
        "name"=>'{{name}}',
        "downloadurl"=>"{{downloadurl}}",
        "invoiceurl"=>"{{invoiceurl}}",
        "product"=>'{{product}}',
        'number'=>'{{number}}',
        "expiry"=>"{{expiry}}",
        "url"=>"{{url}}"
    ],
    
    /**
     * This is for invoice mail content
     */
    'invoice_mail'=>[
        "name"=>'{{name}}',
        "number"=>"{{number}}",
        "address"=>"{{address}}",
        "invoiceurl"=>"{{invoiceurl}}",
        "total"=>'{{total}}',
        "content"=>'{{content}}',
        "currency"=>'{{currency}}',
    ],
    
    /**
     * This is for forgot password mail content
     */
    'forgot_password_mail'=>[
        "name"=>'{{name}}',
        "url"=>"{{url}}",
        
    ],
    
    "subscription_going_to_end_mail"=>[
        "name"=>"{{name}}",
        "number"=>"{{number}}",
        "product"=>"{{product}}",
        "expiry"=>"{{expiry}}",
        "url"=>"{{url}}",
    ],
    
    "subscription_over_mail"=>[
         "name"=>"{{name}}",
        "number"=>"{{number}}",
        "product"=>"{{product}}",
        "expiry"=>"{{expiry}}",
        "url"=>"{{url}}",
    ],
];
