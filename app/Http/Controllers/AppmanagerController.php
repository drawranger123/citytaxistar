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




class AppmanagerController extends BaseController
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
	//admin , king@123
	//kind[0:hair, 1:custome], name, job, phone, pass, info, dutyinfo, photo
	public function login(Request $request)
 	{
		$selemail = ["req"=>"failure", "msg"=>"Email and Password is not correctiy. Please enter again."];

		if(!empty($_REQUEST['mEmailAddress'])){

			//echo 'SELECT * FROM taxi_customer WHERE email="'.$_REQUEST['mEmailAddress'].'" and password="'.base64_encode($_REQUEST['mPassword']).'"';

			$users = DB::select('SELECT * FROM taxi_customer WHERE email="'.$_REQUEST['mEmailAddress'].'" and password="'.base64_encode($_REQUEST['mPassword']).'"');

			//response()->json(["r"=>"d", "msg"=>"Email information is duplicated. Please enter again."], 200);
			foreach ($users as $user) {
				$selemail = ["req"=>"success", "msg"=>"Welcome!", "s_id"=>$user->id, "s_name"=>$user->name, "s_email"=>$user->email, "s_phone"=>$user->phone];
			}
		}
		//return json_encode($selemail);
		return response()->json($selemail, 200);
	}
	public function login_driver(Request $request)
	{
	   $selemail = ["req"=>"failure", "msg"=>"Email and Password is not correctiy. Please enter again."];

	   if(!empty($_REQUEST['mEmailAddress'])){
		   $users = DB::select('SELECT * FROM taxi_driver WHERE email="'.$_REQUEST['mEmailAddress'].'" and password="'.base64_encode($_REQUEST['mPassword']).'"');
		   foreach ($users as $user) {
			   $selemail = ["req"=>"success", "msg"=>"Welcome!", "s_id"=>$user->id, "s_name"=>$user->name, "s_email"=>$user->email, "s_phone"=>$user->phone, "s_cash"=>$user->cash];
		   }
	   }
	   return response()->json($selemail, 200);
   	}
	public function findtaxis(Request $request)
 	{
		$users = DB::select('SELECT * FROM taxi_driver');
		return response()->json($users, 200);
	}

	public function register(Request $request)
 	{
		if(!empty($_REQUEST['txtName']) && !empty($_REQUEST['txtEmailAddress']) && !empty($_REQUEST['txtPhone']) && !empty($_REQUEST['txtPassword'])){

			$users = DB::select('SELECT * FROM taxi_customer WHERE email="'.$_REQUEST['txtEmailAddress'].'"');
			$selemail = "";
			foreach ($users as $user) {
				$selemail = $user->email;
			}
			if($selemail != ""){
				return response()->json(["req"=>"duplicate", "msg"=>"Email information is duplicated. Please enter again."], 200);

			}else{
				$sql = 'INSERT INTO taxi_customer SET name="'.$_REQUEST['txtName'].'", email="'.$_REQUEST['txtEmailAddress'].'", phone="'.$_REQUEST['txtPhone'].'", password="'.base64_encode($_REQUEST['txtPassword']).'", enter_dt="'.date("Y-m-d H:i:s").'", visit_dt="'.date("Y-m-d H:i:s").'", visit=1, flag=1';

				DB::insert($sql);
				return response()->json(["req"=>"insert", "msg"=>"Email information was registered correctly. Welcome to join the taxi service system."], 200);
			}
		}else{
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
		}
	}
	public function register_driver(Request $request)
 	{
		 if(!empty($_REQUEST['txtName']) && !empty($_REQUEST['txtEmailAddress']) && !empty($_REQUEST['txtPhone']) && !empty($_REQUEST['txtPassword'])){

			$users = DB::select('SELECT * FROM taxi_driver WHERE email="'.$_REQUEST['txtEmailAddress'].'"');
			$selemail = "";
			foreach ($users as $user) {
				$selemail = $user->email;
			}
			if($selemail != ""){
				return response()->json(["req"=>"duplicate", "msg"=>"Email information is duplicated. Please enter again."], 200); 
			}else{
				$sql = 'INSERT INTO taxi_driver SET name="'.$_REQUEST['txtName'].'", email="'.$_REQUEST['txtEmailAddress'].'", phone="'.$_REQUEST['txtPhone'].'", password="'.base64_encode($_REQUEST['txtPassword']).'", enter_dt="'.date("Y-m-d H:i:s").'", visit_dt="'.date("Y-m-d H:i:s").'", visit=1, flag=1';
				DB::insert($sql);

				return response()->json(["req"=>"insert", "msg"=>"Email information was registered correctly. Welcome to join the taxi service system."], 200); 
			}
		}else{
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
		}
	}
	public function add_order(Request $request)
	{
	   if(!empty($_REQUEST['user_id']) && !empty($_REQUEST['origin_latitude']) && !empty($_REQUEST['origin_longitude']) && !empty($_REQUEST['origin_address'])){

			$sql = 'INSERT INTO taxi_orders SET user_id="'.$_REQUEST['user_id'].'", origin_latitude="'.$_REQUEST['origin_latitude'].'", origin_longitude="'.$_REQUEST['origin_longitude'].'", origin_address="'.$_REQUEST['origin_address'].'", dest_latitude="'.$_REQUEST['dest_latitude'].'", dest_longitude="'.$_REQUEST['dest_longitude'].'", dest_address="'.$_REQUEST['dest_address'].'",order_date="'.$_REQUEST['order_date'].'",order_time="'.$_REQUEST['order_time'].'",price="'.$_REQUEST['price'].'"';

			DB::insert($sql);

			return response()->json(["req"=>"insert", "msg"=>"order information was registered correctly."], 200);

	   }else{

		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}
	public function add_order_drivers(Request $request)
	{
	   if(!empty($_REQUEST['order_id']) && !empty($_REQUEST['driver_id'])){

			$sql = 'INSERT INTO taxi_order_drivers SET order_id="'.$_REQUEST['order_id'].'", driver_id="'.$_REQUEST['driver_id'].'"';

			DB::insert($sql);

			return response()->json(["req"=>"insert", "msg"=>"order_drivers information was registered correctly."], 200);

	   }else{
		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}

	public function get_order(Request $request)
	{
	   if(!empty($_REQUEST['user_id'])){

			$sql = 'SELECT * FROM taxi_orders where user_id="'.$_REQUEST['user_id'].'" and accept_id <> 2 order by id desc limit 1';
			$order = DB::select($sql);
			return response()->json($order, 200);

	   }else{

		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}
	public function get_orders(Request $request)
	{
		$sql = 'select taxi_orders.id as order_id , taxi_customer.*, taxi_orders.* from taxi_orders, taxi_customer where taxi_orders.user_id = taxi_customer.id and taxi_orders.accept_id <> 2;';
		$order = DB::select($sql);
		return response()->json($order, 200);
	}
	public function get_profile_info(Request $request)
	{
	   if(!empty($_REQUEST['user_id'])){

			$sql = 'SELECT * FROM taxi_customer where id="'.$_REQUEST['user_id'].'"';
			$order = DB::select($sql);
			return response()->json($order, 200);

	   }else{
		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}
	public function get_profile_driver(Request $request)
	{
	   if(!empty($_REQUEST['driver_id'])){

			$sql = 'SELECT * FROM taxi_driver where id="'.$_REQUEST['driver_id'].'"';
			$order = DB::select($sql);
			return response()->json($order, 200);

	   }else{
		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}
	public function get_order_drivers(Request $request)
 	{
		if(!empty($_REQUEST['order_id'])){
			$users = DB::select('select taxi_order_drivers.id as order_driver_id ,taxi_order_drivers.*,taxi_driver.*  from taxi_order_drivers, taxi_driver where taxi_order_drivers.order_id="'.$_REQUEST['order_id'].'" and taxi_order_drivers.driver_id=taxi_driver.id;');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}
	public function get_order_history_drivers(Request $request)
 	{
		if(!empty($_REQUEST['user_id'])){
			//select * from taxi_orders,taxi_order_drivers,taxi_driver where taxi_orders.user_id=63 and taxi_orders.id=taxi_order_drivers.order_id and taxi_order_drivers.accepted<>0 and taxi_order_drivers.driver_id = taxi_driver.id;
			$users = DB::select('select * from taxi_orders,taxi_order_drivers,taxi_driver where taxi_orders.user_id="'.$_REQUEST['user_id'].'" and taxi_orders.id=taxi_order_drivers.order_id and taxi_order_drivers.accepted<>0 and taxi_order_drivers.driver_id = taxi_driver.id;');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}

	public function update_order_driver(Request $request)
	{
		if(!empty($_REQUEST['order_driver_id'])){
			$users = DB::select('update taxi_order_drivers set accepted=1 where id="'.$_REQUEST['order_driver_id'].'";');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}
	public function update_orders_accept(Request $request)
	{
		if(!empty($_REQUEST['order_id']) && !empty($_REQUEST['driver_id'])){

			$sql = 'INSERT INTO taxi_order_drivers SET order_id="'.$_REQUEST['order_id'].'", driver_id="'.$_REQUEST['driver_id'].'"';

			DB::insert($sql);

			$users = DB::select('update taxi_orders set accept_id=1 where id="'.$_REQUEST['order_id'].'";');
			return response()->json($users, 200);
			return response()->json(["req"=>"insert", "msg"=>"order_drivers information was registered correctly."], 200);

	   }else{
		   return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	   }
	}
	public function upload_image(Request $request)
	{
		//$target_dir = "uploads/";
		//$target_file_name = $target_dir.basename($_FILES["file"]["name"]);
		//$response = array();
		$uploads_dir = public_path('uploads/');
		if(isset($_FILES["file"]))
		{
			$name = $request["user_id"].".jpg";
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$name"))
			{
				$success = true;
				$message = "Uploaded!!!";
				if(!empty($_REQUEST['user_id']) && !empty($_REQUEST['name'])){
					$users = DB::select('update taxi_customer set name="'.$_REQUEST['name'].'", image="'.$_REQUEST['user_id'].'.jpg" where id="'.$_REQUEST['user_id'].'";');
					return response()->json($users, 200);
				}

			}
			else
			{
				$success = false;
				$message = "NOT Uploaded!!! _ Error While Uploading";
			}
		}
		else{
			$success = false;
			$message = "missing field";
		}
		$response["success"] = $success;
		$response["message"] = $message;
		return response()->json($response, 200);
	}
	public function download_image(Request $request)
	{
		$filepath = public_path('uploads/')."".$_REQUEST['name'].".jpg";
		if(file_exists($filepath))
			return \Response::download($filepath);
		//$root="http://".$_SERVER['HTTP_HOST']."/";
		//echo '<img src="'.$root."uploads/".$_REQUEST['name'].".jpg".'">';
	}
	public function update_profile_info(Request $request)
	{
		if(!empty($_REQUEST['user_id']) && !empty($_REQUEST['name'])){
			$users = DB::select('update taxi_customer set name="'.$_REQUEST['name'].'", image="'.$_REQUEST['user_id'].'.jpg" where id="'.$_REQUEST['user_id'].'";');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}
	public function upload_image_driver(Request $request)
	{
		//$target_dir = "uploads/";
		//$target_file_name = $target_dir.basename($_FILES["file"]["name"]);
		//$response = array();
		$uploads_dir = public_path('uploads/driver/');
		if(isset($_FILES["file"]))
		{
			$name = $request["driver_id"].".jpg";
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$name"))
			{
				$success = true;
				$message = "Uploaded!!!";
				if(!empty($_REQUEST['driver_id']) && !empty($_REQUEST['name'])){
					$users = DB::select('update taxi_driver set name="'.$_REQUEST['name'].'", image="'.$_REQUEST['driver_id'].'.jpg" where id="'.$_REQUEST['driver_id'].'";');
					return response()->json($users, 200);
				}

			}
			else
			{
				$success = false;
				$message = "NOT Uploaded!!! _ Error While Uploading";
			}
		}
		else{
			$success = false;
			$message = "missing field";
		}
		$response["success"] = $success;
		$response["message"] = $message;
		return response()->json($response, 200);
	}
	public function download_image_driver(Request $request)
	{
		$filepath = public_path('uploads/driver/')."".$_REQUEST['name'].".jpg";
		if(file_exists($filepath))
			return \Response::download($filepath);
		//$root="http://".$_SERVER['HTTP_HOST']."/";
		//echo '<img src="'.$root."uploads/".$_REQUEST['name'].".jpg".'">';
	}
	public function update_profile_driver(Request $request)
	{
		if(!empty($_REQUEST['driver_id']) && !empty($_REQUEST['name'])){
			$users = DB::select('update taxi_driver set name="'.$_REQUEST['name'].'", image="'.$_REQUEST['driver_id'].'.jpg" where id="'.$_REQUEST['driver_id'].'";');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}
	public function update_profile_gps(Request $request)
	{
		if(!empty($_REQUEST['driver_id']) && !empty($_REQUEST['lat']) && !empty($_REQUEST['lng'])){
			$users = DB::select('update taxi_driver set lat="'.$_REQUEST['lat'].'", lng="'.$_REQUEST['lng'].'" where id="'.$_REQUEST['driver_id'].'";');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}

	public function delete_order_info(Request $request)
	{
		if(!empty($_REQUEST['order_id'])){
			$users = DB::select('delete from taxi_orders where id="'.$_REQUEST['order_id'].'";');
			$users = DB::select('delete from taxi_order_drivers where order_id="'.$_REQUEST['order_id'].'";');
			return response()->json($users, 200);
		}
		else
			return response()->json(["req"=>"empty", "msg"=>"No data!"], 200);
	}

	public function get_messages(Request $request)
 	{
		$hair_order = APP\hair_order::on('mysql');
		$hair_order = $hair_order->where('hair_id', $request->input('id'));
		$hair_order = $hair_order->where('state', '<>', '1');
		$hair_order = $hair_order->leftJoin('hair_custome', 'hair_order.cus_id', '=', 'hair_custome.id');
		$hair_order = $hair_order->select('hair_order.*', 'hair_custome.name', 'hair_custome.phone', 'hair_custome.rank');
        $hair_order = $hair_order->get();

		if ($hair_order == null ||  $hair_order == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_order);
	}

	public function get_message_history(Request $request)
 	{
		$hair_order = APP\hair_order::on('mysql');
		$hair_order = $hair_order->where('hair_id', $request->input('id'));
		$hair_order = $hair_order->leftJoin('hair_custome', 'hair_order.cus_id', '=', 'hair_custome.id');
		$hair_order = $hair_order->select('hair_order.*', 'hair_custome.name', 'hair_custome.phone', 'hair_custome.rank');
		//$hair_order = $hair_order->orderBy('hair_order.created_at desc');
        $hair_order = $hair_order->get();

		if ($hair_order == null ||  $hair_order == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_order);
	}

	public function get_message_info(Request $request)
 	{
		$hair_order = APP\hair_order::on('mysql');
		$hair_order = $hair_order->where('id', $request->input('id'));
        $hair_order = $hair_order->get();

		if ($hair_order == null ||  $hair_order == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_order);
	}

	public function get_hair(Request $request)
 	{
		$hair_custome = APP\hair_custome::on('mysql');
		$hair_custome = $hair_custome->where('id', $request->input('id'));
		$hair_custome = $hair_custome->where('kind', '1');

        $hair_custome = $hair_custome->get();

		if ($hair_custome == null || $hair_custome == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_custome);
	}
	public function get_hairs(Request $request)
 	{
		$hair_custome = APP\hair_custome::on('mysql');
		$hair_custome = $hair_custome->where('kind', '1');

        $hair_custome = $hair_custome->get();

		if ($hair_custome == null || $hair_custome == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_custome);
	}
	public function get_userinfo(Request $request)
 	{
		$hair_custome = APP\hair_custome::on('mysql');
		$hair_custome = $hair_custome->where('id', $request->input('id'));

        $hair_custome = $hair_custome->get();

		if ($hair_custome == null || $hair_custome == '[]') {
			return '[{"id":-1}]';
		}

		return json_encode($hair_custome);
	}
	public function requestHair(Request $request)
 	{
		$hair_order = new APP\hair_order();
		$hair_order->hair_id = $request->input('hair_id');
		$hair_order->hair_name = $request->input('hair_name');
		$hair_order->hair_job = $request->input('hair_job');
		$hair_order->hair_phone = $request->input('hair_phone');
		$hair_order->cus_id = $request->input('cus_id');
		$hair_order->state = $request->input('state');
		$hair_order->info = $request->input('info');
		$hair_order->cus_name = '';
		$hair_order->cus_job = '';
		$hair_order->cus_phone = '';
		$hair_order->delay_dt = '';
		$hair_order->delay_info = '';
		$hair_order->flag = 0;
		$hair_order->save();
		return '[{"result":"ok"}]';
	}
	public function update_message_info(Request $request)
 	{
		// $hair_order = APP\hair_order::on('mysql');
		// $hair_order = $hair_order->where('id', $request->input('id'));
        // $hair_order = $hair_order->get();

		// if ($hair_order == null ||  $hair_order == '[]') {
		// 	return '[{"id":-1}]';
		// }
		$hair_order = APP\hair_order::find($request->input('id'));
		$hair_order->state = $request->input('state');
		$hair_order->delay_info = $request->input('delay_info');
		$hair_order->save();
		return '[{"result":"ok"}]';
	}
	public function update_custome_info(Request $request)
 	{
		$hair_custome = APP\hair_custome::find($request->input('id'));
		$hair_custome->name = $request->input('name');
		$hair_custome->job = $request->input('job');
		$hair_custome->phone = $request->input('phone');
		$hair_custome->info = $request->input('info');
		$hair_custome->pass = $request->input('pass');
		$hair_custome->duty = $request->input('duty');
		$hair_custome->save();
		return '[{"result":"ok"}]';
	}
}
