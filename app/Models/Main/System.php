<?php

namespace App\Models\Main;

use App\Classes\Database\TenantDatabaseConnector;
use App\Models\BaseMainModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class System extends BaseMainModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    private $dbc;

    protected $fillable = ['company', 'name', 'email', 'password', 'phone', 'address'];
    protected $hidden = ['password'];

    public function dbc()
    {
        $this->dbc =  TenantDatabaseConnector::GetDBCPrefix()  . $this->id;
        return $this->dbc;
    }

    public function createTenantConnection()
    {
      return  TenantDatabaseConnector::createTenantConnection($this);
    }
    public function setDBC()
    {
        //might need to reset the default dbc....
        TenantDatabaseConnector::setDefaultDBC($this);
    }
    public static function store(array $data)
    {
        //lets see...data may not have the set names
        // as angular will not post them... 

        return self::create( $data);
    }




}
