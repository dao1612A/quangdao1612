<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-10">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label  class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count"  name="name" value="{{ old('name',$role->name ?? '') }}">
                        @if($errors->first('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label  class="required">Guard <span>(*)</span></label>
                        <input type="text" class="form-control"  name="guard_name" value="admins" disabled>
                    </div>
                    <div class="form-group">
                        <label  class="">Description </label>
                        <input type="text" class="form-control"  name="description" value="{{ old('description', $role->description ?? '') }}" >
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    @foreach($permissions as $key => $groupPermission)
                    <div class="row" style="margin-bottom: 1rem;border-bottom: 1px solid #dedede">
                        <div class="col-sm-12">
                            <h5>{{ $groups[$key] }}</h5>
                        </div>
                        @foreach($groupPermission as $permission)
                            <div class="col-sm-3">
                                <label class="box-checkbox"> {{ $permission->description }}
                                    <input type="checkbox" name="permission[]" {{ in_array($permission->id,$permissionActive) ? "checked" : ""}}  value="{{ $permission->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Action <span>(*)</span></label>
                        <div>
                            <button class="btn btn-info"><i class="la la-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
