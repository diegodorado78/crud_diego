<div class="container m-auto">
    <div class="bg-white border border-gray-300 rounded-lg shadow-lg max-w-4xl mx-auto mb-4">
    <div  class="w-5/6 mx-auto my-4">

    <form wire:submit.prevent="crear">
<label class="form-label" for="name">Nombre</label>
        <input type="text" id="name" placeholder="Ingrese un nombre"class="form-control form-control:focus" wire:model="name">
         <label class="form-label" for="escription">Descripción</label>
        <textarea rows="4" id="body" class="form-control form-control:focus" wire:model="body">
        </textarea>
         <label class="form-label" for="image">Imagen</label>
        <input type="file" id="image" class="form-input" wire:model="image"><p></p>
        {{-- directiva blade de cod que evalua la var del comp y ejecuta el cod anidado a un metodo --}}
        @if ($state=="crear")
         <button  type="submit" wire:click="crear"class="btn-blue">Crear post</button>
        @else
         <button wire:click="update"class="btn-blue">Actualizar</button>
         <button wire:click="default"class="btn-red">Cancelar</button>
        @endif
    </div>
    </div>
        </form>

    <table class="bg-white border border-gray-300 rounded-lg max-w-4xl mx-auto">
        <thead class="bg-gray-200 text-sm text-gray-500 uppercase ">
            <tr>
                <th>Id</th>
                 <th>Nombre</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
      @foreach ($posts as $item)
     <tr class=" text-sm text-gray-600">
     <td class="p-2 "> {{$item->id}}</td>
     <td class="p-2 "> {{$item->name}}</td>
     <td class="p-2 ">{{$item->body}}</td>
     <td class="p-2 "> <img src="{{asset('storage/photos/'.$item->image)}}" ></td>
     <td class="p-2 ">
         {{-- metodo para llamar al metodo edit con param $item que defino en la clase postcomponet --}}
         <button wire:click="edit({{$item}})" class="btn-blue">Editar</button>
         <button wire:click="destroy({{$item}})" class="btn-red">Eliminar</button>
    </td>
    </tr>
@endforeach
        </tbody>
</table>
</div>
