<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class PostComponent extends Component{
    use WithFileUploads;
    public $name, $body,$post_id,$image,$filename;
    public $state="crear";// variable de estado para controlar que metodo se llama


    public function crear(){
        $this->validate([
       'image' => 'image|max:1024',
  ]);
   $filename =  md5($this->image . microtime()).'.'.$this->image->extension();
    $this->image->storeAs('photos', $filename);

      Post::create([ // el modelo recibe un array con los campos a llenar del nuevo registro
          'name'=>$this->name,
          'body'=>$this->body,
          'image'=>$filename
        // 'image'=>$this->image->storeAs('photos',$this->name.'.jpg')
      ]);
      $this->reset(['name','body','image']);//metodo para limpiar los campos una vez se haya creado el registro
    }
      public function render(){
        // $posts = Post::all(); //recupero los registros de Post y los guardo en un array $posts
        $posts = Post::latest('id')->get(); //metodo para irganizarlos por id del ultimo al 1
        return view('livewire.post-component',compact('posts')); //paso los registros a la vista por medio de la var 'posts'
    }
    // public function save()
    // {
    //     $this->validate([
    //         'image' => 'image|max:1024', // 1MB Max
    //     ]);

    //     $this->image->store('photos');
    // }
    public function edit(Post $item){//metodo que recibe objeto tipo Post
    $this->name = $item->name;
    $this->body = $item->body;
    $this->image = $item->image;
    $this->post_id = $item->id;
    $this->state ="actualizar";//cambia el state a actualizar para que llame al update();

    }
    public function update(){
        $post= Post::find($this->post_id);//metodo para recuperar registro por id
        //luego de recuperlo llamo al metodo update y paso los nuevos valores
        $post->update([
            'name'=>$this->name, //tomo la prop name y le asigno lo que actualmente esta en name
            'body'=>$this->body,
            'image'=>$this->image,

        ]);
      $this->reset(['name','body','state','image','post_id']);//metodo para limpiar los campos una vez se haya creado el registro

    }
    public function default(){
   $this->reset(['name','body','state','image','post_id']);//de nuevo limpio los datos
    }

    public function destroy(Post $post){//paso como param el objeto par luego eliminarlo
      $post->delete(); //elimino el registro que pase como param

    }
}
