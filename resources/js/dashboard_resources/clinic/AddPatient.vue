<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Student Info -->
              <div class="row">
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
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                    <label for="recipient-name" class="col-form-label text-uppercase">Christian Paul</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label fw-bold">Section:</label> <br>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Date:</label>
                        <input type="date" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Adviser:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </div>
                </div>
              <!-- Guardian's Info -->
              <h5 class="modal-title" id="exampleModalLabel">Guardian's Information</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label  fw-bold">Guardian's Name:</label> <br>
                  <label for="recipient-name" class="col-form-label text-uppercase">Emma C. Abutar</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                      <label for="message-text" class="col-form-labe fw-bold ">Guardian's Address:</label> <br>
                      <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                  </div>
                </div>
              </div>
              <!-- Other Info -->
              <div class="row">
              </div>
              <h5 class="modal-title " id="exampleModalLabel">Prescription</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Vitals Sign:</label>
                    <div class="row">
                      <div class="col">
                        BP
                        <input type="text" class="form-control" id="bp-input">
                    </div>
                    <div class="col">
                      TEMP
                      <input type="text" class="form-control" id="temp-input">
                    </div>
                    <div class="col">
                      RR
                      <input type="text" class="form-control" id="rr-input">
                    </div>
                    <div class="col">
                      PR
                      <input type="text" class="form-control" id="pr-input">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label fw-bold">Chief Complaint</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold ">Management /  Medication Given:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
s              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Submit</button> 
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

  