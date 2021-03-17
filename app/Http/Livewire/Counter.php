<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component{
  public $counter;
  public $titulo;
  public$descripcion;

    public function mount($data){
        $this->titulo = $data['titulo'];
        $this->descripcion = $data['descripcion'];


    }
    public function render()
    {
        return view('livewire.counter');
    }
    public function incrementar(){
        $this->counter++;
    }
}
