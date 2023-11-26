@if (session('success'))
    <div class="alert alert-dismissible fade show py-2 bg-success">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp"></ion-icon>
            </div>
            <div class="ms-3">
                <div class="text-white">{{ session('success') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('warning'))
    <div class="alert alert-dismissible fade show py-2 bg-warning">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-warning"><ion-icon name="warning-sharp"></ion-icon>
            </div>
            <div class="ms-3">
                <div class="text-warning">{{ session('warning') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('danger'))
    <div class="alert alert-dismissible fade show py-2 bg-danger">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
            </div>
            <div class="ms-3">
                <div class="text-white">{{ session('danger') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif