<div class="filter-tab position-relative dropdown">
    <button class="btn btn-outline-white with-icon dropdown-toggle" id="filterMenuLink" data-bs-toggle="dropdown"
        aria-expanded="false" aria-haspopup="true" data-bs-auto-close="outside">
        <span class="iconify" data-icon="mdi:filter-outline" data-inline="false"></span>Filter
    </button>
    <div class="filter-menu-box box-shadow-1 dropdown-menu" aria-labelledby="filterMenuLink">
        <form id="filterForm" autocomplete="off">
            <div class="row g-3 p-3">
                {{ $slot }}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="filterFooter">
                        <button type="button" onclick="resetFilter()" class="btn btn-outline-white">Reset</button>
                        <button class="btn btn-secondary">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
