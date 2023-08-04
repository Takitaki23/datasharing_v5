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
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Section:</label> <br>
                    <label for="recipient-name" class="col-form-label text-uppercase">BSIT - 401</label>
                  </div>
                </div>
              </div>
              <hr>
              <!-- View Semi Monthly Partition  -->
              <h5 class="fw-bold">View Semi Monthly Partition</h5>
              <table class="table table-striped mt-3">
                      <thead>
                        <tr>
                          <th>Partition</th>
                          <th>Date</th>
                          <th>Semi Monthly</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Loop through the partition items -->
                        <tr v-for="(partitionItem, index) in partitionItems" :key="index">
                          <td>{{ partitionItem.partition }}</td>
                          <td>{{ partitionItem.date }}</td>
                          <td>
                            <label for="" class="fw-bold ">
                              <i class="fa-solid fa-peso-sign"></i>
                              {{ partitionItem.semiMonthly }}
                            </label>
                          </td>
                          <td>
                            <span :class="getStatusBadgeClass(partitionItem.status)">{{ partitionItem.status }}</span>
                          </td>
                        </tr>
                      </tbody>
              </table>      
                
                <!-- View Payment Details -->
              <center class="mt-5"><h4 for="" class="fw-bold">Payment Details</h4></center>
                  <table class="table table-striped mt-3">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>OR Number</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Loop through the payment items -->
                        <tr v-for="(paymentItem, index) in paymentItems" :key="index">
                          <td>{{ paymentItem.date }}</td>
                          <td>{{ paymentItem.orNumber }}</td>
                          <td>{{ paymentItem.amount }}</td>
                          <td></td>
                        </tr>
                      </tbody>
               </table> 
                 <!-- Total Paid -->
                 <div class="row mt-5">
                      <div class="col-md-5">
                        <div class="d-flex align-items-baseline">
                          <label for="" class="fw-bold">Total Paid:</label>
                        </div>
                      </div>
                      <div class="col" style="">
                        <label for="" class="fw-bold d-flex justify-content-center align-items-center">
                          <i class="fa-solid fa-peso-sign"></i>
                          5,100
                        </label>
                      </div>
                    </div>
                    <!-- Balance-->
                    <div class="row mt-4">
                      <div class="col-md-5">
                        <div class="d-flex align-items-baseline">
                          <label for="" class="fw-bold">Balance:</label>
                        </div>
                      </div>
                      <div class="col">
                        <label for="" class="fw-bold d-flex justify-content-center align-items-center">
                          <i class="fa-solid fa-peso-sign"></i>
                          8,400
                        </label>
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
      partitionItems: [
        { partition: '1st Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Paid' },
        { partition: '2nd Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Paid' },
        { partition: '3rd Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Paid' },
        { partition: '4th Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Unpaid' },
        { partition: '5th Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Unpaid' },
        { partition: '6th Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Unpaid' },
        { partition: '7th Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Unpaid' },
        { partition: '8th Payment', date: 'before July 31, 2023', semiMonthly: '1,687.5', status: 'Unpaid' },
        // Add more partition items here as needed
      ],
      paymentItems: [
        { date: '2023-07-03', orNumber: '000123', amount: '1,700' },
        { date: '2023-07-16', orNumber: '000123', amount: '1,700' },
        { date: '2023-08-03', orNumber: '000123', amount: '1,700' },
        // Add more payment items here as needed
      ]
    };
  },
  methods: {
    getStatusBadgeClass(status) {
      return status === 'Paid' ? 'badge bg-success' : 'badge bg-warning';
    }
  }
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

  