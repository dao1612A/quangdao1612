<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}">
                        @if($errors->first('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Email <span>(*)</span></label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Address <span>(*)</span></label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Phone <span>(*)</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? '' }}">
                        @if($errors->first('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
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
{{--            <div class="card  box-shadow-0 ">--}}
{{--                <div class="card-body pt-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1"> Status <span>(*)</span></label>--}}
{{--                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="true">--}}
{{--                            <select name="somename" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">--}}
{{--                                <option title="Public" value="1">Public</option>--}}
{{--                                <option title="hide" value="0">Hide</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    @if(isset($user->avatar))
                        <a href="">
                            <img src="{{ pare_url_file($user->avatar) }}" style="width: 120px;height: 60px" alt="">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
