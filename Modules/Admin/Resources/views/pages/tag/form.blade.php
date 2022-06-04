<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count" value="{{ old('t_name', $tag->t_name ?? '') }}" data-title-seo=".title_seo" data-slug=".slug" name="t_name" id="inputName" placeholder="">
                        @if($errors->first('t_name'))
                            <span class="text-danger">{{ $errors->first('t_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1">Slug <span>(*)</span></label>
                        <input type="text" class="form-control slug" value="{{ old('t_slug', $tag->t_slug ?? '') }}" name="t_slug" id="inputName" placeholder="">
                        @if($errors->first('t_slug'))
                            <span class="text-danger">{{ $errors->first('t_slug') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                    <div class="view-seo">
                        <a href="" class="view-seo-title title_seo">It is Very Easy to Customize and it uses in your website apllication.</a>
                        <p class="view-seo-slug">It is Very Easy to Customize and it uses in your website apllication. <span class="slug">121212121</span></p>
                        <p class="mb-2 view-seo-description">It is Very Easy to Customize and it uses in your website apllication.</p>
                    </div>
                </div>
                <div class="card-body pt-3 box-seo hide">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                        <input type="text" class="form-control title_seo"  value="{{ old('t_title_seo', $tag->t_title_seo ?? '') }}" name="t_title_seo" id="inputName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="t_description_seo" value="{{ old('t_description_seo', $tag->t_description_seo ?? '') }}" id="inputName" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1"> Action <span>(*)</span></label>
                        <div>
                            <button class="btn btn-info" name="save" value="save"><i class="la la-save"></i> Save</button>
                            <button class="btn btn-success" name="save" value="edit"><i class="la la-check-circle"></i> Save & Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1"> Status <span>(*)</span></label>
                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="t_status" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                <!--placeholder-->
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
                        <label class="required" for="exampleInputEmail1"> Hot <span>(*)</span></label>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật
                                <input type="radio" name="t_hot" {{ ($tag->t_hot ?? 0) == 1 ? 'checked="checked"' : '' }} value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="box-checkbox"> Mặc định
                                <input type="radio" name="t_hot" {{ ($tag->t_hot ?? 0) == 0 ? 'checked="checked"' : '' }} value="0">
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
                                <input type="checkbox" name="t_position_1" {{ ($tag->t_position_1 ?? 0) == 1 ? 'checked' : '' }} value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật danh mục
                                <input type="checkbox" name="t_position_2" {{ ($tag->t_position_2 ?? 0) == 1 ? 'checked' : '' }} value="1">
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
                        <input type="hidden" name="t_avatar" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
