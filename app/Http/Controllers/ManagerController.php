<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Contracts\Session\Session;
use App\Helpers\CommonHelper;
use Auth;
use App;

use Illuminate\Support\Facades\DB;


class ManagerController extends BaseController
{
	private $isAPI;
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function __invoke(Request $request)
	{

	}
	
 
	public function dashboard()
 	{
		
		$orders = DB::select('SELECT month(created_at) as mon, COUNT(id) as cnt FROM hair_order  WHERE year(created_at) = 2020 GROUP BY month(created_at) ORDER BY created_at');

		$bigChartMonthData = "[";
		$bigChartCountData = "[";

		$index = 0;
		foreach ($orders as $order) {
			
			$bigChartCountData .= $order->cnt;
			$bigChartMonthData .= "'".$order->mon." mon'";
			//echo $user->cnt;
			//if($index > 0){
				$bigChartMonthData .= ",";
				$bigChartCountData .= ",";
			//}
			$index++;
		}

		$bigChartMonthData .= "]";
		$bigChartCountData .= "]";

		$users = DB::select('SELECT month(created_at) as mon, COUNT(id) as cnt FROM hair_custome  WHERE year(created_at) = 2020 GROUP BY month(created_at) ORDER BY created_at');

		$userChartMonthData = "[0,";
		$userChartCountData = "[0,";

		$index = 0;
		foreach ($users as $user) {
			
			$userChartCountData .= $user->cnt;
			$userChartMonthData .= "'".$user->mon." mon'";
			//echo $user->cnt;
			//if($index > 0){
				$userChartMonthData .= ",";
				$userChartCountData .= ",";
			//}
			$index++;
		}


		$userChartMonthData .= "]";
		$userChartCountData .= "]";
		
		$theme = "***";

		$orders = DB::select('SELECT * FROM hair_order ORDER BY created_at desc LIMIT 0, 5');
		$hair = DB::select('SELECT * FROM `hair_custome` WHERE kind =1 ORDER BY price desc limit 0,4');

		return view('manager/dashboard')
				->with('kind', 'dashboard')
				->with('userChartMonthData', $userChartMonthData)
				->with('userChartCountData', $userChartCountData)
				->with('bigChartMonthData', $bigChartMonthData)
				->with('orders', $orders)
				->with('hairs', $hair)
				->with('bigChartCountData', $bigChartCountData);
 		
	}   
	public function userinfo()
	{
		$hair_custome = DB::select('SELECT * FROM hair_custome');

		// $index = 0;
		// foreach ($hair_custome as $user) {
			
		// 	$userChartCountData .= $user->cnt;
		// 	$userChartMonthData .= "'".$user->mon." mon'";
		// 	//echo $user->cnt;
		// 	//if($index > 0){
		// 		$userChartMonthData .= ",";
		// 		$userChartCountData .= ",";
		// 	//}
		// 	$index++;
		// }

		$theme = "***";
		return view('manager/userinfo')
				->with('hair_custome', $hair_custome)
				->with('kind', 'userinfo')
				->with('theme', $theme);
	} 
	public function orderinfo()
	{
		$theme = "***";
		$order_info = DB::select('SELECT * FROM hair_order');
		
		return view('manager/orderrinfo')
				->with('order_info', $order_info)
				->with('kind', 'orderinfo')
				->with('theme', $theme);
	} 

	public function userprofile()
	{
		$theme = "***";
		//$order_info = DB::select('SELECT * FROM hair_order');
		
		return view('manager/userprofile')
				->with('kind', 'userprofile')
				->with('theme', $theme);
	}
    
}
