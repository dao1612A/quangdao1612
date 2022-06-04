<form action="{{ route('get.search') }}">
    <input type="text" class="form-control" name="k" value="{{ Request::get('k') }}" placeholder="Tài liệu tìm kiếm">
    <button class="btn"> Tìm kiếm </button>
</form>