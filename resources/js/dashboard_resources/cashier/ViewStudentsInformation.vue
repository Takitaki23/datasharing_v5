<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" data-backdrop="static">
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
                        <label for="recipient-name" class="col-form-label fw-bold">Section:</label>
                        <label for="recipient-name" class="col-form-label text-uppercase"> </label>
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

  