<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;


class DashboardController extends Controller
{
    public static function getBinders()
    {
//       $data = [];
//        $data['first'] = 'Craig';
//        $data['last'] = 'Iannazzi';
//
//        return $data;
//
//        $first = 'Jeffrey';
//        $last = 'Way';
//        return compact('first', 'last');
//

        $binders = [
            'Customer Service Counter' => [
                'Customers',
                'Point Of Sale',
                'Shipping',
                'Products & Services',
                'Customer Credits',
                'Promotions',
                'Discounts'
            ] ,
            'Back End' => [
                'Orders',
                'Invoices',
                'Shipping',
                'Products & Services',
                'Website',
                'Images',
                'Inventory',
                'Vendors',

            ],
            'Office' => [
                'Documents',
                'Accounts',
                'Credit Cards',
                'Invoices',
                'Payments',
                'Tax',
                'Employees',
                'Departments',
                'Locations',
                'Reports',

            ],
            'Utility Closet' => [
                'System Info',
                'System Settings',
                'Users',
                'Terminals',
                'Printers',
                'Payment Gateways'
            ],
            'All' => [
                'Calendar',
                'Employee Handbook'

            ]

        ];
        return array('binders' =>$binders);
    }
    public function getIndex(Request $request)
    {





        //$user = \Auth::user();
        //dd($user);

        //dd(getTenantDatabaseConnectionName());
        $session = session()->all();
        //var_dump($session);

        //return View::make('dashboard/vue');
        return View::make('dashboard/angular',$this->binders());


    }
    public function getAIndex(Request $request)
    {
        return View::make('dashboard/angular',$this->binders());
    }
    public function getVIndex(Request $request)
    {
        return View::make('dashboard/vue',$this->binders());
    }

}
?>