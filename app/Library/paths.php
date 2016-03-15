<?php


function cg_csv_seed_path($table)
{
    return database_path("seeds/csv_startup_data/craiglorious/".$table. '.csv');
}
function tenant_csv_seed_path($table)
{
    return database_path("seeds/csv_startup_data/tenant/".$table. '.csv');
}
