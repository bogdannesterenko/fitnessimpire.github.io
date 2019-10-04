<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo(Posts::class);
    }
    public function getActionButtonsAttribute() 
    {
        $buttons = '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
			  <a href="'.route('admin.comments.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>'.
            '<a href="'.route('admin.comments.delete', $this).'" name="confirm_item" class="btn btn-danger"
                data-trans-button-cancel="'.__('buttons.general.cancel').'"
                data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                ><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.delete_permanently').'"></i></a> </div>';
        return $buttons;
    }
    public function getApprovedResultAttribute() 
    {
        if ($this->approved) {
            return 'Да';
        } else {
            return 'Нет';
        }
    }
    public function getPostNameAttribute() 
    {
        if ($this->post) {
            return '<a href="'.route('admin.posts.edit',$this->post).'">'.$this->post->title.'</a>';
        }
    }
}
