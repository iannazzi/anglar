<?php
namespace IannazziTestLibrary\Tests;
use App\Classes\TenantSystem\TenantSystemBuilder;
use App\Models\Main\System;
use Faker\Factory as Faker;
use Artisan;
use Iannazzi\Generators\DatabaseImporter\DatabaseDestroyer;
use Symfony\Component\Console\Output\ConsoleOutput;


//FROM JEFFERY WAY INCREMENTAL API
//SOURCE: https://gist.github.com/laracasts/10407179

abstract class ApiTester extends TestCase {

    /**
     * @var Faker
     */
    protected $fake;
    protected $output;

    /**
     * Initialize
     */
    function __construct()
    {
        $this->fake = Faker::create();
    }

    function getSystem()
    {
        $system = System::first();
        $system->createTenantConnection();
        return $system;
    }
    public function writeMethod($method_name)
    {
        fwrite(STDOUT, $method_name . "\n");
    }

    /**
     * Setup database for each test
     */

    public function setUp()
    {
        parent::setUp();
    }

    protected function assertPreConditions()
    {
        //$this->createEM();
        //fwrite(STDOUT, __METHOD__ . "\n");
    }


    public static function setUpBeforeClass()
    {
        //self::createEM();
        //fwrite(STDOUT, __CLASS__ . "\n");

        //fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function assertPostConditions()
    {
        //fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function tearDown()
    {
       // fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass()
    {
        //fwrite(STDOUT, __METHOD__ . "\n");
    }







    /**
     * Get JSON output from API
     *
     * @param        $uri
     * @param string $method
     * @param array  $parameters
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $parameters = [])
    {
        return json_decode($this->call($method, $uri, $parameters)->getContent());
    }

    /**
     * Assert object has any number of attributes
     *
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute)
        {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }

}