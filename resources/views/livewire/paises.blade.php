 {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
<div class="container my-10 mx-auto">
<h1> Listado de paises </h1>
{{-- uso wire:model="pais para traer la var que declare en la clase del comp, debe ir sin $" --}}
{{-- PREVENT evita que la pagina se cargue y borre el registro que se agrego --}}
<form action="" wire:submit.prevent="actualizar">
<input type="text" placeholder="ingresa un nuevo pais" wire:model= "pais" >
<button type="submit" >enviar</button>
{{-- wire:click="actualizar" o wire:keydown.enter="actualizar" --}}
</form>
<ul>
{{-- hago un for del array  $paises de la clase Paises.php e imprimo su nombre en los li --}}
@foreach ($paises as $item)
    <li> {{$item}}</li><br>
@endforeach
   </ul>
</div>
