<x-form.toggle wire:change="changeStatus('{{$model}}','{{$id}}','{{$field}}')"
               name="status-{{$id}}"
               checked="{{$checked}}">
</x-form.toggle>