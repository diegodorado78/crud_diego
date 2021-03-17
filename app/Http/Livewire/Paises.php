<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Paises extends Component{
    public $paises =['colombia','peru','argentina'];
    public $pais;

    public function render()
    {
        return view('livewire.paises');
    }
    public function actualizar(){
    // al llamr el metodo agrega la var  wire:model='pais' q se vuelve $pais y lo push al array paises... no use $
    array_push($this->paises,$this->pais);
    // metodo para limpiar la var pais
    $this->reset('pais');
    }
}
