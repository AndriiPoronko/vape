<?php

namespace App\Http\Controllers\Call;

use App\Http\Controllers\Controller;
use App\Models\Call;

class UpdateController extends Controller
{
    public function __invoke(Call $call){
        $data['progress'] = 2;
        $call->update($data);

        return redirect(route('call.index'));
    }
}
