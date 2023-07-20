<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Student Info -->
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label fw-bold">Student Number:</label> <br>
                    <label for="recipient-name" class="col-form-label">20-0098</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label fw-bold">Last Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Abutar</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Middle Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Chanco</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Christian Paul</label>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label fw-bold">Suffix</label> <br>
                  <label for="recipient-name" class="col-form-label"> </label>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label fw-bold">Course</label> <br>
                  <label for="recipient-name" class="col-form-label">Bachelor of Science in Information Technology</label>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label fw-bold">Type</label> <br>
                  <label for="recipient-name" class="col-form-label">College Student</label>
                </div>
              </div>
            </div>
              <!-- Guardian's Info -->
              <h5 class="modal-title" id="exampleModalLabel">Guardian's Information</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label  fw-bold">Guardian's Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Emma C. Abutar</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-labe fw-bold ">Guardian's Address:</label> <br>
                    <label for="recipient-name" class="col-form-label">Cataning, Balanga City, Bataan</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Guardian's Contact:</label> <br>
                    <label for="recipient-name" class="col-form-label">09569479397</label>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <i class="fa-solid fa-thumbtack thumbtack-icon"></i>
                    <div class="card-header">
                      <h6 class="ms-3 text-light">Identification Card Picture</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="d-flex justify-content-center">
                        <img src="../../images/man.png" alt="" style="background-color: white; width: 150px; height: 150px;">
                      </div>
                      <div class="mt-3">
                        <button class="btn btn-success w-100 mb-3">
                          <i class="fa-solid fa-upload me-2"></i>Upload Picture
                        </button>
                        <button class="btn btn-success w-100 mb-3">
                          <i class="fa-solid fa-camera me-2"></i>Use Camera
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <i class="fa-solid fa-thumbtack thumbtack-icon"></i>
                    <div class="card-header">
                      <h6 class="ms-3 text-light">Identification Card Signature</h6>
                    </div>
                    <div class="card-body text-center">
                      <div class="d-flex justify-content-center">
                        <img src="../../images/signature.png" alt="" style="background-color: white; width: 150px; height: 150px;">
                      </div>
                      <div class="mt-3">
                        <button class="btn btn-success w-100 mb-3" type="file">
                          <i class="fa-solid fa-upload me-2"></i>Upload Signature
                        </button>
                        <button class="btn btn-success w-100 mb-3">
                          <i class="fa-solid fa-signature me-2"></i>Signature Pad
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary text-center">
              <i class="fa-solid fa-id-card"></i> Preview ID
            </button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Update  </button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
  
  }
  </script>
  
  <style>
  /* Modal Design */
  .modal-header {
  background-color: rgb(95, 178, 95);
  color: #ffffff;
  }
  
  .modal-body h5 {
  color: rgb(67, 155, 67);
  }
  
  .modal-footer {
  background-color: #f8f9fa;
  }
  .btn-view {
  width: 100%;
  }
  /* Card Design */
  .card-header{
    background-color: rgb(57, 157, 199);
  }
  /* Thumbtack Icon Design */
  .thumbtack-icon {
  color: #ffffff;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -3px;
  left: 10px;
  z-index: 1;
}

  </style>
  
  