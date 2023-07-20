<template>
  <div class="main-container">
    <div class="dashboard_header mt-2" style="margin-left: 13rem;">
        <h1 class="fw-bold">View Records</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Student Records</li>
          </ol>
        </nav>
  </div>
  <div class="row justify-content-center table-main"  style="width: 90%; margin-left:15%;">
      <div class="col-md-12">
      <div class="table-responsive" style="max-height: 500px;">
              <table class="table table-hover table-sm" id="myTable">
                  <thead> 
                      <tr>
                      <th>ID</th>
                      <th>Last Name</th>
                      <th>Middle Name</th>
                      <th>First Name</th>
                      <th>Section</th>
                      <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="user in users" :key="user.id">
                      <td>{{ user.id }}</td>
                      <td>{{ user.last_name }}</td>
                      <td>{{ user.middle_name }}</td>
                      <td>{{ user.first_name }}</td>
                      <td>{{ user.section }}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
  <!-- view modal -->
  <viewModal v-show="modalVisible" @close="closeModalView" />
    <editModal v-show="editModalVisible" @close="closeModalEdit" />
    <addModal v-show="addModalVisible" @close="closeModalEdit" />
</template>

<script>
import {ref, onMounted,watchEffect } from 'vue'

// Import the required DataTables styles
import "datatables.net";
import "datatables.net-responsive";
import 'datatables.net-buttons-dt';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';
import 'datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css';
import 'datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css';

// Import the required DataTables scripts
import $ from 'jquery';
import 'jszip';
import 'pdfmake';
import 'datatables.net';
import 'datatables.net-bs4';
import 'datatables.net-buttons';
import 'datatables.net-buttons-bs4';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-responsive';
import 'datatables.net-responsive-bs4';

