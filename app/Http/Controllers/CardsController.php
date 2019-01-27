<?php

namespace App\Http\Controllers;

use Auth;
use App\Card;
use App\Listing;
use Validator;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function new ($listing_id){

        return view('card/new', ['listing_id' => $listing_id]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), ['card_title' => 'required|max:255', 'card_memo' => 'required|max:255',]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $cards = new Card;
        $cards->title = $request->card_title;
        $cards->listing_id = $request->listing_id;
        $cards->memo = $request->card_memo;

        $cards->save();

        return redirect('/');
    }

    public function show($listing_id, $card_id){

        $card = Card::find($card_id);
        $card->delete();

        return redirect('/');
    }
}
