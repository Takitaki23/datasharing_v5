<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="viewExitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Student Info -->
              <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Email</label> <br>
                        <label for="recipient-name" class="col-form-label">abutarpaaul@gmail.com</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Last Name:</label> <br>
                        <label for="recipient-name" class="col-form-label text-uppercase">Abutar</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Middle Name:</label> <br>
                        <label for="recipient-name" class="col-form-label text-uppercase">Chanco</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                    <label for="recipient-name" class="col-form-label text-uppercase">Christian Paul</label>
                  </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="col-form-label" class="fw-bold">Address: </label> <br>
                        <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="col-form-label" class="fw-bold">Phone Number: </label> <br>
                        <label for="recipient-name" class="col-form-label">09091234587</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Course / Year Graduated:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </div>
            </div>
              <!-- Exit Interview Additional Information Education-->
              <h5 class="modal-title" id="">Additional Information</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Are you continuing your education?:</label>
                    <input type="text" class="form-control" id="message-text" >
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">If yes, where? (name of Institution):</label>
                    <input type="number " class="form-control" id="message-text">
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label fw-bold">What degree are you seeking??:</label>
                            <input type="text" class="form-control" id="message-text" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Are you currently working or a position lined up?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label fw-bold">If yes, provide the following (employer's name/ Supervisor's name/ Job title/ Employer's contact number):</label>
                            <br>
                            <label for="col-form-label" class="fw-bold">Employer's Name : </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Job Title : </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Employer's contact number : </label>
                            <input type="number " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <!-- About seeking employment -->
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Is your current position is: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">If you don't have a job are you seeking employment?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Have you submitted your resume to Career Services assistance for approval?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Do you need any Career Services assistance for any of the following?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">What are your plans for the immediate future?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">How you rate the usefulness of your educational preparation at EPCST for your career plans?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Which aspects of your EPCST education were the most important and most helpful in preparing for your career plans?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">In your opinion, which areas of your educational programs at EPCST could be improved, if any?: </label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">May we use your name and address for the prospective student referals?: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</style>

  