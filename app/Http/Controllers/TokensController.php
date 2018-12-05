<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TokensModel;
use App\Http\Resources\TokensModel as TokensModelResource;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tokens = TokensModel::all();

        //return 
        return TokensModelResource::collection($tokens); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $tokensModel = new TokensModel();
        $tokensModel->token_string = $request->token_string;
        //check if the token exists then do what 
        $tokensModel->save(); 

        


    }

    
    
}
