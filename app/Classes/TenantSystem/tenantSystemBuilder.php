<?php

namespace App\Classes\TenantSystem;


use App\Classes\Database\DatabaseCsvLoader;
use App\Classes\Database\DatabaseManagerTrait;
use Filesystem;

use App\Classes\Database\TenantDatabaseBuilder;
use App\Classes\Database\TenantDatabaseModifier;
use App\Classes\Database\TenantDatabaseConnector;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Models\Main\System;
use App\Models\Tenant\User;


Class TenantSystemBuilder {
    use DatabaseManagerTrait;
	protected $system;
    protected $dbc;

	public function __construct(System $system)
	{
		$this->system = $system;
        $this->dbc = $system->dbc();
        $this->output = new ConsoleOutput();
	}
	public function setupTenantSystem() //sytem is the model from craigland.....  
	{ 
     	//there is no fall back - I could manually delete or even re-install...
       	$tenantDatabaseBuilder = new TenantDatabaseBuilder($this->system);
        
        $tenantDatabaseBuilder->createTenantDatabase();
        TenantDatabaseConnector::createTenantConnection($this->system);
        $tenantDatabaseBuilder->migrateTenantDatabase();
        $this->console('Migration Complete');
        $this->createTenantSystemAdminAccount();
        $this->console('Admin Accounts Complete');

        /*
         * load csv -- due to foreign key restraints have to move to migrations
         */
        $path = database_path("seeds/csv_startup_data/tenant");
        DatabaseCsvLoader::loadCSVStartupData($this->dbc, $path);
        $this->console('Csv Data Complete');




        //create a store... nope
        //create filesystem... yup


	}
    public function createUniquePasscode()
    {

    }
	
	public function createTenantSystemAdminAccount()
	{
		$this->console( 'Creating Admin account...for ' .$this->system->dbc() . PHP_EOL);
		$posUserData = [
            
            'username'=> 'admin',
            'first_name' => $this->system->name,
            'password'=> $this->system->password,
            'email' => $this->system->email,
            'group_id' => 1,
            'active' => 1,

            ];
        //Auth:: hates this....
        //$posUser = new posUser($this->dbc, $posUserData);
        //$posUser->save();

        $posUser = User::create($posUserData);
        $this->console( 'Created Admin account...for ' .$this->system->dbc() . PHP_EOL);

        //$posUser->generatePasscode();

        $posUserData2 = [
            
            'username'=> 'admin2',
            'password'=> $this->system->password,
            'group_id' => 1,
            'active' => 1,

            ];
        //Auth:: hates this....
        //$posUser = new posUser($this->dbc, $posUserData);
        //$posUser->save();

        $posUser2 = User::create($posUserData2);
        //$posUser2->generatePasscode();

        $this->console( 'Created Admin2 account...for ' .$this->system->dbc() . PHP_EOL);





    }
	public function deleteSystem()
	{
		//say something fails in the install, this will remove it
		//ssssssuuuuuuuppppppperrrrrrrrr dangerous
		//$connection = $system->createConnection(); // ??? huh I need this often....
     	//there is no fall back
     	$tenantDatabaseBuilder = new TenantDatabaseModifier($this->system);
        $tenantDatabaseBuilder->deleteDatabase();
	}

	




}


?>