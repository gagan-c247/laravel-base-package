@extends('admin.dashboard.layout')
@section('content')
    <main class="body-wrapper">
        {{-- @include('admin.dashboard.breadcrumb') --}}
        <div class="page-wrapper">
            <!-- Page-Title -->
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-12 col-sm-auto">
                    <h1 class="m-0">Setting Page</h1>
                </div>
            </div>
            <!-- Inner-wrapper -->
            <div class="inner-wrapper">
                <!-- Elements-design -->
                <div class="input-wrapper">
                    <div class="row gy-3">
                        <div class="col-lg-4 col-xl-4 col-xxl-3 col-md-8 mx-auto">
                            <div class="avatar-upload position-relative" id="dropZone">
                                <div class="avatar-preview">
                                    <div id="logoPreview"
                                        style="background-image: url('{{ isset($data['logo']) && $data['logo'] ? asset('storage/' . $data['logo']) : asset('/admin/images/default-logo.jpg') }}');">
                                    </div>
                                </div>
                                <div
                                    class="image-upoload-action d-flex align-items-center justify-content-center gap-3 mt-4 mb-4">
                                    <div class="delete-avatar delete-setting" data-key="logo">
                                        <span>
                                            <span class="iconify" data-icon="fluent:delete-24-regular"></span>
                                        </span>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' name="logo" id="websiteLogo" class="imageUpload cropper"
                                            accept=".png, .jpg, .jpeg" />
                                        <label for="websiteLogo" class="">Upload Logo
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-xl-8 col-md-12 mx-auto">
                            <div class="user-information">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="user-info">
                                            <p>Primary Color</p>
                                            @if (isset($data['primary_color']) && $data['primary_color'])
                                                <p class="details"><span>:</span> <input id="primaryColor"
                                                        class="theme-color form-control" name="primary_color" type="color"
                                                        value="{{ $data['primary_color'] }}" /></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-info">
                                            <p>Secondary color</p>
                                            @if (isset($data['seccondary_color']) && $data['seccondary_color'])
                                                <p class="details"><span>:</span> <input class="theme-color form-control"
                                                        id="seccondaryColor" name="seccondary_color" type="color"
                                                        value="{{ $data['seccondary_color'] }}" /></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Font Style Headings</p>
                                        <div class="field">
                                            <select id="font_style_headings" name="font_style_headings"
                                                class="js-select2 theme-color" required>
                                                @foreach ($fonts as $font)
                                                    <option value="{{ $font['name'] }}"
                                                        {{ old('font_style_headings', $data['font_style_headings'] ?? '') == $font['name'] ? 'selected' : '' }}>
                                                        {{ $font['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Font style body</p>
                                        <div class="field">
                                            <select id="font_style_body" class="js-select2 theme-color"
                                                name="font_style_body" required>
                                                <option value="">Select Body Font</option>
                                                @foreach ($fonts as $font)
                                                    <option value="{{ $font['path'] }}"
                                                        {{ old('font_style_body', $data['font_style_body'] ?? '') == $font['path'] ? 'selected' : '' }}>
                                                        {{ $font['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-4 col-xxl-3 col-md-8 ">
                            <div class="avatar-upload position-relative" id="dropZone">
                                <div class="avatar-preview">
                                    <div id="faviconPreview"
                                        style="background-image: url('{{ isset($data['favicon']) && $data['favicon'] ? asset('storage/' . $data['favicon']) : asset('/admin/images/default-logo.jpg') }}');">
                                    </div>
                                </div>
                                <div
                                    class="image-upoload-action d-flex align-items-center justify-content-center gap-3 mt-4 mb-4">
                                    <div class="delete-avatar delete-setting" data-key="favicon">
                                        <span>
                                            <span class="iconify" data-icon="fluent:delete-24-regular"></span>
                                        </span>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' name="favicon" id="faviIcon" class="imageUpload cropper"
                                            accept=".png, .jpg, .jpeg" />
                                        <label for="faviIcon" class="">Upload Favicon
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
