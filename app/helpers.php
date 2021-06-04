<?php


///////////// response jeson function //////////////
function responseJeson($status, $message, $data=null)
{
 $response    = [
   'status'  => $status,
   'message' =>$message,
   'data'    => $data
 ];
   return response()->json($response);
}

///////////// load categories function //////////////
if (!function_exists('load_dep')) {
	function load_dep($select = null, $dep_hide = null) {

		$departments = \App\Models\Category::selectRaw('name as text')
			->selectRaw('id as id')
			->selectRaw('parent as parent')
			->get(['text', 'parent', 'id']);
		$dep_arr = [];
		foreach ($departments as $department) {
			$list_arr             = [];
			$list_arr['icon']     = '';
			$list_arr['li_attr']  = '';
			$list_arr['a_attr']   = '';
			$list_arr['children'] = [];

			if ($select !== null and $select == $department->id) {

				$list_arr['state'] = [
					'opened'   => true,
					'selected' => true,
					'disabled' => false,
				];
			}

			if ($dep_hide !== null and $dep_hide == $department->id) {

				$list_arr['state'] = [
					'opened'   => false,
					'selected' => false,
					'disabled' => true,
					'hidden'   => true,
				];
			}

			$list_arr['id']     = $department->id;
			$list_arr['parent'] = $department->parent > 0?$department->parent:'#';
			$list_arr['text']   = $department->text;
			array_push($dep_arr, $list_arr);
		}

		return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
	}
}



///////////// active menu function //////////////
if(! function_exists('active_menu'))
{
    function active_menu($link)
    {
        if(preg_match('/' .$link. '/', Request::segment(2)))
        {
            return ['active', 'display:block'];
        }else
        {
            return ['', '' ];
        }

    }
}
