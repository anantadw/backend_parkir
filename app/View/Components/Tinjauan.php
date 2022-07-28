<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tinjauan extends Component
{
    public $titles = [];
    public $numbers = [];
    public $types = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title1, $title2, $number1, $number2, $type1, $type2)
    {
        $this->titles = [$title1, $title2];
        $this->numbers = [$number1, $number2];
        $this->types = [$type1, $type2];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->titles);
        return view('components.tinjauan');
    }
}