// import modal
import viewModal from "./ViewPatient.vue";
import editModal from "./EditPatient.vue";
import addModal from "./AddPatient.vue";
export default {
  components: {
        viewModal,
        editModal,
        addModal,
    },
  setup(){
      const users = ref([])
      const modalVisible = ref(false);
        const editModalVisible = ref(false);
        const addModalVisible = ref(false);

        // view modal function
        const openModalView = async (rowId) => {
            // show modal
            console.log(rowId);
            modalVisible.value = true;
        };
        // close modal
        const closeModalView = async () => {
            // hide modal
            modalVisible.value = false;
        };

        // view modal edit function
        const openModalEdit = async (rowId) => {
            // show modal
            console.log(rowId);
            editModalVisible.value = true;
        };
        // close modal edit
        const closeModalEdit = async () => {
            // hide modal
            editModalVisible.value = false;
        };

        // view modal add function
        const openModalAdd = async (rowId) => {
            // show modal
            console.log(rowId);
            addModalVisible.value = true;
        };
        // close modal add
        const closeModalAdd = async () => {
            // hide modal
            addModalVisible.value = false;
        };

      const fetchUsers = async () => {
          // hardcoded user data for testing
          const initialUsers = [
                  { id: 1, last_name: 'Abutar', middle_name: 'Chanco', first_name: 'Christian Paul', section: 'BSIT-301'},
                  { id: 2, last_name: 'Esconde', middle_name: 'Sacdalan', first_name: 'Kyneth', section: 'BSIT-301'},
                  { id: 3, last_name: 'Bugay', middle_name: '', first_name: 'Takatoshi', section: 'BSIT-301'},
                  { id: 4, last_name: 'Doe', middle_name: 'John', first_name: 'Jane', section: 'BSIT-301'},
                  { id: 5, last_name: 'Smith', middle_name: 'Alex', first_name: 'Emily', section: 'BSIT-301'},
                  { id: 6, last_name: 'Gonzalez', middle_name: 'Maria', first_name: 'Carlos', section: 'BSIT-301'},
                  // Add more data here
                  { id: 7, last_name: 'Garcia', middle_name: 'Andres', first_name: 'Sofia', section: 'BSIT-301'},
                  { id: 8, last_name: 'Lee', middle_name: 'Ji-hoon', first_name: 'Seo-yeon', section: 'BSIT-301'},
                  { id: 9, last_name: 'Wang', middle_name: 'Li', first_name: 'Wei', section: 'BSIT-301'},
                  { id: 10, last_name: 'Lopez', middle_name: 'Isabella', first_name: 'Mateo', section: 'BSIT-301'},
                  { id: 11, last_name: 'Chen', middle_name: 'Xiao', first_name: 'Ling', section: 'BSIT-301'},
                  { id: 12, last_name: 'Gupta', middle_name: 'Aarav', first_name: 'Anika', section: 'BSIT-301'},
                  { id: 13, last_name: 'Martinez', middle_name: 'Diego', first_name: 'Sofia', section: 'BSIT-301'},
                  { id: 14, last_name: 'Nguyen', middle_name: 'Minh', first_name: 'Linh', section: 'BSIT-301'},
                  { id: 15, last_name: 'Kim', middle_name: 'Min-ji', first_name: 'Jae-hyun', section: 'BSIT-301'},
                  { id: 16, last_name: 'Gonzales', middle_name: 'Luis', first_name: 'Camila', section: 'BSIT-301'},
                  { id: 17, last_name: 'Patel', middle_name: 'Aarav', first_name: 'Neha', section: 'BSIT-301'},
                  { id: 18, last_name: 'Suzuki', middle_name: 'Hiroshi', first_name: 'Yumi', section: 'BSIT-301'},
              ];
              users.value = initialUsers;
      }
      onMounted( async () => {
          // to avoid duplication
          await fetchUsers();
         const table = $('#myTable').DataTable({
              data:users.value,
              responsive:true,
              dom: "<'row'<'col-sm-12 col-md-8'l><'col-sm-12 col-md-3'f>>" +
              "<'row'<'col-sm-12'rt>>" +
              "<'row'<'col-sm-12 col-md-7'i><'col-sm-12 col-md-5'p>>" +
              "<'row'<'col-sm-12 col-md-12'B>>",
                  buttons: [
                  {
                      extend: 'copy',
                      className: 'btn btn-primary mr-1',
                      text: '<i class="fas fa-copy"></i> Copy',
                  },
                  {
                      extend: 'csv',
                      className: 'btn btn-success mr-1',
                      text: '<i class="fas fa-file-csv"></i> CSV',
                  },
                  {
                      extend: 'pdf',
                      className: 'btn btn-danger mr-1',
                      text: '<i class="fas fa-file-pdf"></i> PDF',
                  },
                  {
                      extend: 'print',
                      className: 'btn btn-warning',
                      text: '<i class="fas fa-print"></i> Print',
                  },
              ],
                  initComplete: function () {
                    // Create a new toolbar container element
                    const toolbar = $("<div class='toolbar-container'></div>");
                    // Prepend the toolbar container to the first child row of the DataTables wrapper
                    $(".dataTables_wrapper .row:first-child").prepend(toolbar);
                  },
              columns:[
                  {data:'id'},
                  {data:'last_name'},
                  {data:'middle_name'},
                  {data:'first_name'},
                  {data:'section'},
                   // Button for View
                  {
                      data: null,
                      render: (data, type, row) => {
                        return `
                            <button type="button" class="btn btn-primary view" data-bs-toggle="modal"
                            data-bs-target="#viewModal"
                            data-bs-whatever="@getbootstrap">View</button>


                            <button type="button" class="btn btn-success add" data-bs-toggle="modal"
                            data-bs-target="#addModal"
                            data-bs-whatever="@getbootstrap">Add</button>
                            
                            
                            `;
                      },
                      orderable: false,
                      searchable: false,
                  },
              ],
          });
          // view
          $("#myTable").on("click", ".view", function () {
                const rowIndex = table.row($(this).closest("tr")).index();
                const rowData = table.row(rowIndex).data();
                // pass the id of row click
                openModalView(rowData.id);
            });
            // edit
            $("#myTable").on("click", ".edit", function () {
                const rowIndex = table.row($(this).closest("tr")).index();
                const rowData = table.row(rowIndex).data();
                // pass the id of row click
                openModalEdit(rowData.id);
            });
            // add
            $("#myTable").on("click", ".add", function () {
                const rowIndex = table.row($(this).closest("tr")).index();
                const rowData = table.row(rowIndex).data();
                // pass the id of row click
                openModalAdd(rowData.id);
            });
      });
      return {
            users,
            modalVisible,
            closeModalView,
            openModalView,
            closeModalEdit,
            openModalEdit,
            openModalAdd,
            editModalVisible,
            addModalVisible,
            closeModalAdd,
        };
  }
}
</script>
<style scoped>
  /* Main container */
  .main-container{
    width: 90%; 
    margin: auto;
  }
  /* Design for dashboard header */
  div.dashboard_header {
    width: 80% !important; 
    position: sticky;
    left: 0;
    right: 0;
    width: 100%;
    height: 1rem;
    padding: 10px;
    box-sizing: border-box;  
    margin-bottom: 1rem; /* Add margin-bottom to create space below the header */
    /* border: 1px solid red;  */
  }
  /* Design for the data-table */
  .table {
    width: 100%;
    border-collapse: collapse;
  }
  .table th,
  .table td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
  }

  .table th {
    background-color: #f2f2f2;
  }
  /* Design for the generated button ID */
  .generate-id-button {
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 13rem;
  }
  .table-main {
    margin-top: 5rem  
  }
  @media screen and (max-width: 1480px){
    .generate-id-button {
      max-width: 100% !important;
      margin-top: 1rem !important;
      margin-left: 0;
    }
    div.dashboard_header {
      margin-left: 0rem !important;
    }
    .table-main {
      width: 100%;
      margin-left:0rem !important;
      margin-right: 0rem;
      margin-top: 5rem !important;
    }
    
  }
  </style>


