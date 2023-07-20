<template>
    <div>
        <div class="dashboard_header">
        <h1 class="fw-bold">Dashboard</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cashier Dashboard</li>
          </ol>
        </nav>
      </div>
      <div class="container">
        <div class="row dashboard-main text-center text-light fw-bold">
          <div class="col-md-5 dashboard-student p-5 position-relative">
            <i class="fas fa-users dashboard-icon p-4 position-absolute top-0 start-0 opacity-25" style="font-size: 100pt;"></i>
            <h2 class="mt-3 fw-bold">Number of Students</h2>
            <div class="d-flex justify-content-center align-items-center">
              <h1 class="me-3 fw-bold">100</h1>
            </div>
          </div>
          <div class="col-md-5 dashboard-date p-5 position-relative">
            <i class="fas fa-clock p-4 position-absolute top-0 start-0 opacity-25" style="font-size: 100pt;"></i>
            <h2 class="mt-3 fw-bold">Date and Time</h2>
            <div class="d-flex justify-content-center align-items-center">
              <h1 class="me-3 fw-bold">{{ new Date().toLocaleDateString() }}</h1>
              <h1 class="fw-bold">{{ new Date().toLocaleTimeString() }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    // export default{
    //     name: 'DashboardMain'
    // }
</script>
<style scoped>
    /* Styles for the saso dashboard header */
    .dashboard_header {
        border-radius: 5px;
        margin: 60px auto;
        position: relative;
        width: 60%;
        max-width: 1200px;
    }
    h1 {
        font-size: 32px;
        margin-top: 0;
    }
    .breadcrumb {
        background-color: #f5f5f5;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
    }
    .breadcrumb-item {
        font-size: 16px;
    }
    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }
    .breadcrumb-item.active {
        color: #495057;
        font-weight: bold;
    }
    /* Styles for the dashboard-student and dashboard-date */
    .dashboard-main {
        margin: auto 0;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }
    /* Dashboard Number of Students */
    .dashboard-student {
        background-color: rgb(95, 178, 95);
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);
        position: relative;
    }
    .dashboard-date {
        background-color: rgb(182, 182, 27);
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);
        position: relative;
    }
    /* Design for the responsiveness in every screen size */
    @media screen and (max-width: 1480px) {
        .dashboard_header {
            position: sticky;
            margin-top: 1rem;
            margin-left: 1rem !important;
        }
        /* Move dashboard-date under dashboard-student */
        .dashboard-student {
            order: 1; /* Change the order of the first column */
            width: 100%;
        }
        .dashboard-date {
            order: 2; /* Change the order of the second column */
            margin-top: 20px; /* Add some space between the columns */
            width: 100%;
        }
    }
    </style>