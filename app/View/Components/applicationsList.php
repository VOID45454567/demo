<?php

namespace App\View\Components;

use App\Models\Application;
use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ApplicationsList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        /** @var Collection<int, Application>
         * @var Collection<int, Review>
         */
        public Collection $applications,
        public Collection $reviews,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applications-list');
    }
}