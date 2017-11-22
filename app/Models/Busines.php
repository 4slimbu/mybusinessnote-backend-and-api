<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Busines extends Model
{
    /*
     * This class is temporary.
     * A weird situation has arisen where the model factory is returning empty model for
     * model: 'App\Models\Business'. Any other name is working fine and any other namespace with
     * the same name (App\Business works) also works fine.
     * So, this class is here to get around with this problem until it gets fixed.
     */

    protected $table = 'businesses';
}