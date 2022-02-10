<?php


namespace App\filters;

use Illuminate\Http\Request;

class PostFilters
{
    protected $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
