<div class="users-sidebars">
    <div class="box">
        <ul>
            @foreach(config('user.menu') as $item)
                <li>
                    <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}" title="{{ $item['title'] }}">
                        <img src="{{ asset($item['img']) }}" alt="" style="width: 24px;height: 24px">
                        <span>{{ $item['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>