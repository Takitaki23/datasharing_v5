<template>
  <div>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" data-backdrop="static">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Student Info -->
            <div class="row">
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label fw-bold">Last Name:</label> <br>
                  <label for="recipient-name" class="col-form-label text-uppercase">Abutar</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label fw-bold">Middle Name:</label> <br>
                  <label for="recipient-name" class="col-form-label text-uppercase">Chanco</label>
                </div>
              </div>
              <div class="col-md-3">
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
            <!-- Fee Design -->
            <label for="" class="fw-bold">Fee Details</label>
            <div class="row fee mt-4">
                <div class="col-md-3">
                  <label for="">Fee Type</label>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                  <label for="">Amount</label>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-3 mt-4">
                  <button class="btn btn-primary">Add to list</button>
                </div>

                <!-- If select 7th semi monthly, the total payable fee must be divided into 7 and 
                     if  select 8th semi monthly, the total payable fee must be divided into 8
                    
                    -->
    
                <!-- Partition Dropdown -->
                <div class="col-md-3">
                  <label for="" class="fw-bold">Select Partition</label>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ selectedPartitionText }}
                    </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" @click="selectPartition('7th monthly', '7th monthly')">7th semi monthly</a></li>
                    <li><a class="dropdown-item" href="#" @click="selectPartition('8th monthly', '8th monthly')">8th semi monthly</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Fee Table -->
            <table class="table table-striped mt-5">
              <thead>
                <tr>
                  <th>Fee Type</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Your table data will go here -->
                <!-- Static for now -->
                <!-- For example: -->
                <tr v-for="(feeItem, index) in feeItems" :key="index">
                  <td>{{ feeItem.type }}</td>
                  <td>{{ feeItem.amount }}</td>
                  <td>
                    <i class="fa-solid fa-square-xmark" style="color: red; font-size: 35px;"></i>
                  </td>
                </tr>

                <!-- Downpayment -->
                <tr>
                  <td>Downpayment</td>
                  <td>1000</td>
                  <td> <i class="fa-solid fa-square-xmark" style="color: red; font-size: 35px;"></i></td>
                </tr>
              </tbody>
            </table>
            
            <!-- Display Total School Fee -->
            <div class="row mt-5">
              <div class="d-flex justify-content-center align-items-center">
                <label for="" class="fw-bold">TOTAL SCHOOL FEE:</label>
                <label for="" class="fw-bold" style="margin-left: 1rem;">14,500</label>
              </div>
           
            </div>
            <!--  Input for Downpayment -->
            <div class="row mt-5">
              <div class="col-md-3">
                <div class="d-flex align-items-baseline">
                  <label for="" class="fw-bold">Downpayment:</label>
                  <input type="text" class="form-control mx-2" style="width: 200px;">
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <hr  style="width: 30%; color: #000000;">
            </div>
      
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Save</button>
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
      selectedPartition: '',
      selectedPartitionText: 'Semi Monthly Partition', // Default text
      feeItems: [
        { type: 'Tuition', amount: 8000 },
        { type: 'Registration', amount: 500 },
        { type: 'Laboratory', amount: 2700 },
        { type: 'Miscellaneous', amount: 2700 },
        // Add more fee items here as needed
      ],
    };
  },
  computed: {
    filteredFeeItems() {
      if (this.selectedPartition === '') {
        return this.feeItems;
      } else {
        return this.feeItems.filter(item => item.type !== 'Downpayment');
      }
    },
  },
  methods: {
    selectPartition(partition, text) {
      this.selectedPartition = partition;
      this.selectedPartitionText = text;
    },
  },
}
</script>

<style scoped>

</style>

