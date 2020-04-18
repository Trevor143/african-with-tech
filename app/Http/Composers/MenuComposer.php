<?php


namespace App\Http\Composers;

use Backpack\MenuCRUD\app\Models\MenuItem;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view )
    {
        $items =  MenuItem::all();

        $view->with('items', $items);
    }
}
