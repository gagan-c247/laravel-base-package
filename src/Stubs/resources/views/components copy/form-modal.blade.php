<div class="modal-header">
    <h5 class="modal-title">{{ $title }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
            viewBox="0 0 24 24" data-icon="mdi:times" class="iconify iconify--mdi">
            <path fill="currentColor"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z">
            </path>
        </svg>
    </button>
</div>
<form class="dataForm" autocomplete="off" method="post" action="{{ $formAction }}" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="modal-body">
        <div class="row gy-3">
            {{ $slot }}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</form>
