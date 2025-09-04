<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // kazemo da je model Contact veza sa tabelom contacts u bazi,
    //mada ovde nije potrebna ova linija koda jer se model zove Contact a ne ContactModel
    protected $table = "contacts";

    // kazemo koja polja se mogu popuniti u bazi - ostala polja ne mogu da se menjaju - sigurnost protiv promena sa strane
    protected $fillable = [
        "email",
        "subject",
        "message"
    ];
}
