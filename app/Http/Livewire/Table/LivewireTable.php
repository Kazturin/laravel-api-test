<?php

namespace App\Http\Livewire\Table;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class LivewireTable extends Component
{
    use WithPagination;

    public $sortField = 'sort';
    public $sortDirection = 'asc';

    public function sortBy($field){

        if ($this->sortField = $field){
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' :'asc';
        }else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updateOrder($list){

        foreach ($list as $item) {
            Article::find($item['value'])->update(['sort'=>$item['order']]);
        }
    }
}
