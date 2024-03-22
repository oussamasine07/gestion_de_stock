@extends('layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                        <li class="breadcrumb-item" aria-current="page">Account Profile</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Account Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body py-0">
                    <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                role="tab" aria-selected="true">
                                <i class="ti ti-user me-2"></i>Profile
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab"
                                aria-selected="true">
                                <i class="ti ti-id me-2"></i>Ajouter Un Utilisateur
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab"
                                aria-selected="true">
                                <i class="ti ti-lock me-2"></i>Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                    <div class="row">
                        <div class="col-lg-4 col-xxl-3">
                            <div class="card">
                                <div class="card-body position-relative">
                                    <div class="position-absolute end-0 top-0 p-3">
                                        <span class="badge bg-primary">Pro</span>
                                    </div>
                                    <div class="text-center mt-3">
                                        <div class="chat-avtar d-inline-flex mx-auto">
                                            <img class="rounded-circle img-fluid wid-70"
                                                src="{{ asset('images/user/avatar-5.jpg') }}" alt="User image">
                                        </div>
                                        
                                        <h5 class="mb-0">{{ auth()->user()->nom }}</h5>
                                        <p class="text-muted text-sm">{{ auth()->user()->statu }}</p>
                                        <hr class="my-3 border border-secondary-subtle">
                                        
                                        {{-- <hr class="my-3 border border-secondary-subtle">
                                        <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                            <i class="ti ti-mail me-2"></i>
                                            <p class="mb-0">anshan@gmail.com</p>
                                        </div>
                                        <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                            <i class="ti ti-phone me-2"></i>
                                            <p class="mb-0">(+1-876) 8654 239 581</p>
                                        </div>
                                        <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                            <i class="ti ti-map-pin me-2"></i>
                                            <p class="mb-0">New York</p>
                                        </div>
                                        <div class="d-inline-flex align-items-center justify-content-start w-100">
                                            <i class="ti ti-link me-2"></i>
                                            <a href="#" class="link-primary">
                                                <p class="mb-0">https://anshan.dh.url</p>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-xxl-9">
                            <div class="card">
                                <div class="card-header">
                                    <h5>About me</h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience
                                        Designer
                                        based in Website, I create digital Products a more Beautiful and usable place.
                                        Morbid
                                        accusant ipsum. Nam nec tellus at.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Nouveau Utilisateur</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Nom Complete<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nom et Prenome">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Nom d'Utilisateur<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nom d'Utilisateur">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Statu</label>
                                                <select class="form-control">
                                                    <option>geran</option>
                                                    <option>salarie</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Ajouter l'Utilisteur</button>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Change Password</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Old Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h5>New password must contain:</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i
                                                class="ti ti-circle-check text-success f-16 me-2"></i> At least 8
                                            characters</li>
                                        <li class="list-group-item"><i
                                                class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                            lower letter (a-z)</li>
                                        <li class="list-group-item"><i
                                                class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                            uppercase letter(A-Z)</li>
                                        <li class="list-group-item"><i
                                                class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                            number (0-9)</li>
                                        <li class="list-group-item"><i
                                                class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                            special characters</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end btn-page">
                            <div class="btn btn-outline-secondary">Cancel</div>
                            <div class="btn btn-primary">Update Profile</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
@endsection
