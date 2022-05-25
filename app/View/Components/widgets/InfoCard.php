<?php

namespace App\View\Components\widgets;

use Illuminate\View\Component;

class InfoCard extends Component
{

    public int $count;
    public string $tittle;
    public string $subTittle;
    public string $colour;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count,$tittle,$subTittle,$colour)
    {
        $this->count=$count;
        $this->tittle=$tittle;
        $this->subTittle=$subTittle;
        $this->colour=$colour;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widgets.info-card');
    }
}
