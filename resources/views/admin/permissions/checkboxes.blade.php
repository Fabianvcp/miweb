
<div class="form-group">
    <div class="container">
        <div class="row">
            @foreach( $permissions as $id =>$name)
                <div class="col-3 mb-3">
                    <!-- checkbox -->
                    <div class="icheck-midnightblue d-inline">
                        <input name="permissions[]" type="checkbox" id="permission-{{ $id }}" value="{{ $name }}"
                               {{ collect(old('permissions'))->contains($name) ? 'checked' : ''}}
                            {{ $model->permissions->contains($id) ? 'checked' : '' }}>
                        <label for="permission-{{ $id }}">
                            {{ $name }}
                        </label>
                    </div>
                    <!-- checkbox -->
                </div>
            @endforeach
        </div>
    </div>
</div>
