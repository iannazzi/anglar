<?php

use App\Classes\Database\DatabaseCsvLoader;
use Illuminate\Database\Migrations\Migration;

class LoadCsvData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$csv_path = database_path("seeds/csv_startup_data/main");
        //DatabaseCsvLoader::loadCSVStartupData('main', $csv_path);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
