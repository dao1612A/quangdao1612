<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label  class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count"  name="name" value="{{ old('name',$permission->name ?? '') }}">
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
                        <input type="text" class="form-control"  name="description" value="{{ old('description', $permission->description ?? '') }}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Group <span>(*)</span></label>
                        <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="group_permission" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                @foreach($groups as $key => $group)
                                    <option value="{{ $key }}" {{ ($permission->group_permission ?? 0) == $key ? "selected" : "" }}> {{ $group }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Action <span>(*)</span></label>
                        <div>
                            <button class="btn btn-info"><i class="la la-save"></i> Save</button>
                            <button class="btn btn-success"><i class="la la-check-circle"></i> Save & Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
