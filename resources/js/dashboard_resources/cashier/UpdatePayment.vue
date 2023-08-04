<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" data-backdrop="static">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Student Payment</h5>
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
                <div class="col-md-3">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label fw-bold">Section:</label> <br>
                  <label for="recipient-name" class="col-form-label text-uppercase">BSIT - 401</label>
                </div>
              </div>
              </div>
              <hr>
              <div class="row mt-5">
                 <!--Fee Details-->
                  <div class="col-md-6 fee-payment-container">
                    <h4 for="" class="fw-bold" style="color: green;">Fee Details</h4>

                    <label for="" class="fw-bold mt-3">Total Payable Fee</label> <br>
                    <label for="">
                      <i class="fa-solid fa-peso-sign"></i>
                      13,500
                    </label>

                    <div class="mt-3">
                      <label for="" class="fw-bold mt-3">Semi Monthly Dues</label> <br>
                      <input type="text" disabled class="form-control mt-3" placeholder="1,687.5">
                    </div>
                    <div>
                      <label for="" class="fw-bold mt-3">Remarks</label> <br>
                      <input type="text"  class="form-control mt-3">
                    </div>
                    <div>
                      <label for="" class="fw-bold mt-3">OR Number</label> <br>
                      <input type="text"  class="form-control mt-3">
                    </div>
                    <div>
                      <label for="" class="fw-bold mt-3">Amount</label> <br>
                      <input type="text"  class="form-control mt-3">
                    </div>
                    <div class="mt-3">
                      <button class="btn btn-success">Update</button>
                    </div>
                  </div>
                  <!-- Payment Details -->
                  <div class="col-md-6">
                    <h4 for="" class="fw-bold" style="color: green;">Payment Details</h4>
                    <table class="table table-striped mt-5">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Remarks</th>
                          <th>OR Number</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Loop through the payment items -->
                        <tr v-for="(paymentItem, index) in paymentItems" :key="index">
                          <td>{{ paymentItem.date }}</td>
                          <td>{{ paymentItem.remarks }}</td>
                          <td>{{ paymentItem.orNumber }}</td>
                          <td>{{ paymentItem.amount }}</td>
                          <td>
                            <i class="fa-solid fa-square-xmark" style="color: red; font-size: 35px;"></i>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Total Paid -->
                    <div class="row mt-5">
                      <div class="">
                          <label for="" class="fw-bold">Total Paid:</label>
                          <label for="" class="fw-bold" style="margin-left: 1rem;">
                            <i class="fa-solid fa-peso-sign"></i>
                            5,100
                          </label>
                      </div>
                    </div>
                    <!-- Balance-->
                    <div class="row mt-4">
                      <div class="">
                          <label for="" class="fw-bold">Balance:</label>
                          <label for="" class="fw-bold" style="margin-left: 1rem;">
                            <i class="fa-solid fa-peso-sign"></i>
                            8,400
                          </label>
                      </div>
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
  data() {
    return {
      paymentItems: [
        { date: '2023-07-03', orNumber: '000123', remarks: 'TF Second Sem 2023-2024', amount: '1,700' },
        { date: '2023-07-16', orNumber: '000123', remarks: 'TF Second Sem 2023-2024', amount: '1,700' },
        { date: '2023-08-03', orNumber: '000123', remarks: 'TF Second Sem 2023-2024', amount: '1,700' },
        // Add more payment items here as needed
      ]
    };
  }
}
</script>
<style>
/* Add your custom styles here if needed */
.fee-payment-container::after {
  content: "";
  position: absolute;
  bottom: 0;
  right: 50%;
  border-left: 1px solid #ccc;
  height: 80%;
}
</style>