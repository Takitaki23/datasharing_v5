<template>
    <div class="container" style="height: 650px; overflow-y: scroll;">
      <div class="dashboard_header mt-3">
        <h1 class="fw-bold">View Reports</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reports</li>
          </ol>
        </nav>
          <!-- Datepicker -->
          <div class="mb-3">
              <label for="datepicker" class="form-label fw-bold">Select a Date:</label>
              <input type="date" id="datepicker" class="form-control">
        </div>
      </div>
      
      <!-- Reports -->
      <div class="card mt-5">
        <div class="card-header">
          Daily Collection Worksheet
        </div>
        <div class="card-body">
            <div class="" style="text-align: center;">
                <h5 class="card-title fw-bold" style="color: green;">Eastwoods Professional College of Science and Technology</h5>
                <p class="card-text"  style="text-transform: uppercase;">Daily Collection Worksheet</p>
                <label for="" style="color: red;" class="fw-bold">Tuesday July, 26,2023</label>
            </div>

            <!-- Daily Transaction -->
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>OR Number</th>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>Payments</th>
                    <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Your table data will go here -->
                    <!-- Static for now -->
                    <!-- For example: -->
                    <tr v-for="transaction in sortedTransactions" :key="transaction.orNumber">
                    <td>{{ transaction.date }}</td>
                    <td>{{ transaction.orNumber }}</td>
                    <td>{{ transaction.studentName }}</td>
                    <td>{{ transaction.section }}</td>
                    <td>{{ transaction.payments }}</td>
                    <td>{{ transaction.remarks }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Summary of transactions -->
        <div class="" style="margin-left: 1rem;;">
            <label for="" class="fw-bold" style="color: green;">Summary of Collections </label>
            <hr>
            <div class="mt-3">
                <label for="" class="fw-bold"> Tuition Fee College : </label>
                <label for="" class="fw-bold" style="margin-left: 1rem;">
                    <i class="fa-solid fa-peso-sign"></i>
                        8,900
                </label>
            </div>
            <div class="mt-3">
                <label for="" class="fw-bold">Grand Total : </label>
                <label for="" class="fw-bold" style="margin-left: 1rem;">
                    <i class="fa-solid fa-peso-sign"></i>
                          8,900
                </label>
            </div>
            <button class="btn btn-success" style="float: right; margin-top: 1rem; margin-right: 1rem;">Print</button>
      </div>
    </div>
    </div>
  </template>
  
  <script>
export default {
  data() {
    return {
      transactions: [
        {
          date: '2023-07-26',
          orNumber: '00123',
          studentName: 'Abutar, Christian Paul, C.',
          section: 'BSIT - 401',
          payments: '1,700',
          remarks: 'TF Second Sem 2023-2024',
        },
        {
          date: '2023-07-26',
          orNumber: '00124',
          studentName: 'Palad, Isaac Denmark, C.',
          section: 'BSIT - 401',
          payments: '1,700',
          remarks: 'TF Second Sem 2023-2024',
        },
        {
          date: '2023-08-02',
          orNumber: '00125',
          studentName: 'Gomez, Maria Teresa, R.',
          section: 'BSCS - 305',
          payments: '2,000',
          remarks: 'TF First Sem 2023-2024',
        },
        {
          date: '2023-08-10',
          orNumber: '00126',
          studentName: 'Santos, Juan Carlos, M.',
          section: 'BBA - 201',
          payments: '1,500',
          remarks: 'TF Second Sem 2023-2024',
        },
        {
          date: '2023-08-02',
          orNumber: '00125',
          studentName: 'Doe, John',
          section: 'BSIT - 402',
          payments: '2,000',
          remarks: 'TF First Sem 2023-2024',
        },
            
        // Add more transactions as needed
      ],
    };
  },
  computed: {
    sortedTransactions() {
      // Sort the transactions by date in ascending order
      return this.transactions.sort((a, b) => new Date(a.date) - new Date(b.date));
    },
  },
};
</script>

  
  <style scoped>
  .container {
    width: 95%;
    max-width: 1500px; /* Adjust this value to set the maximum width of the content */
    margin: auto;
    padding: 0 10px;
    margin-left: 4rem
  
  }
  
  .dashboard_header {
    margin: 0 auto;
    margin-left: 12rem
  }
  .card {
    width: 100%;
    max-width: 1100px; /* Adjust this value to set the maximum width of the card */
    margin: 0 auto;
  }
  /* Mobile styles (default) */
  .card {
  }
  #datepicker {
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  border: 1px solid #ced4da;
  width: 100%;
}

  
  /* Tablet and desktop styles */
  @media screen and (min-width: 768px) {
    .dashboard_header {
      max-width: 70%;
    }
    .card {
      margin-left: 12rem;
    }
  }
  
  /* Large desktop styles */
  @media screen and (min-width: 1200px) {
    .dashboard_header {
      max-width: 60%;
    }
  }
  </style>
  