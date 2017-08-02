<?php
class CI_Commanfunction{
	public function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL) 
	{ 	
		$t =& get_instance(); 
		$slug = url_title($string); 
		$slug = strtolower($slug); 
		$i = 0; 
		$params = array (); 
		$params[$field] = $slug; 
		if($key)
			$params["$key !="] = $value; 
			while ($t->db->where($params)->get($table)->num_rows()) 
			{ 
				if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
					$slug .= '-' . ++$i; 
				}
				else{ 
					$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
				} 
				$params [$field] = $slug; 
			} 
			return $slug; 
	}
	
	public function filterSearchQueryGenerator($filters){
		$location = '';
		$type='';
		$vendor='';
		$query='';
		foreach($filters as $filter){
			if(substr($filter, 0, 2) == 'l-'){
				$location=$location.'\''.substr($filter,2,strlen($filter)).'\',';
			}
			if(substr($filter, 0, 2) == 't-'){
				$type = $type.'\''.substr($filter,2,strlen($filter)).'\',';
			}
			if(substr($filter, 0, 2) == 'v-'){
				$vendor = $vendor.substr($filter,2,strlen($filter)).',';
			}
		}
		
		if($location!=''){
			$query=$query.'s.location in('.substr($location,0,strlen($location)-1).') ';
		}
		if($type!=''){
			if($query==''){
				$query=$query.'s.training_type in('.substr($type,0,strlen($type)-1).') ';
			}else{
				$query=$query.' and '.'s.training_type in('.substr($type,0,strlen($type)-1).') ';
			}
		}
		if($vendor!=''){
			if($query==''){
				$query=$query.'v.id in('.substr($vendor,0,strlen($vendor)-1).') ';
			}else{
				$query=$query.' and '.'v.id in('.substr($vendor,0,strlen($vendor)-1).') ';
			}
		}
		if($query!=''){
			$query = ' and '.$query;
		}
		return $query;
	}
}
?>