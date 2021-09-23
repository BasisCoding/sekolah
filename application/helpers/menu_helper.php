<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('menu_helper')) {
	function fetch_menu($data){

		$show = '';
		$menu1 = "";
		foreach($data as $menu){
			// $menu1 .= "<li><a href=".site_url('parent-menu/'.$menu->slug).">".$menu->category_name."</a>";
			if (!empty($menu->sub)) {
				$anchor = '<a class="nav-link" href="#'.$menu->link.'" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="'.$menu->link.'">
						<i class="'.$menu->icon.' '.$menu->color.'"></i>
						<span class="nav-link-text">'.$menu->nama_menu.'</span>
					</a>';
			}else{
				$anchor = '<a class="nav-link" href="'.base_url($menu->link).'">
						<i class="'.$menu->icon.' '.$menu->color.'"></i>
						<span class="nav-link-text">'.$menu->nama_menu.'</span>
					</a>';
			}

			$menu1 .= '<li class="nav-item">'.$anchor;

			if(!empty($menu->sub)){

				$menu1 .= '<div class="collapse" id="'.$menu->link.'">
				<ul class="nav nav-sm flex-column">';

				$menu1 .= fetch_sub_menu($menu->sub);

				$menu1 .= '</ul>
				</div>';
			}
			$menu1 .= '</li>';
		}
		return $menu1;
	}

	function fetch_sub_menu($sub_menu){
		$sub = "";
		foreach($sub_menu as $menu){

			if (!empty($menu->sub)) {
				$anchor = '<a href="#'.$menu->link.'" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="'.$menu->link.'">'.$menu->nama_menu.'</a>';
			}else{
				$anchor = '<a href="'.base_url($menu->link).'" class="nav-link">'.$menu->nama_menu.'</a>';
			}

			$sub .= '<li class="nav-item">'.$anchor;
			
			if(!empty($menu->sub)){

				$menu1 .= '<div class="collapse" id="'.$menu->link.'">
				<ul class="nav nav-sm flex-column">';

				$sub .= fetch_sub_menu($menu->sub);

				$sub .= "</ul>
				</div>";
			}		
			$sub .= '</li>';
		}
		return $sub;
	}
}
?>