<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $subTitle;
    public $description;
    public function __construct($title, $subTitle, $description)
    {
        $this->title = $title;
        $this->subTitle =$subTitle;
         $this->description=$description;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout');
    }

    //Component Methods

    public function addNumber($a){
        return $a+20;
    }
}
