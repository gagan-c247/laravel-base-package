<div class="mt-1 mb-3 table-wrapper">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    {{ $head }}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="table-bottom">
    <div class="row justify-content-start justify-content-md-end gy-4">
        <div class="col-md-3 col-lg-3 col-xxl-2 d-flex align-items-center">
            <span class="pagination-line" style="font-size: 0.875rem"> </span>
        </div>
        <!-- Go TO page -->
        <div class="col-md-4 col-lg-4 col-xxl-2">
            <div class="field">
                <label>Go to page</label>
                <select class="form-select w-50">
                    <option value="1" selected>100</option>
                    <option value="2">200</option>
                    <option value="3">300</option>
                    <option value="4">400</option>
                </select>
            </div>
        </div>
        <!-- Per Page Selection -->
        <div class="col-md-3 col-lg-2">
            <div class="field">
                <label>Per Page</label>
                <select class="form-select w-50">
                    <option value="1" selected>20</option>
                    <option value="2">40</option>
                    <option value="3">60</option>
                    <option value="4">80</option>
                </select>
            </div>
        </div>
        <!-- Pagination -->
        <div class="col-md-3 col-lg-3">
            <ul class="pagination">
                <li><span class="prev"><span class="iconify" data-icon="mingcute:arrow-left-line"
                            data-inline="false"></span></span></li>
                <li><span>01</span></li>
                <li class="active"><span>02</span></li>
                <li><span>03</span></li>
                <li><span class="next"><span class="iconify" data-icon="mingcute:arrow-right-line"
                            data-inline="false"></span></span></li>
            </ul>
        </div>
    </div>
</div>
