<?php namespace App\Models;

use DB;
use Exception;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function truncateString($column)
    {
        $max_length =  DB::connection()->getDoctrineColumn($this->getTable(), $column)->getLength();
        $this->$column  = substr ( $this->$column , 0 ,$max_length );
        return $this->$column;

    }
    public static function create(array $attributes = [])
    {
        try{
            Parent::create($attributes);
        }
        catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }
}