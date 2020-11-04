
<div class="form-group">
    <div class="container">
        <div class="row">
            @foreach( $permissions as $permission)
                <div class="col-3 mb-3">
                    <!-- checkbox -->
                    <div class="icheck-midnightblue d-inline">
                        <input name="permissions[]" type="checkbox" id="permission-{{ $permission->id }}" value="{{ $permission->name }}"
                               {{ collect(old('permissions'))->contains($permission->name) ? 'checked' : ''}}
                            {{ $model->permissions->contains($permission->id) ? 'checked' : '' }}>
                        <label for="permission-{{ $permission->id }}">
                            {{ $permission->display_name }}
                        </label>
                    </div>
                    <!-- checkbox -->
                </div>
            @endforeach
        </div>
    </div>
</div>
