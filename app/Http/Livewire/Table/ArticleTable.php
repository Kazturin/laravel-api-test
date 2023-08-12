<?php

namespace App\Http\Livewire\Table;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleTable extends LivewireTable
{
    public function render()
    {
        return view('livewire.table.article-table',[
            'articles' => Article::orderBy($this->sortField,$this->sortDirection)->paginate(10)
        ]);
    }

    public function updateOrder($list){

        foreach ($list as $item) {
           Article::find($item['value'])->update(['sort'=>$item['order']]);
        }
    }
}
