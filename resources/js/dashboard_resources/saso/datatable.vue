<template>
    <div class="main-container">   
        <!-- view modal -->
     <popupPreview 
        v-if="popupTriggers.buttonTrigger" 
        :TogglePopup="() => TogglePopup('buttonTrigger')" class="popup-container"
        :dataId="data_id">
        <h5 class="modal-title rounded-top" id="exampleModalLabel">
            View Student Information
        </h5>
      <!-- Improved design for viewStudent Information -->
    </popupPreview>

    <popupId 
        v-if="popupTriggers.buttonPreviewTrigger" 
        :TogglePopup="() => TogglePopup('buttonPreviewTrigger')" class="popup-container"
        :dataId="data_id">
        <h5 class="modal-title rounded-top" id="exampleModalLabel">
            Preview ID
        </h5>
    </popupId>
        <div class="dashboard_header" style="margin-left: 13rem">
            <h1 class="fw-bold">View Records</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Student Records {{ dataId }}
                    </li>
                </ol>
            </nav>
        </div>
        <div
            class="row justify-content-center table-main"
            style="width: 90%; margin-left: 15%"
        >
            <div class="col-md-12">
                <div class="table-responsive" style="max-height: 500px">
                    <div class="input-group mb-3 col-sm-4" style="width: 30%;">
                            <label class="input-group-text"><b>Semester</b></label>
                            <select class="form-select" v-model="selectedYear">
                                <option selected class="text-secondary"><b>Choose a semester...</b></option>
                                <option class="text-secondary" v-for="semester in semesters" :key="semester" :value="semester">
                                    {{ semester }}
                                </option>
                            </select>
                    </div>
                    <table class="table table-hover table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>Generate</th>
                                <th>Student-ID</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>First Name</th>
                                <!-- <th>Suffix</th> -->
                                <th>Course</th>
                                <!-- <th>Guardian's Name</th>
                                <th>Guardian's Address</th>
                                <th>Guardian's Contact</th> -->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Button for generating ID -->
        <!-- data-bs-toggle="modal"
                            data-bs-target="#bulkPreviewModal" -->
        <button
            type="button"
            class="btn btn-success mt-3 fw-bold generate-id-button"
            data-bs-toggle="modal"
            data-bs-target="#bulkPreviewModal"
            @click="handleGenerateId"
        >
            <i class="fa-solid fa-id-card-clip fa-flip fa-xl"></i> Generate ID
            <span v-show="selectedIds != 0" class="badge text-bg-danger">
                {{ selectedIds }}</span
            >
            <!-- {{ previewModalVisibleShow  }} -->
        </button>
    </div>
    <!-- view modal -->
    <viewModal
        v-show="modalVisible"
        :modalData="modalData"
        :dataId="dataId"
        @close="closeModalView"
    />
    <editModal v-show="editModalVisible" @close="closeModalEdit" />
    <addModal
        v-show="addModalVisible"
        :modalData="modalData"
        :dataId="dataId"
        :addModalVisible="addModalVisible"
        @close="closeModalAdd"
    />
    <previewId
        v-id="previewModalVisible"
        :modalData="modalData"
        :dataId="dataId"
        @close="closeModalPreview"
    />
</template>
<script>
import {
    ref,
    onMounted,
    onBeforeUnmount,
    computed,
    reactive,
    watch,
} from "vue";
import axios from "axios";
// Import the required DataTables styles
import "datatables.net";
import "datatables.net-responsive";
import "datatables.net-buttons-dt";
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css";
import "datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css";
import "datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css";

// Import the required DataTables scripts
import $ from "jquery";
import "jszip";
import "pdfmake";
import "datatables.net";
import "datatables.net-bs4";
import "datatables.net-buttons";
import "datatables.net-buttons-bs4";
import "datatables.net-buttons/js/buttons.html5";
import "datatables.net-buttons/js/buttons.print";
import "datatables.net-responsive";
import "datatables.net-responsive-bs4";

