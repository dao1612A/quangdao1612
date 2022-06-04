<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('name',$page->name ?? '') }}"
                                name="name" >
                        @if($errors->first('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">URL <span>(*)</span></label>
                        <input type="text"  class="form-control"  placeholder="Url" {{ isset($page->url) ? 'disabled' : '' }}  name="url" value="{{ $page->url ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Description <span>(*)</span></label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ $page->description ?? '' }}</textarea>
                        @if($errors->first('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Content </h4>
                </div>
                <div class="card-body pt-3">
                    <textarea name="content"  class="form-control" id="content" cols="30" rows="30">{{ $page->content ?? '' }}</textarea>
                    @if($errors->first('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
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
                        <label for="exampleInputEmail1"> Robots SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="seo" value="{{ old('seo', $page->seo ?? '') }}" id="inputName" placeholder="">
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                    <div class="view-seo">
                        <a href="" class="view-seo-title title_seo">{{ $page->title_seo ?? "Tiêu đề SEO" }}</a>
                        <p class="view-seo-slug"><span class="slug">{{ $page->slug ?? "tieu-de-seo" }}</span></p>
                        <p class="mb-2 view-seo-description">{{ $page->description_seo ?? "Mô tả SEO" }}</p>
                    </div>
                </div>
                <div class="card-body pt-3 box-seo hide">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                        <input type="text" class="form-control title_seo"  value="{{ old('title_seo', $page->title_seo ?? '') }}" name="title_seo" id="inputName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="description_seo" value="{{ old('description_seo', $page->description_seo ?? '') }}" id="inputName" placeholder="">
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond" name="avatar">
                        <input type="hidden" name="avatar" value="{{ $page->avatar ?? '' }}" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            language: 'vi',
            uiColor: '#9AB8F3',
            height : 400,
            codeSnippet_theme: 'monokai_sublime',
        };
        CKEDITOR.replace( 'content',options);
    </script>
@stop