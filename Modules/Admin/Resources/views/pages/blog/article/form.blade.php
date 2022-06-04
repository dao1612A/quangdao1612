<style>
    .text-wrap .example .form-group {
        margin-bottom: 1rem;
    }
    .tab-course-content .lists .item{
        border: 1px solid #dedede;
        margin-bottom: 10px;
        padding: 10px;
    }
    .tab-course-content .lists .item p{
        margin-bottom: 0.2rem;
    }
    .tab-course-content .lists .item p:last-child span{
        font-size: 13px;
        color: #031b4e;
        font-weight: 700;
    }
</style>
<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-1">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Thông tin</a></li>
                                        <li class="nav-item"><a href="#tab3" class="nav-link " data-toggle="tab">Nội dung bài viết</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                                            <input type="text" class="form-control keypress-count" value="{{ old('a_name',$article->a_name ?? '') }}"
                                                   data-title-seo=".title_seo" data-slug=".slug" name="a_name" >
                                            @if($errors->first('a_name'))
                                                <span class="text-danger">{{ $errors->first('a_name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Slug <span>(*)</span></label>
                                            <input type="text"  class="form-control slug"  name="a_slug" value="{{ old('c_slug',$article->a_slug ?? '') }}">
                                            @if($errors->first('a_slug'))
                                                <span class="text-danger">{{ $errors->first('a_slug') }}</span>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Keywords </label>
                                                    <select name="keywords[]" class="form-control js-select2" tabindex="-1" multiple>
                                                        @foreach($keywords as $keyword)
                                                            <option title="{{ $keyword->k_name }}" {{ in_array($keyword->id, $keywordsOld ?? []) ? "selected" : "" }} value="{{ $keyword->id }}">{{ $keyword->k_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="required">Menu <span>(*)</span></label>
                                                    <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="a_menu_id" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                                            @foreach($menus as $menu)
                                                                <option title="{{ $menu->m_name }}" value="{{ $menu->id }}">{{ $menu->m_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->first('a_menu_id'))
                                                        <span class="text-danger">{{ $errors->first('a_menu_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Description <span>(*)</span></label>
                                            <textarea name="a_description" class="form-control" id="" cols="30" rows="3">{{ $article->a_description ?? '' }}</textarea>
                                            @if($errors->first('a_description'))
                                                <span class="text-danger">{{ $errors->first('a_description') }}</span>
                                            @endif
                                        </div>
                                        <div class="card  box-shadow-0">
                                            <div class="card-header">
                                                <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                                                <div class="view-seo">
                                                    <a href="javascript:;void(0)" class="view-seo-title title_seo">{{ $article->a_title_seo ?? 'Tiêu đề bài viết.' }}</a>
                                                    <p class="view-seo-slug">{{ config('url') }}. <span class="slug">{{ $article->a_slug ?? 'tieu-de-bai-viet'}}</span></p>
                                                    <p class="mb-2 view-seo-description">{{ $article->created_at ?? \Carbon\Carbon::now() }} - {{ $article->a_description_seo ?? 'Mô tả bài viết' }}</p>
                                                </div>
                                            </div>
                                            <div class="card-body pt-3 box-seo hide">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                                                    <input type="text" class="form-control title_seo"  value="{{ old('a_title_seo', $article->a_title_seo ?? '') }}" name="a_title_seo" id="inputName" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                                                    <input type="text" class="form-control" name="a_description_seo" value="{{ old('a_description_seo', $article->a_description_seo ?? '') }}" id="inputName" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <textarea name="a_content"  class="form-control" id="content" cols="30" rows="30">{{ $article->a_content ?? '' }}</textarea>
                                        @if($errors->first('a_content'))
                                            <span class="text-danger">{{ $errors->first('a_content') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond " name="avatar">
                        <input type="hidden" name="a_avatar" value="{{ $article->a_avatar ?? '' }}" id="avatar_uploads">
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
            height : 500,
            codeSnippet_theme: 'monokai_sublime',
        };
        CKEDITOR.replace( 'content',options);
    </script>
@stop