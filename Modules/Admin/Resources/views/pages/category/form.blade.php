<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" value="{{ old('c_name', $category->c_name ?? '') }}" data-slug=".slug" name="c_name" >
                        @if($errors->first('c_name'))
                            <span class="text-danger">{{ $errors->first('c_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Slug <span>(*)</span></label>
                        <input type="text"  class="form-control slug"   name="c_slug" value="{{ old('c_slug', $category->c_slug ?? '') }}">
                        @if($errors->first('c_slug'))
                            <span class="text-danger">{{ $errors->first('c_slug') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Icon <span>(*)</span></label>
                        <input type="text"  class="form-control" value="{{ old('c_icon', $category->c_icon ?? '') }}" name="c_icon">
                        <span class="d-block"><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Click xem mau</a></span>
                        @if($errors->first('c_icon'))
                            <span class="text-danger">{{ $errors->first('c_icon') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Sort <span>(*)</span></label>
                        <input type="number"  class="form-control"  name="c_sort" value="{{ old('c_sort', $category->c_sort ?? '0') }}">
                        <span class="d-block text-warning">Thứ thự được sắp xếp từ bé đến lớn</span>
                    </div>

                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                    <div class="view-seo">
                        <a href="javascript:;void(0)" class="view-seo-title title_seo">{{ $category->c_title_seo ?? "Tiêu đề SEO" }}</a>
                        <p class="view-seo-slug">{{ config('url') }}<span class="slug">{{ $category->c_slug ?? 'tieu-de-seo' }}</span></p>
                        <p class="mb-2 view-seo-description">{{ $category->created_at ?? \Carbon\Carbon::now() }} - {{ $category->c_description_seo ?? "Mô tả SEO" }}.</p>
                    </div>
                </div>
                <div class="card-body pt-3 box-seo hide">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                        <input type="text" class="form-control title_seo"  value="{{ old('c_title_seo', $category->c_title_seo ?? '') }}" name="c_title_seo" id="inputName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="c_description_seo" value="{{ old('c_description_seo', $category->c_description_seo ?? '') }}" id="inputName" placeholder="">
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
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Status <span>(*)</span></label>
                        <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="c_status" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                <option title="Public" value="1">Public</option>
                                <option title="hide" value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="" for="exampleInputEmail1"> Hot </label>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật
                                <input type="radio" name="c_hot" {{ ($category->c_hot ?? 0) == 1 ? 'checked' : '' }}  value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="box-checkbox"> Không nổi bật
                                <input type="radio" name="c_hot" {{ ($category->c_hot ?? 0) ==  0 ? 'checked' : '' }} value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="" for="exampleInputEmail1"> Position </label>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật trang chủ
                                <input type="checkbox" name="c_position" {{ ($category->c_position ?? 0) == 1 ? 'checked' : '' }} value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond" name="avatar">
                        <input type="hidden" name="c_avatar" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
