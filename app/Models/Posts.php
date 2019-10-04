<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;
use App\Models\Auth\User;

class Posts extends Model
{
    public function getActionButtonsAttribute() 
    {
        $buttons = '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
			     <a href="'.route('admin.posts.edit', $this).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>'.
                 '<a href="'.route('admin.posts.delete', $this).'" name="confirm_item" class="btn btn-danger"
                     data-trans-button-cancel="'.__('buttons.general.cancel').'" 
                     data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                     data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                    ><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.delete_permanently').'"></i></a>
                 </div>';
        return $buttons;
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id');
    }
    public function getAuthorNameAttribute(){
        if ($this->author) {
            return $this->author->first_name;
        } else {
            return 'Удален';
        }
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
