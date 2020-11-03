<div class="form-group clearfix text-center">
@foreach($roles as $role)
    <!-- checkbox -->
        <div class="icheck-midnightblue d-inline checkbox-wrapper" data-toggle="popover" title="Permisos de este rol" data-content="{{ $role->permissions->pluck('name')->implode(', ') }}">
            <input name="roles[]" type="checkbox" id="{{ $role->id }}"  value="{{ $role->name }}">
            <label for="{{ $role->id }}">
                {{ $role->name }}
            </label>
        </div>
    @endforeach
</div>
