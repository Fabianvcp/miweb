<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show(Portfolio $portfolio)
    {

        return view('portfolio.show', compact('portfolio'));
    }
}
