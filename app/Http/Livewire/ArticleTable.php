<?php

namespace App\Http\Livewire;

//use App\Models\Article;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleTable extends Component
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

    public function render()
    {
        return view('livewire.article-table',[
            'articles' => Article::orderBy($this->sortField,$this->sortDirection)->paginate(10)
        ]);
    }
}
