<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" data-backdrop="static">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Preview Assesment Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Dito magdidisplay yung mga ininput na mga babayaran galing sa add button (dynamic) --> 
            <div class="modal-body">
              <!-- Student Assesment -->
              <div class="card">
                <div class="card-header">
                  Student Assesment
                </div>
                <div class="card-body">
                  <div class="" style="text-align: center;">
                      <h5 class="card-title fw-bold" style="color: green;">Eastwoods Professional College of Science and Technology</h5>
                      <p class="card-text"  style="text-transform: uppercase;">Brgy. Ibayo Balanga City, Bataan 2100</p>
                      <label for="" style="" class="fw-bold">Schedule of Payment/Statement of Account</label>
                      <p>Second Semester AY 2022-2023</p>
                  </div>

                  <!-- Student Name -->
                  <div class="mt-5">
                    <label for="" class="fw-bold">Name:</label>
                    <label for="" style="margin-left: 1rem;">Abutar, Christian Paul, C.</label>
                  </div>

                  <!-- Semi monthly partition -->
                  <div class="mt-5">
                    <tr v-for="(feeItem, index) in feeItems" :key="index">
                      <label for="" class="fw-bold">{{ feeItem.type }} : </label>
                      <label for="" class="" style="margin-left: 1rem;">
                        <i class="fa-solid fa-peso-sign"></i>
                        {{ feeItem.amount }}
                      </label>
                      </tr>
                  </div>

                  <hr class="" style="width: 20%;">
                  <!-- Total Payable Fee -->
                  <div class="mt-3">
                    <label for="" class="fw-bold">Total School Fee : </label>
                    <i class="fa-solid fa-peso-sign" style="margin-left: 1rem;"></i>
                    <label for="" class="">14,500</label>
                  </div>

                  <hr class="" style="width: 20%;">

                  <!-- Downpayment -->
                     <div class="mt-3">
                        <label for="" class="fw-bold">Downpayment : </label>
                        <i class="fa-solid fa-peso-sign" style="margin-left: 1rem;"></i>
                        <label for="" class="">1000</label>
                     </div>
                     <hr class="" style="width: 20%;">
                     <!-- Total Payable Fee -->
                     <div class="mt-3">
                        <label for="" class="fw-bold">Total Payable Fee : </label>
                        <i class="fa-solid fa-peso-sign" style="margin-left: 1rem;"></i>
                        <label for="" class="">13,500</label>
                     </div>

                  <!-- Semi monthly partition (static for now) -->
                  <table class="table table-striped mt-3">
                      <thead>
                        <tr>
                          <th>Partition</th>
                          <th>Date</th>
                          <th>Semi Monthly</th>
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
                        </tr>
                      </tbody>
                    </table> 
                    <!-- Display Total Payable Fee-->
                    <div class="row mt-5">
                      <div class="d-flex justify-content-center align-items-center">
                        <label for="" class="fw-bold">Total Payable Fee:</label>
                        <label for="" class="fw-bold" style="margin-left: 1rem;" >
                        <i class="fa-solid fa-peso-sign"></i>
                        13,500
                      </label>
                      </div>
                    </div>

                    <div class="mt-5">
                        <label for="" class="fw-bold">*Kindly refer to the attached list of PAYMENT OPTIONS</label> <br>
                        <label for="" class="mt-5 fw-bold">Acknowledge the receipt of Schedule of Payments/Statement of Account for 2nd Semester AY 2022-2023</label>
                    </div>

                    <!-- Student Info -->
                    <div class="row fw-bold" style="margin-top: 8rem;">
                      <div class="col-md-6">

                        <!-- Static for now -->
                        <label for="">Abutar, Christian Paul, C.</label> 

                        <hr class="" style="width: 50%;">
                        <label for="">Student Name</label> <br>
                        <label for="">(Signature Over Printed Name)</label>
                      </div>
                      <!-- Parent Info -->
                      <div class="col-md-6">
                           <!-- Static for now -->
                        <label for="">Abutar, Emma, C.</label> 
                        
                        <hr class="" style="width: 50%;">
                        <label for="">Parent / Guardian</label> <br>
                        <label for="">(Signature Over Printed Name)</label>
                      </div>
                    </div>

                    <div class="mt-5">
                      <button class="btn btn-success" style="float: right;">Print</button>
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
      feeItems: [
        { type: 'Tuition', amount: 8000 },
        { type: 'Registration', amount: 500 },
        { type: 'Laboratory', amount: 2700 },
        { type: 'Miscellaneous', amount: 2700 },
        // Add more fee items here as needed
      ],
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
    };
  },
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

  