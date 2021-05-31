<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class ImporterComponent extends Component
{

	public array $posts = [];
	// public string $url = 'https://sq1-api-test.herokuapp.com/posts';
    public string $url = '';
	public ?User $admin = null;

    public function render(): View
    {
        // Initialize Admin User to import
    	$this->admin = User::where('name', 'admin')->first();
        return view('livewire.importer-component');
    }

    public function beginImport(): void
    {
        try{
        	$client = new Client();
        	$response = $client->request('GET', $this->url, [
                'verify'  => false,
            ]);

            $responseBody = json_decode($response->getBody());
            $this->posts = $responseBody->data;
            session()->flash('success', 'Posts Imported');
        }
        catch(RequestException $e){
            session()->flash('error', 'An error is ocurred when is trying import the posts');
        }
    }

    public function confirmImport(): void
    {
    	foreach ($this->posts as $post) {
    		Post::create([
    		'title' => $post['title'],
    		'description' => $post['description'],
            'user_id' => $this->admin->id,
            'publication_date' => $post['publication_date']
    	]);
    	}

    	$this->posts = [];
		session()->flash('success', 'Posts import was saved in the database successfully');
    }

    public function cancelImport(): void
    {
    	$this->posts = [];
    	session()->flash('error', 'Posts import was canceled');
    }
}
