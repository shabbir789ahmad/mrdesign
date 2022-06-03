<?php 

namespace App\Helpers;

class Form {

	public static function createEloquent($model, $data) {

		$route = explode('.', \Route::currentRouteName())[0];
		
		try {

			$model::create($data);

			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('flash', 'success');
			
		} catch (\Exception $e) {
			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->route($route . ".index")->with('flash', 'error');
			
		}

	}

	public static function updateEloquent($model, $id, $data) {

		$route = explode('.', \Route::currentRouteName())[0];
	
		try {

			$m=$model::findOrFail($id)->update($data);
              
			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('flash', 'success');
			
		} catch (\Exception $e) {
			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->back()->withInput()->with('flash', 'error');
			
		}

	}

	public static function deleteEloquent($model, $id) {

		$route = explode('.', \Route::currentRouteName())[0];
 
		try {

			$model::destroy($id);

			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('flash', 'success');

		} catch (\Exception $e) {
			\App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->route($route . ".index")->with('flash', 'error');

		}
		
	}

}