// import modal
import viewModal from "./ViewStudentInformation.vue";
import editModal from "./EditStudentInformation.vue";
import addModal from "./AddStudentInformation.vue";
import previewId from "./PreviewId.vue";

import popupPreview from "./popups/Popup.vue";
import popupId from "./popups/PreviewPopup.vue"
// custom loader
import { useCustomLoader } from "../../plugins/loader";
// import cameraModal from "./cameraModal.vue";
export default {
    components: {
        viewModal,
        editModal,
        addModal,
        previewId,
        popupPreview,
        popupId
        // cameraModal,
    },
    setup() {
         // Define the ref to track the selected year
        const selectedYear = ref(null);
        
        const semesters = ref(new Set())
         // Define the ref to store the DataTable instance
        const studentTable = ref(null);
        let table = null;

        // watch the selected year
        // watch(selectedYear, async (newSemester)=>{
        //     console.log(newSemester)
        //     selectedYear.value = newSemester
        // })

        const { initializeLoader } = useCustomLoader() 
        const popupTriggers = ref({
            buttonTrigger: false,
            buttonPreviewTrigger: false
        });

        // data-id
        const data_id = ref(null);
        const users = ref([]);
        const id_Gen = ref([]);
        const modalVisible = ref(false);
        const editModalVisible = ref(false);
        const addModalVisible = ref(false);
        const previewModalVisible = reactive({
            show: false,
        });

        const isDataTableInitialized = ref(false);
        // modal is show?
        // const modalShow = ref(false)

        const selectedCheckboxes = reactive({
            pids: [],
            student_data: [],
            student_cred: [],
        });

        const modalData = ref(null);
        const dataId = ref(null);
        // view modal function
        const openModalView = async (rowId) => {
            // show modal
            console.log(rowId);
            modalData.value = rowId;
            // modalData.value = selectedCheckboxes.student_data;
            // dataId.value = selectedCheckboxes.pids;
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
            modalData.value = rowId;
            addModalVisible.value = true;
        };
        // close modal add
        const closeModalAdd = async () => {
            // hide modal
            addModalVisible.value = false;
        };
        // view modal add function
        const openModalPreview = async (responsedata, responseid) => {
            // show modal
            console.log("open");
            previewModalVisible.show = true;
            modalData.value = responsedata;
            dataId.value = responseid;
        };
        // close modal add
        const closeModalPreview = async () => {
            // hide modal
            console.log("close");
            previewModalVisible.show = false;
            modalData.value = null;
            dataId.value = null;
        };
        const fetchUsers = async () => {};

        onMounted(async () => {
            // to avoid duplication
            // await fetchUsers();
            // Define an array to store the selected checkbox IDs
            // let selectedCheckboxes = { pids: [], student_data:[] };
            try {
                const response = await axios.get("/api/students"); // Adjust the API endpoint URL as needed
                users.value = JSON.parse(response.data);
                console.log(users.value.data);
                semesters.value.clear();
                users.value.data.forEach((student)=>{
                    semesters.value.add(student.school_year_semester)
                })

                semesters.value = Array.from(semesters.value)
                
            } catch (error) {
                console.error(error);
            }
        });

        onBeforeUnmount(() => {
            if (table !== null) {
                // Destroy the DataTable instance before unmounting the component
                table.destroy();
            }
        });

        // Computed property to filter and transform students based on the selected year
        const filteredStudents = computed(() => {
        if (users.value && selectedYear.value !== null) {
            const id_Gen_Array = id_Gen.value ? Object.values(id_Gen.value) : [];

            return users.value.data.filter((student) => {
            const yearMatches = student.school_year_semester.startsWith(selectedYear.value);

            const semesterMatches = student.school_year_semester.includes(selectedYear.value);
            return yearMatches && semesterMatches;
            }).map((item, index) => {
            const isGenerated = id_Gen_Array.some((imageName) =>
                imageName.includes(`${item.student_no}_f.png`)
            );

            return {
                generate_id: item.id,
                student_id: item.student_no,
                last_name: item.last_name,
                middle_name: item.middle_name,
                first_name: item.first_name,
                course: item.course,
                status: isGenerated ? true : false,
            };
            });
        } else {
            return [];
        }
        });

        watch(users, async (newUsers) => {

            if (newUsers && !isDataTableInitialized.value) {
            try {
                const id_generated = await axios.get("/api/id-generated");
                id_Gen.value = id_generated.data;
                console.log(id_Gen.value);
            } catch (error) {
                console.log(error);
            }

            // Destroy the existing DataTable instance if any
            if (table !== null) {
                table.destroy();
            }

            // Initialize DataTable
            table = $("#myTable").DataTable({
                data: filteredStudents.value, // Use the computed property here
                
            // Your DataTable initialization options here
            responsive: true,
                    dom:
                        "<'row'<'col-sm-12 col-md-8'l><'col-sm-12 col-md-3'f>>" +
                        "<'row'<'col-sm-12'rt>>" +
                        "<'row'<'col-sm-12 col-md-7'i><'col-sm-12 col-md-5'p>>" +
                        "<'row'<'col-sm-12 col-md-12'B>>",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn btn-primary mr-1",
                            text: '<i class="fas fa-copy"></i> Copy',
                        },
                        {
                            extend: "csv",
                            className: "btn btn-success mr-1",
                            text: '<i class="fas fa-file-csv"></i> CSV',
                        },
                        {
                            extend: "pdf",
                            className: "btn btn-danger mr-1",
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                        },
                        {
                            extend: "print",
                            className: "btn btn-warning",
                            text: '<i class="fas fa-print"></i> Print',
                        },
                    ],

                    columns: [
                        // checkbox for generate id
                        {
                            data: "generate_id",
                            render: (data, type, row) => {
                                return `
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" data-id="${row.generate_id}">
                                PID: ${row.generate_id}
                            </th>
                                `;
                            },
                        },
                        { data: "student_id" },
                        { data: "last_name" },
                        { data: "middle_name" },
                        { data: "first_name" },
                        // { data: "suffix"},
                        { data: "course" },
                        {
                            data: "status",
                            render: (data, type, row) => {
                                if (row.status) {
                                    return `<span class="badge text-bg-success p-2">Generated ID</span>`;
                                } else {
                                    return `<span class="badge text-bg-warning p-2">Not Generated ID</span>`;
                                }
                            },
                        },
                        // { data: "guardian_name" },
                        // { data: "guardian_address" },
                        // { data: "guardian_contact" },
                        // Button for View
                        {
                            data: null,
                            render: (data, type, row) => {
                            //     <button type="button" class="btn btn-primary pop" data-id="${row.student_id}">
                            //     View
                            // </button>
                            // <button type="button" class="btn btn-primary view" data-bs-toggle="modal"
                            // data-bs-target="#viewModal"
                            // data-bs-whatever="@getbootstrap" data-id="${row.generate_id}">debug</button>
                                return `

                            <button type="button" class="btn btn-primary pop" data-id="${row.student_id}">
                                View
                            </button>
                            <button type="button" class="btn btn-primary preview" data-id="${row.student_id}">
                                ID
                            </button>

                            <button type="button" class="btn btn-success add" data-bs-toggle="modal"
                            data-bs-target="#addModal"
                            data-bs-whatever="@getbootstrap" data-id="${row.generate_id}">Upload </button>                 
                            `;
                            },
                            orderable: false,
                            searchable: false,
                        },
                    ],
                    initComplete: function () {
                        // Create a new toolbar container element
                        const toolbar = $(
                            "<div class='toolbar-container'></div>"
                        );
                        // Prepend the toolbar container to the first child row of the DataTables wrapper
                        $(".dataTables_wrapper .row:first-child").prepend(
                            toolbar
                        );

                        // Event handler for checkbox change
                        $(document).ready(function () {
                            $("#myTable").on(
                                "change",
                                ".form-check-input",
                                function () {
                                    const id = $(this).data("id");
                                    const row = $(this).closest("tr"); // Get the closest row element

                                    if ($(this).is(":checked")) {
                                        // Add the selected ID to the array if checked
                                        selectedCheckboxes.pids.push(id);

                                        // Get the data of the clicked row
                                        const table = $("#myTable").DataTable();
                                        const rowData = table.row(row).data();

                                        selectedCheckboxes.student_data.push(
                                            rowData
                                        );
                                        // Log the data of the clicked row
                                        console.log(
                                            "Clicked Row Data:",
                                            rowData
                                        );
                                    } else {
                                        // Remove the selected ID from the array if unchecked
                                        // const index = selectedCheckboxes.pids.indexOf(id);
                                        // Remove the selected ID and row from the arrays if unchecked
                                        const index =
                                            selectedCheckboxes.pids.indexOf(id);
                                        if (index !== -1) {
                                            selectedCheckboxes.pids.splice(
                                                index,
                                                1
                                            );
                                            selectedCheckboxes.student_data.splice(
                                                index,
                                                1
                                            );
                                        }
                                    }

                                    // console.log('selectedCheckBocs')
                                    // console.log(users.value.data)
                                    // console.log(selectedCheckboxes);
                                    mappedUsers
                                    selectedCheckboxes.student_cred =mappedUsers.value
                                    console.log(selectedCheckboxes)
                                }
                            );
                        });
                    },
            // ...
            });
                 // Event handlers for view and add buttons
                $("#myTable").on("click", ".view", function () {
                    // console.log(this.value.dataset.id)
                    const rowIndex = table.row($(this).closest("tr")).index();
                    const rowData = table.row(rowIndex).data();
                    console.log(rowData);
                    data_id.value = parseInt(this.getAttribute("data-id"), 10);
                    // console.log(this.getAttribute('data-id')); // Access data-id attribute using getAttribute
                    // pass the id of row click
                    openModalView(data_id);
                });

                // view
                $("#myTable").on("click", ".pop", async function () {
                    const rowIndex = table.row($(this).closest("tr")).index();
                    const rowData = table.row(rowIndex).data();
                    console.log(rowData);
                    data_id.value = this.getAttribute("data-id");
                    // pass the id of row click
                    // openModalView(data_id);
                   
                    const loader = await initializeLoader('Student Information initialize!')
                    if(loader){
                        TogglePopup("buttonTrigger");
                    }
                });

                // ID
                $("#myTable").on("click", ".preview", async function () {
                    const rowIndex = table.row($(this).closest("tr")).index();
                    const rowData = table.row(rowIndex).data();
                    data_id.value = this.getAttribute("data-id");
                    // pass the id of row click
                    // openModalView(data_id);
                   
                    const loader = await initializeLoader('Student Information initialize!')
                    if(loader){
                        TogglePopup("buttonPreviewTrigger");
                    }
                });

                // add
                $("#myTable").on("click", ".add", function () {
                    const rowIndex = table.row($(this).closest("tr")).index();
                    const rowData = table.row(rowIndex).data();

                    data_id.value = parseInt(this.getAttribute("data-id"), 10);
                    // pass the id of row click
                    openModalAdd(data_id);
                    // Emit the custom event with the ID for going back
                    // t/his.$emit("open-modal-add", rowData.id);
                });
            isDataTableInitialized.value = true;
            }

            // console.log(newUsers);
            // if (newUsers && !isDataTableInitialized.value) {
            //     try {
            //         const id_generated = await axios.get("/api/id-generated");
            //         id_Gen.value = id_generated.data;
            //         console.log(id_Gen.value);
            //     } catch (error) {
            //         console.log(error);
            //     }
            //     if (table !== null) {
            //         // Destroy the existing DataTable instance
            //         table.destroy();
            //     }
            //     // Convert id_Gen.value object into an array of its values
            //     const id_Gen_Array = id_Gen.value
            //         ? Object.values(id_Gen.value)
            //         : [];
            //     console.log(selectedYear.value);

            //     // Filter students by selected year and semester
            //     const filteredStudents = users.value.data.filter((student) => {
            //         console.log(student.school_year_semester)
            //         console.log(selectedYear.value)
            //         // Check if the selected year matches the start of the school_year_semester
            //         const yearMatches = student.school_year_semester.startsWith('2022-2023 / 1st Semester');


            //     // If no semester is selected (All option), include all students with matching year
            //     if (selectedYear.value === null) {
            //         console.log(yearMatches)
            //         return yearMatches;
            //     }

                

            //     // If a specific semester is selected, check if the semester matches as well
            //     const semesterMatches = student.school_year_semester.includes(selectedYear.value);
            //     return yearMatches && semesterMatches;
            //     });

            //     table = $("#myTable").DataTable({
            //         data: filteredStudents.map((item, index) => {
            //             // Check if any item in id_Gen.value contains the image name with the '_f' suffix for the current student_no
            //             // Check if the new array id_Gen_F contains the image name with the '_f' suffix for the current student_no
            //             const isGenerated = id_Gen_Array.some((imageName) =>
            //                 imageName.includes(`${item.student_no}_f.png`)
            //             );
            //             console.log("isGenerated:", isGenerated);
            //             return {
            //                 generate_id: item.id,
            //                 student_id: item.student_no,
            //                 last_name: item.last_name,
            //                 middle_name: item.middle_name,
            //                 first_name: item.first_name,
            //                 course: item.course,
            //                 status: isGenerated ? true : false,
            //                 // suffix: item.suffix || 'not available',
            //                 // guardian_name: item.guardian_name || 'not available',
            //                 // guardian_address: item.guardian_address || 'not available',
            //                 // guardian_contact: item.guardian_contact_no || 'not available',
            //             };
            //         }),
            //         responsive: true,
            //         dom:
            //             "<'row'<'col-sm-12 col-md-8'l><'col-sm-12 col-md-3'f>>" +
            //             "<'row'<'col-sm-12'rt>>" +
            //             "<'row'<'col-sm-12 col-md-7'i><'col-sm-12 col-md-5'p>>" +
            //             "<'row'<'col-sm-12 col-md-12'B>>",
            //         buttons: [
            //             {
            //                 extend: "copy",
            //                 className: "btn btn-primary mr-1",
            //                 text: '<i class="fas fa-copy"></i> Copy',
            //             },
            //             {
            //                 extend: "csv",
            //                 className: "btn btn-success mr-1",
            //                 text: '<i class="fas fa-file-csv"></i> CSV',
            //             },
            //             {
            //                 extend: "pdf",
            //                 className: "btn btn-danger mr-1",
            //                 text: '<i class="fas fa-file-pdf"></i> PDF',
            //             },
            //             {
            //                 extend: "print",
            //                 className: "btn btn-warning",
            //                 text: '<i class="fas fa-print"></i> Print',
            //             },
            //         ],

            //         columns: [
            //             // checkbox for generate id
            //             {
            //                 data: "generate_id",
            //                 render: (data, type, row) => {
            //                     return `
            //                 <th scope="row">
            //                     <input class="form-check-input" type="checkbox" data-id="${row.generate_id}">
            //                     PID: ${row.generate_id}
            //                 </th>
            //                     `;
            //                 },
            //             },
            //             { data: "student_id" },
            //             { data: "last_name" },
            //             { data: "middle_name" },
            //             { data: "first_name" },
            //             // { data: "suffix"},
            //             { data: "course" },
            //             {
            //                 data: "status",
            //                 render: (data, type, row) => {
            //                     if (row.status) {
            //                         return `<span class="badge text-bg-success p-2">Generated ID</span>`;
            //                     } else {
            //                         return `<span class="badge text-bg-warning p-2">Not Generated ID</span>`;
            //                     }
            //                 },
            //             },
            //             // { data: "guardian_name" },
            //             // { data: "guardian_address" },
            //             // { data: "guardian_contact" },
            //             // Button for View
            //             {
            //                 data: null,
            //                 render: (data, type, row) => {
            //                 //     <button type="button" class="btn btn-primary pop" data-id="${row.student_id}">
            //                 //     View
            //                 // </button>
            //                     return `
            //                 <button type="button" class="btn btn-primary view" data-bs-toggle="modal"
            //                 data-bs-target="#viewModal"
            //                 data-bs-whatever="@getbootstrap" data-id="${row.generate_id}">debug</button>

            //                 <button type="button" class="btn btn-primary pop" data-id="${row.student_id}">
            //                     View
            //                 </button>
            //                 <button type="button" class="btn btn-primary preview" data-id="${row.student_id}">
            //                     ID
            //                 </button>

            //                 <button type="button" class="btn btn-success add" data-bs-toggle="modal"
            //                 data-bs-target="#addModal"
            //                 data-bs-whatever="@getbootstrap" data-id="${row.generate_id}">Upload </button>                 
            //                 `;
            //                 },
            //                 orderable: false,
            //                 searchable: false,
            //             },
            //         ],
            //         initComplete: function () {
            //             // Create a new toolbar container element
            //             const toolbar = $(
            //                 "<div class='toolbar-container'></div>"
            //             );
            //             // Prepend the toolbar container to the first child row of the DataTables wrapper
            //             $(".dataTables_wrapper .row:first-child").prepend(
            //                 toolbar
            //             );

            //             // Event handler for checkbox change
            //             $(document).ready(function () {
            //                 $("#myTable").on(
            //                     "change",
            //                     ".form-check-input",
            //                     function () {
            //                         const id = $(this).data("id");
            //                         const row = $(this).closest("tr"); // Get the closest row element

            //                         if ($(this).is(":checked")) {
            //                             // Add the selected ID to the array if checked
            //                             selectedCheckboxes.pids.push(id);

            //                             // Get the data of the clicked row
            //                             const table = $("#myTable").DataTable();
            //                             const rowData = table.row(row).data();

            //                             selectedCheckboxes.student_data.push(
            //                                 rowData
            //                             );
            //                             // Log the data of the clicked row
            //                             console.log(
            //                                 "Clicked Row Data:",
            //                                 rowData
            //                             );
            //                         } else {
            //                             // Remove the selected ID from the array if unchecked
            //                             // const index = selectedCheckboxes.pids.indexOf(id);
            //                             // Remove the selected ID and row from the arrays if unchecked
            //                             const index =
            //                                 selectedCheckboxes.pids.indexOf(id);
            //                             if (index !== -1) {
            //                                 selectedCheckboxes.pids.splice(
            //                                     index,
            //                                     1
            //                                 );
            //                                 selectedCheckboxes.student_data.splice(
            //                                     index,
            //                                     1
            //                                 );
            //                             }
            //                         }

            //                         console.log(selectedCheckboxes);
            //                     }
            //                 );
            //             });
            //         },
            //     });
            //     // Event handlers for view and add buttons
            //     $("#myTable").on("click", ".view", function () {
            //         // console.log(this.value.dataset.id)
            //         const rowIndex = table.row($(this).closest("tr")).index();
            //         const rowData = table.row(rowIndex).data();
            //         console.log(rowData);
            //         data_id.value = parseInt(this.getAttribute("data-id"), 10);
            //         // console.log(this.getAttribute('data-id')); // Access data-id attribute using getAttribute
            //         // pass the id of row click
            //         openModalView(data_id);
            //     });

            //     // view
            //     $("#myTable").on("click", ".pop", async function () {
            //         const rowIndex = table.row($(this).closest("tr")).index();
            //         const rowData = table.row(rowIndex).data();
            //         console.log(rowData);
            //         data_id.value = this.getAttribute("data-id");
            //         // pass the id of row click
            //         // openModalView(data_id);
                   
            //         const loader = await initializeLoader('Student Information initialize!')
            //         if(loader){
            //             TogglePopup("buttonTrigger");
            //         }
            //     });

            //     // ID
            //     $("#myTable").on("click", ".preview", async function () {
            //         const rowIndex = table.row($(this).closest("tr")).index();
            //         const rowData = table.row(rowIndex).data();
            //         console.log(rowData);
            //         data_id.value = this.getAttribute("data-id");
            //         // pass the id of row click
            //         // openModalView(data_id);
                   
            //         const loader = await initializeLoader('Student Information initialize!')
            //         if(loader){
            //             TogglePopup("buttonPreviewTrigger");
            //         }
            //     });

            //     // add
            //     $("#myTable").on("click", ".add", function () {
            //         const rowIndex = table.row($(this).closest("tr")).index();
            //         const rowData = table.row(rowIndex).data();

            //         data_id.value = parseInt(this.getAttribute("data-id"), 10);
            //         // pass the id of row click
            //         openModalAdd(data_id);
            //         // Emit the custom event with the ID for going back
            //         // t/his.$emit("open-modal-add", rowData.id);
            //     });
            //     isDataTableInitialized.value = true;
            // }
        });

        // map to aaray of users
        const mappedUsers = computed(() => {
             // Use the filter method to get the user objects based on the selected IDs
            return users.value.data.filter(user => selectedCheckboxes.pids.includes(user.id));
        })

        // Watch for changes in selectedYear to update filteredStudents
        watch(selectedYear, () => {
        if (isDataTableInitialized.value) {
            // If DataTable is already initialized, update the data with the filtered students
            table.clear().rows.add(filteredStudents.value).draw();
        }
        });

        // Compute the selected IDs from selectedCheckboxes
        const selectedIds = computed(() => {
            // the length of selected student
            // we need to pass those id in a controller we used axios for now
            return selectedCheckboxes.pids.length;
        });

        // const previewModalVisibleShow = computed(()=>{
        //     return previewModalVisible.show == true ? true : false
        // })

        // Method to handle the generate ID button click
        const handleGenerateId = async () => {
            console.log("Generated ID:", selectedCheckboxes.pids);
            const headers = {
                Accept: "application/vnd.api+json",
                "Content-Type": "application/vnd.api+json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            };
            await axios
                .post("/api/generateId", {
                    headers: headers,
                    params: {
                        id: selectedCheckboxes.pids.length,
                        st_id: selectedCheckboxes.student_data,
                        st_cred: selectedCheckboxes.student_cred,
                    },
                })
                .then((res) => {
                    console.log(res.data);
                    openModalPreview(res.data.path, res.data.id);
                })

                .catch((err) => {
                    console.log(err);
                });
        };

        // function to trigger a popups set to true to false
        const TogglePopup = (trigger) => {
            return (popupTriggers.value[trigger] =
                !popupTriggers.value[trigger]);
        };

        return {
            selectedIds,
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
            openModalPreview,
            previewModalVisible,
            closeModalPreview,
            handleGenerateId,
            modalData,
            dataId,
            data_id,
            popupTriggers,
            TogglePopup,
            selectedYear,
            semesters
            // previewModalVisibleShow
        };
    },
};
</script>
<style scoped>
/* Main container */
.main-container {
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
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}
.generate-id-button:hover {
    background-color: #45a049;
}
/* Style for the ID card icon */
.generate-id-button i {
    margin-right: 0.5rem;
}

.table-main {
    margin-top: 5rem;
}

.popup-content {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  padding: 2rem;
}

/* Create a backdrop for the popup */
.popup-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 999;
  display: flex;
  justify-content: center;
  align-items: center;
}
button.popup-close{
    border: 1px solid red
}
.rounded-top {
  background-color: rgb(95, 178, 95);
  color: #ffffff;
  padding: 0.5rem;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

@media screen and (max-width: 1480px) {
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
        margin-left: 0rem !important;
        margin-right: 0rem;
        margin-top: 5rem !important;
    }
}
</style>
