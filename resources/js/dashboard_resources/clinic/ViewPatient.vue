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
              <!-- View Student Health History -->
              <div class="card">
                <div class="card-header">
                  View Student History Health Details
                </div>
                <div class="card-body">
                  <div class="row">
                  <div class="col">
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label fw-bold">Name:</label>
                          <label for="recipient-name" class="col-form-label ms-2">Christian Paul C. Abutar</label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Section:</label>
                        <label for="" class="ms-2"> Bachelor of Science in Information Technology</label>
                      </div>
                  </div>
                </div>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Vital Signs</th>
                    <th scope="col">Chief Complaint</th>
                    <th scope="col">Medication Given</th>
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
                        </tr>
                      </tbody>
          </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Print</button>
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

  