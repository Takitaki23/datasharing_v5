<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Patient Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <label for="recipient-name" class="col-form-label ms-2">Christian Paul C. Abutar</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Section:</label>
                      <label for="recipient-name" class="col-form-label ms-2"></label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Adviser:</label>
                      <label for="recipient-name" class="col-form-label ms-2"></label>
                    </div>
                </div>
              </div>
              <table class="table">
            <thead>
              <tr>
                <th scope="col">Time and Date</th>
                <th scope="col">Chief Complaint</th>
                <th scope="col">Vital Signs</th>
                <th scope="col">Medication Given</th>
                <th scope="col">Actions</th>
              </tr>
              <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">
                  <div class="row">
                    <div class="col">BP</div>
                    <div class="col">TEMP</div>
                    <div class="col">RR</div>
                    <div class="col">PR</div>
                  </div>
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">5/21/2023</th>
                <td>Fever</td>
                <td>
                  <div class="row">
                    <div class="col">Value for BP</div>
                    <div class="col">Value for TEMP</div>
                    <div class="col">Value for RR</div>
                    <div class="col">Value for PR</div>
                  </div>
                </td>
                <td>med1, med2, med3</td>
                <td>
                  <button class="btn btn-warning me-2">Edit</button>
                  <button class="btn btn-danger me-2">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Print</button>
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

  