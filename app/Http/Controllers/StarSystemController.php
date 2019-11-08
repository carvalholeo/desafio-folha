<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarSystemController extends Controller
{
    private $star;
    private $customStar;
    private $engineers;
    private $counterDefaultStar;
    private $counterEnginners;
    private $counterCustomStar;
    private $starHasVowels;

    private function calculateEngineers(string $star) : int
    {
        $counter = 1;
        for ($i = 0; $i < strlen($star); $i++) {
            switch ($star[$i]) {
                case 'A':
                    $counter *= 1;
                    break;
                case 'E':
                    $counter *= 2;
                    break;
                case 'I':
                    $counter *= 3;
                    break;
                case 'O':
                    $counter *= 5;
                    break;
                case 'U':
                    $counter *= 8;
                    break;
            }
        }
        return $counter;
    }

    private function verifyIfExistsVowel(string $star) : bool
    {
        $verifyStar = str_split($star);

        foreach ($verifyStar as $singleLetter) {
            if ($singleLetter == 'A' ||
                $singleLetter == 'E' ||
                $singleLetter == 'I' ||
                $singleLetter == 'O' ||
                $singleLetter == 'U')
            {
                return TRUE;
            } else {
                continue;
            }
        }
        return FALSE;
    }

    public function show()
    {
        return view('index');
    }

    private function customStar(Request $request) : void
    {
        $customStar = $request->input('customStar');
        $engineers = (int) $request->input('engineers');

        $customStar = strtoupper($customStar);

        $starHasVowels = self::verifyIfExistsVowel($customStar);
        
        if ($starHasVowels){
            $counterCustomStar = self::calculateEngineers($customStar);
        } else {
            $counterCustomStar = 0; 
        }

        if($engineers == $counterCustomStar) {
            $request->session()
                    ->flash('customSuccess', "VOCÊ ACERTOU!!! A quantidade de engenheiros para a estrela $customStar é $counterCustomStar");
        } else {
            $request->session()
                    ->flash('customWrong', "Infelizmente, você errou :-C A quantidade de engenheiros para a estrela $customStar é $counterCustomStar");
        }
    }

    public function form(Request $request)
    {
        $star = (string) $request->input('star');
        $counterDefaultStar = (int) self::calculateEngineers($star);

        $validatedData = $request->validate([
            'star' => 'required | string',
            'customStar' => 'string | nullable',
            'engineers' => 'numeric | nullable | min:0',
        ]);

        $request->session()->flash('default', "A quantidade de engenheiros para a estrela $star é $counterDefaultStar");

        if ($request->filled('customStar'))
            {
                self::customStar($request);
            }
            return redirect('/')->withInput();
    }
}
