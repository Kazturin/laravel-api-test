<?php

namespace App\Http\Livewire\Table;

use App\Models\ArticleCategory;
use Livewire\Component;

class ArticleCategoryTable extends LivewireTable
{
    public function render()
    {
        return view('livewire.table.article-category-table',[
            'articleCategories' => ArticleCategory::orderBy($this->sortField,$this->sortDirection)->paginate(10)
        ]);
    }

    public function updateOrder($list){

        foreach ($list as $item) {
            ArticleCategory::find($item['value'])->update(['sort'=>$item['order']]);
        }
    }
}
