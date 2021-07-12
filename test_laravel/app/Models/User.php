<?php
    use Illuminate\Database\Eloquent\Model;


    class User extends Model{

        protected $table= 'users';

        protected $fillable=[
            'nome',
            'username',
            'cognome',
            'password',
            'email'
        ];
    

        protected $hidden = ['password'];
    }

?>