<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Title extends Component
{
    /**
     * Create a new component instance.
     */
    public $badge, $title, $paragraph1, $paragraph2, $button1Text, $button2Text, $button1Url, $button2Url;
    public function __construct(
        $badge = '',
        $title = '',
        $paragraph1 = '',
        $paragraph2 = '',
        $button1Text = '',
        $button2Text = '',
        $button1Url = '',
        $button2Url = ''
    ) {
        //
        $this->badge = $badge;
        $this->title = $title;
        $this->paragraph1 = $paragraph1;
        $this->paragraph2 = $paragraph2;
        $this->button1Text = $button1Text;
        $this->button2Text = $button2Text;
        $this->button1Url = $button1Url;
        $this->button2Url = $button2Url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.title');
    }
}
