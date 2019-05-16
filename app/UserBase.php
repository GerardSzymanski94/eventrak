<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBase extends Model
{
    protected $table = 'users_base';

    protected $fillable = ['nip', 'id_abc', 'id_abc_sklep', 'nazwa', 'kontakt', 'kod_pocztowy', 'miejscowosc', 'ulica', 'firma_nazwa', 'firma_kontakt'];
}
