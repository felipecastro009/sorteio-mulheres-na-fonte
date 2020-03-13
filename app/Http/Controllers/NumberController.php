<?php

namespace App\Http\Controllers;

use App\Models\Number\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    private $numbers;

    public function __construct(Number $numbers)
    {
        $this->numbers = $numbers;
    }

    public function index()
    {
        $results = $this->numbers->latest()->get();

        $number = $this->numbers->latest()->first();

        return view('numbers.index', compact('results', 'number'));
    }

    public function sorter(Request $request)
    {
        $number = rand(1, 700);

        $numbers = $this->numbers->get();

        $error = false;

        if($numbers->count() == 0):
            $error = true;
        endif;

        while(!$error):
            foreach ($numbers as $numero):
                if($number == $numero->number):
                    $error = false;
                    $number = rand(1, 700);
                else:
                    $error = true;
                endif;
            endforeach;
        endwhile;

        $result = $this->numbers->create(['number' => $number]);

        return redirect()->route('numbers.index');
    }
}
