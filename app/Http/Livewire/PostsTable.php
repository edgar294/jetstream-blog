<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostsTable extends Component
{

	use WithPagination;

	public string $title = '';
	public string $description = '';
    public string $publication_date = '';
	public string $search = '';
	public string $perPage = '5';
    public string $orderBy = 'id';
    public string $order = 'desc';

    public function render():View
    {
        if(Auth::user()){
            return view('livewire.posts-table',[
            'posts' => Post::with('user')
                            ->where("user_id", "=", Auth::user()->id)
                            ->where(function ($query){
                                $query->where("title", "LIKE", "%{$this->search}%")
                                        ->orWhere("description", "LIKE", "%{$this->search}%");
                            })
                            ->orderBy($this->orderBy, $this->order)
                            ->paginate($this->perPage)
                ])->layout('layouts.app');
        }
        else{
            return view('livewire.posts-table',[
            'posts' => Post::with('user')
                            ->where("title", "LIKE", "%{$this->search}%")
                            ->orWhere("description", "LIKE", "%{$this->search}%")
                            ->orderBy($this->orderBy, $this->order)
                            ->paginate($this->perPage)
                ])->layout('layouts.guest');
        }
    }

    public function clearFilters():void
    {
    	$this->search = '';
    	$this->perPage = '5';
    	$this->page = '1';
    }

    public function store():void
    {
    	$this->validate([
            'title' => 'required',
            'description' => 'required',
            'publication_date' => 'required'
        ]);

    	Post::create([
    		'title' => $this->title,
    		'description' => $this->description,
            'user_id' => Auth::id(),
            'publication_date' => $this->publication_date
    	]);

        $this->clearForm();
        session()->flash('success', 'Post Saved');
    }

    public function clearForm():void
    {
    	$this->title = '';
    	$this->description = '';
        $this->publication_date = date("Y-m-d H:i:s");
    }

    public function changeOrder(string $orderBy): void
    {
        if($this->orderBy == $orderBy){
            $this->order = ($this->order == 'desc') ? 'asc' : 'desc';
        }
        else{
            $this->orderBy = $orderBy;
            $this->order = 'desc';
        }
    }
}
