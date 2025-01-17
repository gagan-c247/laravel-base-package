<div class="breadcrumb-area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb d-flex gap-4 align-items-center">
                <a href="{{ $items[0]['url'] }}" class="iconify" data-icon="majesticons:arrow-left"><span class="iconify"
                        data-icon="majesticons:arrow-left"></span></a>
                <ul class="p-0 m-0 d-flex gap-4">
                    @foreach ($items as $item)
                        <li class="{{ $item['active'] ? 'active' : '' }}">
                            <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
