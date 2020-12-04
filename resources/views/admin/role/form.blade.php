<div class="form-group">
    <label>Role</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ isset($role->name) ? old('name', $role->name) : old('name') }}">
    @include('layouts.error', ['name' => 'name'])
</div>
<div class="form-group">
    <label>Permission</label>
    <select name="permission[]" id="permission" class="select2" multiple="multiple" style="width: 100%">
        @foreach($permissions as $id => $permissions)
            @if ($formMode === "1")
                <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>                
            @else
                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>                
            @endif
        @endforeach
    </select>
    @include('layouts.error', ['name' => 'permission'])
</div>