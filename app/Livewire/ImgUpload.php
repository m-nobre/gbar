<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Str;
use Auth;

class ImgUpload extends Component
{    use WithFileUploads;
    
    #[Validate('image')]
    public $image;
    public $old_image;
    public $book;
    public $key;
    public $metaData;
    public $img_url;

    public function mount()
    {
       
        $this->key = Str::random(32);
        $this->old_image = $book->image ?? NULL;
        $this->image = NULL;

    }
    
    public function updatedImage($value){
        $this->savePhoto();
    }

    public function savePhoto()
    {
        $filename = str()->random().".".$this->image->extension();
        
        $photo = $this->image->storeAs(
            Auth::User()->id,
            $filename,
            'uploads'
        );

        $this->old_image = NULL;
        $this->image_url = 'media/uploads/'.$photo;



    }
    public function render()
    {
        return view('livewire.img-upload');
    }
}
