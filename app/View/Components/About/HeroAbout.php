<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class HeroAbout extends Component
{
    public $title;
    public $breadcrumb;
    public $image;

    public function __construct($title = "About Us", $breadcrumb = "Home > About", $image = "/images/about.jpg")
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.about.hero-about');
    }
}
