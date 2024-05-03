<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{
    public $img;
    public $title;
    public $subtitle;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($img, $title, $subtitle, $description)
    {
        $this->img = $img;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.movieCard');
    }
}
