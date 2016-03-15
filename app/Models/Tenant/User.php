<?php

namespace App\Models\Tenant;

use App\Models\BaseTenantModel;


use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseTenantModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    //
    use Authenticatable, Authorizable, CanResetPassword;

    // = 'tenant'; //System::getConnectionName();
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'email', 'password', 'active', 'group_id'];

    public function columnDef()
    {
      //this is my def...
    }
    public function getRememberToken()
    {
      return null; // not supported
    }

    public function setRememberToken($value)
    {
      // not supported
    }

    public function getRememberTokenName()
    {
      return null; // not supported
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
      $isRememberTokenAttribute = $key == $this->getRememberTokenName();
      if (!$isRememberTokenAttribute)
      {
        parent::setAttribute($key, $value);
      }
    }
    public function generatePasscode($length = 5)
    {
        $success = false;

        while ($success == false)
        {
            $success = true;
            $unique_number_attempt = $this->generateRandomString($length, '0123456789');
            //$unique_number_attempt = '1234567';
            $this->passcode = $unique_number_attempt;
            try
            {
                $this->save();
            }
            catch(\Exception $e)
            {
              //trigger_error('baaadddddd');
              $success = false;
            }
        
           
        }
        return $unique_number_attempt;
    }

  public function generateRandomString($length, $charset = '0123456789')
  {
    $key = '';
    for($i=0; $i<$length; $i++)
    {
       $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];    
    }
    return $key;
  }

}
