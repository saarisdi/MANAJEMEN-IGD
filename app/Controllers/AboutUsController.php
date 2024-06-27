<?php

namespace App\Controllers;

class AboutUsController extends BaseController
{
    public function index()
    {
        $developers = [
            [
                'name' => 'Saiful Faris Riyadi',
                'bio' => '3411211073',
                'image' => 'saiful.png'
            ],
            [
                'name' => 'Regitha Zizilia',
                'bio' => '3411211080',
                'image' => 'regitha.png'
            ],
            
            [
                'name' => 'Giyan Radhietya Akmal',
                'bio' => '3411211093',
                'image' => 'giyan.png'
            ],
            
        ];

        
        return view('about_us', ['developers' => $developers]);
    }
}
