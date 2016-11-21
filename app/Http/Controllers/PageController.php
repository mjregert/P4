<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Display the main page.
 *
 * @return index.blade.php main page
 */
class PageController extends Controller
{
    public function __invoke() {
        return view('index');
    }
}
