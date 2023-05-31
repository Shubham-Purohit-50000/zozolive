<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="users" model="User" />
    </x-slot>
    <div class="card card-custom card-shadowless rounded-top-0">
        <!--begin::Body-->
        <div class="card-body p-0">
            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                <div class="col-xl-12 col-xxl-10">
                    <!--begin::Wizard Form-->
                    {!! Form::open([
    'url' => 'users/' . $user->uuid,
    'class' => 'kt-form',
    'id' => 'kt-form',
    'method' => 'PATCH',
    'files' => true,
]) !!}
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <!--begin::Wizard Step 1-->
                            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                <h5 class="text-dark font-weight-bold" style="letter-spacing: 1px">Profile Details</h5>
                                <hr class="mb-10" />
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-solid input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input class="form-control form-control-solid form-control-lg" name="name"
                                                type="text" value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                {{-- <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Mobile</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-solid input-group-lg mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control ml-2" name="mobile" id="mobile"
                                                value="{{ $user->mobile }}"  />
                                        </div>
                                    </div>
                                </div> --}}
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-solid input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-envelope-open"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-solid form-control-lg"
                                                name="email" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-xl-3 col-lg-3 col-form-label">
                                        New Password
                                    </label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-solid input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-lock"></i>
                                                </span>
                                            </div>
                                            <input class="form-control form-control-solid form-control-lg" id="password"
                                                name="password" type="password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="toggle_password"
                                                    style="cursor:pointer">
                                                    <i class="fas fa-eye eye" id="eye">
                                                    </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="image-input image-input-outline" id="kt_image_1">
                                            <div class="image-input-wrapper"
                                                style="background-image: url('{{ Storage::url($user->avatar) }}');">
                                            </div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="{{ 'Upload Avatar' }}">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .svg">
                                                <input type="hidden" name="avatar_remove" value="0">
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title=""
                                                data-original-title="{{ 'Cancle Avatar' }}">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                <div class="mr-2">
                                    <button type="submit"
                                        class="btn btn-success font-weight-bolder px-9 py-4">Submit</button>
                                </div>
                                <div>

                                    <button type="reset"
                                        class="btn btn-primary font-weight-bolder px-9 py-4">Cancel</button>
                                </div>
                            </div>
                            <!--end::Wizard Actions-->
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!--end::Wizard Form-->
                </div>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <x-slot name="js">
        <script src="{{ asset('assets/js/pages/custom/user/edit-user.js') }}"></script>
        <script src="{{ asset('js/toggle-password.js') }}"></script>
    </x-slot>
</x-layout>
