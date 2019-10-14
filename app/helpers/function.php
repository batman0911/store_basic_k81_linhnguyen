<?php
function showError($errors, $nameInput)
{
    if($errors->has($nameInput))
    {
    echo '<div class="alert alert-danger" role="alert">';
    echo '<strong>'.$errors->first($nameInput).'</strong>';
    echo '</div>';
    }
}

function getCategory($category_array, $parent_id, $shift, $id_select){
	foreach ($category_array as $value){
		if($value['parent_id'] == $parent_id){
			if($value['id'] == $id_select){
				echo '<option selected value="'.$value['id'].'">'.$shift.$value['name'].'</option>';
			}
			else{
				echo '<option value="'.$value['id'].'">'.$shift.$value['name'].'</option>';
			}
			getCategory($category_array, $value['id'], $shift."---|", $id_select);
		}
	}
}

function showCategory($category_array, $parent_id, $shift){
	foreach ($category_array as $value){
		if($value['parent_id'] == $parent_id){
			echo '<div class="item-menu"><span>'.$shift.$value['name'].'</span>
            <div class="category-fix">
                <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>
                <a class="btn-category btn-danger" href="/admin/category/delete/'.$value['id'].'"><i class="fas fa-times"></i></i></a>
            </div>
        </div>';
			showCategory($category_array, $value['id'], $shift."---|");
		}
	}
}


