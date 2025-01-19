<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background: linear-gradient(135deg, #2193b0, #6dd5ed);">
            <div class="modal-header border-0">
                <h5 class="modal-title w-100 text-center fw-bold text-dark" id="viewUserModalLabel">
                    <i class="fas fa-user-circle me-2"></i>User Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card border-0 shadow">
                            <div class="card-header bg-white bg-opacity-90">
                                <h6 class="mb-0 text-dark">
                                    <i class="fas fa-info-circle me-2"></i>Account Information
                                </h6>
                            </div>
                            <div class="card-body bg-white bg-opacity-90">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-dark">Email:</dt>
                                    <dd class="col-sm-8 text-dark" id="userEmail"></dd>
                                    
                                    <dt class="col-sm-4 text-dark">Role:</dt>
                                    <dd class="col-sm-8">
                                        <span id="userRole" class="badge"></span>
                                    </dd>
                                    
                                    <dt class="col-sm-4 text-dark">Created:</dt>
                                    <dd class="col-sm-8 text-dark" id="userCreated"></dd>
                                    
                                    <dt class="col-sm-4 text-dark">Modified:</dt>
                                    <dd class="col-sm-8 text-dark" id="userModified"></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>