<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count" value="{{ old('k_name', $keyword->k_name ?? '') }}" data-title-seo=".title_seo" data-slug=".slug" name="k_name" id="inputName" placeholder="">
                        @if($errors->first('k_name'))
                            <span class="text-danger">{{ $errors->first('k_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="required" for="exampleInputEmail1">Slug <span>(*)</span></label>
                        <input type="text" class="form-control slug" value="{{ old('k_slug', $keyword->k_slug ?? '') }}" name="k_slug" id="inputName" placeholder="">
                        @if($errors->first('k_slug'))
                            <span class="text-danger">{{ $errors->first('k_slug') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                    <div class="view-seo">
                        <a href="javascript:;void(0)" class="view-seo-title title_seo">{{ $keyword->k_title_seo ?? "Tiêu đề SEO" }}</a>
                        <p class="view-seo-slug">{{ config('url') }}<span class="slug">{{ $keyword->k_slug ?? 'tieu-de-seo' }}</span></p>
                        <p class="mb-2 view-seo-description">{{ $keyword->created_at ?? \Carbon\Carbon::now() }} - {{ $keyword->k_description_seo ?? "Mô tả SEO" }}.</p>
                    </div>
                </div>
                <div class="card-body pt-3 box-seo hide">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                        <input type="text" class="form-control title_seo"  value="{{ old('k_title_seo', $keyword->k_title_seo ?? '') }}" name="k_title_seo" id="inputName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="k_description_seo" value="{{ old('k_description_seo', $keyword->k_description_seo ?? '') }}" id="inputName" placeholder="">
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
                            <select name="k_status" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
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
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond" name="avatar">
                        <input type="hidden" name="k_avatar" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
