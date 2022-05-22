<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($zip)
    {
        try {
            $username = Auth::user()->name;

            $response = Storage::download("" . $username . "/" . $zip . "");
            ob_end_clean();

            return $response;
        } catch (\Throwable$e) {
            abort(404);
        }
    }
}
