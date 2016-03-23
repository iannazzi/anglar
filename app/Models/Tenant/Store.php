<?php namespace App\Models\Tenant;

use App\Models\BaseTenantModel;
use App\Models\Main\AccountType;

class Store extends BaseTenantModel {

    protected $fillable = [
        'state_id',
        'tax_jurisdiction_id',
        'active',
        'company',
        'store_name',
        'website',
        'shipping_address1',
        'shipping_address2',
        'shipping_city',
        'shipping_state',
        'shipping_province',
        'shipping_zip',
        'shipping_country',
        'email',
        'phone',
        'fax',
        'billing_address1',
        'billing_address2',
        'billing_city',
        'billing_state',
        'billing_province',
        'billing_zip',
        'billing_country',
        'comments'
    ];
}