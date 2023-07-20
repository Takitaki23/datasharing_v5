<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Information Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Student Info -->
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Last Name:</label>
                    <input type="text" class="form-control" id="recipient-name" placeholder="" disabled>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Middle Name:</label>
                    <input type="text" class="form-control" id="message-text" placeholder="" disabled>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">First Name:</label>
                    <input type="text" class="form-control" id="message-text" placeholder="" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Section:</label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Date:</label>
                        <input type="date" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Adviser:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </div>
                </div>
              <!-- Other Info -->
              <div class="row">
              </div>
              <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Vitals Sign:</label>
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
                    <label for="recipient-name" class="col-form-label">Chief Complaint</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Management /  Medication Given:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
s              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Update</button>
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

  