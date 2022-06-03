<?php 

namespace App\Helpers;

use DB;
use Auth;

/**
 * 
 */

class Logger {

	public static function logActivity($activity,$success) {

		$route = explode('.', $activity);

		$controller = $route[0] ?? null;
		$method = $route[1] ?? null;
     
		DB::table('activity_logs')->insert([

			'vendor_id' => Auth::id(),
			'ip_address' => request()->ip,
			'controller' => $controller,
			'method' => $method,
            'success'=>$success,
			'created_at' => date('Y-m-d H:i:s'),
		]);

	}

}