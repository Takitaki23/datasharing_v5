<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Student Info -->
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label fw-bold">Last Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Abutar</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Middle Name:</label> <br>
                  <label for="recipient-name" class="col-form-label">Chanco</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                    <label for="recipient-name" class="col-form-label">Christian Paul</label>
                  </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label fw-bold">Course:</label> <br>
                      <label for="recipient-name" class="col-form-label">Bachelor of Science in Information Technology</label>
                    </div>
                </div>
              </div>
              <!-- Guardian's Info -->
              <h5 class="modal-title" id="exampleModalLabel">Guardian's Information</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label  fw-bold">Guardian's Name:</label> <br>
                  <label for="recipient-name" class="col-form-label">Emma C. Abutar</label>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                      <label for="message-text" class="col-form-labe fw-bold ">Guardian's Address:</label> <br>
                      <label for="recipient-name" class="col-form-label">Cataning, Balanga City, Bataan</label>
                  </div>
                </div>
              </div>
              <!-- Other Info -->
              <div class="row">
              </div>
              <h5 class="modal-title " id="exampleModalLabel">Prescription</h5>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold">Vitals Sign:</label>
                    <div class="row">
                      <div class="col">
                      TEMP
                      <input type="text" class="form-control" id="temp-input">
                    </div>
                      <div class="col">
                        BP
                        <input type="text" class="form-control" id="bp-input">
                    </div>
                    <div class="col">
                      RR
                      <input type="text" class="form-control" id="rr-input">
                    </div>
                    <div class="col">
                      PR
                      <input type="text" class="form-control" id="pr-input">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label fw-bold">Chief Complaint</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label fw-bold ">Management /  Medication Given:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </div>
              </div>

              <h5 class="mt-5 fw-bold">Student Health Details</h5>
              <!-- the data input will display here -->
              <table class="table table-striped mt-3">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Vital Signs</th>
                          <th>Chief Complaint</th>
                          <th>Management /  Medication Given:</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Loop through the entry items -->
                        <tr v-for="(entry, index) in medicalHistory" :key="index">
                          <td>{{ entry.date }}</td>
                          <td>
                            <p><strong>Temperature:</strong> {{ entry.temperature }}</p>
                            <p><strong>Blood Pressure:</strong> {{ entry.bloodPressure }}</p>
                            <p><strong>Respiratory Rate:</strong> {{ entry.respiratoryRate }}</p>
                            <p><strong>Pulse Rate:</strong> {{ entry.pulseRate }}</p>
                          </td>
                          <td>{{ entry.chiefComplaint }}</td>
                          <td>{{ entry.medicationGiven }}</td>
                          <td>
                            <i class="fa-solid fa-pen-to-square" style="color: green; font-size: 25px;"></i>
                            <i class="fa-solid fa-square-xmark" style="color: red; font-size: 25px; margin-left: .5rem;"></i>
                          </td>
                        </tr>
                      </tbody>
              </table>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Submit</button> 
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
      medicalHistory: [
        {
          date: "2023-08-01",
          temperature: "98.6°F",
          bloodPressure: "120/80 mmHg",
          respiratoryRate: "16 breaths/min",
          pulseRate: "72 bpm",
          chiefComplaint: "Fever and headache",
          medicationGiven: "Acetaminophen",
        },
        {
          date: "2023-07-25",
          temperature: "98.2°F",
          bloodPressure: "118/78 mmHg",
          respiratoryRate: "18 breaths/min",
          pulseRate: "68 bpm",
          chiefComplaint: "Cough and congestion",
          medicationGiven: "Cough syrup",
        },
        // Add more entries as needed
      ],
    };
  },
};
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

  