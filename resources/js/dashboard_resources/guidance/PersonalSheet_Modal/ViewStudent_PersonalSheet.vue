<template>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Student Personal Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
              <!-- Student Information -->
              <div :class="{ 'active-tab': activeTab === 'studentInfo' }">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="recipient-name" class="col-form-label fw-bold">Email Address:</label> <br>
                            <label for="recipient-name" class="col-form-label">abutarpaaul@gmail.com</label>
                        </div>
                    </div>
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="recipient-name" class="col-form-label fw-bold">Student Number:</label> <br>
                            <label for="recipient-name" class="col-form-label">20-0098</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="recipient-name" class="col-form-label fw-bold">Last Name:</label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Abutar</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="message-text" class="col-form-label fw-bold">Middle Name:</label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Chanco</label>
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Christian Paul</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Contact Number: </label> <br>
                            <label for="recipient-name" class="col-form-label">09569479397</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Address: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Place of Birth: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Birthday: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">February 12, 2002</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Age: </label> <br>
                            <label for="recipient-name" class="col-form-label">21</label>
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Birth Order Among Siblings: </label>
                            <input type="text " class="form-control text-uppercase" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label fw-bold"  class="fw-bold">Religion From Birth : </label>
                            <input type="text " class="form-control text-uppercase" id="message-text">
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label fw-bold"  class="fw-bold">Current Religion: </label>
                            <input type="tel " class="form-control text-uppercase" id="message-text">
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3 fw-bold">
                            <br>
                            <label for="col-form-label" class="fw-bold">Sex: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Male</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Civil Status: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Single</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Blood Type: </label>
                            <input type="tel " class="form-control text-uppercase" id="message-text">
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Language/ Dialect Spoken at Home: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Hobbies/Interests: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div> 
                </div>
                <div class="row">
                  <h5 class="modal-title" id="exampleModalLabel">Incase of Emergency Details</h5>
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">In Case of Emergency, Please Notify: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Emma C. Abutar</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Relationship: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Mother</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Contact Number: </label> <br>
                            <label for="recipient-name" class="col-form-label">09091234587</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Address: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                        </div>
                    </div>  
                </div>
              </div>
              <!-- Family Background -->
              <div :class="{ 'active-tab': activeTab === 'familyInfo' }">
                <h5 class="modal-title" id="exampleModalLabel">Family Background</h5>   

                <div class="row">
                    <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Parent's Marital Status </label> <br>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                </div>

              </div>
              <!-- Father Information Info fields... -->
              <div :class="{ 'active-tab': activeTab === 'fatherInfo' }">
                <h5 class="modal-title" id="exampleModalLabel">Father's Information</h5>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Father's Fullname: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Jhon Paul M. Abutar</label>
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Deceased (Yes or No): </label> <br>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div> 
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label">Date of Birth: </label> <br>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Occupation: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Vendor</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Age: </label> <br>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Average Income Per Month: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>  
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Contact Number: </label>
                            <input type="tel " class="form-control" id="message-text">
                        </div>
                    </div>  
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Highest Educational Attainment: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>  
                </div>
              </div>
                <!-- Mother Information Info fields... -->
                <div :class="{ 'active-tab': activeTab === 'motherInfo' }">
                  <h5 class="modal-title" id="exampleModalLabel">Mother's Information</h5>
                  <div class="row">
                      <div class="col">
                          <div class="mb-3">
                              <br>
                                <label for="col-form-label" class="fw-bold">Mother's Fullname: </label> <br>
                                <label for="recipient-name" class="col-form-label text-uppercase">Emma C. Abutar</label>
                          </div>
                      </div>  
                      <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Deceased (Yes or No): </label> <br>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div> 
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label">Date of Birth: </label> <br>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                    </div>  
                  </div>
                  <div class="row">
                      <div class="col">
                          <div class="mb-3">
                              <br>
                              <label for="col-form-label" class="fw-bold">Occupation: </label> <br>
                              <label for="recipient-name" class="col-form-label text-uppercase">VENDOR</label>
                          </div>
                      </div>  
                      <div class="col">
                          <div class="mb-3">
                              <br>
                              <label for="col-form-label" class="fw-bold">Age: </label>
                              <input type="tel " class="form-control" id="message-text">
                          </div>
                      </div>  
                      <div class="col">
                          <div class="mb-3">
                              <br>
                              <label for="col-form-label" class="fw-bold">Average Income Per Month: </label>
                              <input type="text " class="form-control" id="message-text">
                          </div>
                      </div>  
                  </div>
                  <div class="row">
                    <div class="col">
                          <div class="mb-3">
                              <br>
                              <label for="col-form-label" class="fw-bold">Contact Number: </label>
                              <input type="tel " class="form-control" id="message-text">
                          </div>
                    </div>  
                    <div class="col">
                          <div class="mb-3">
                              <br>
                              <label for="col-form-label" class="fw-bold">Highest Educational Attainment: </label>
                              <input type="text " class="form-control" id="message-text">
                          </div>
                      </div>  
                    </div>
                  </div>
                <!-- Guardian Info -->
                <div :class="{ 'active-tab': activeTab === 'guardianInfo' }">
                    <div class="row">
                    <h5 class="modal-title" id="exampleModalLabel">Guardian's Information ( if not living with Parents)</h5>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <br>
                                <label for="message-text" class="col-form-label fw-bold">Guardian's Fullname:</label> <br>
                                <label for="recipient-name" class="col-form-label text-uppercase">EMMA C. ABUTAR</label>
                            </div>
                        </div>  
                        <div class="col">
                            <div class="mb-3">
                                <br>
                                <label for="message-text" class="col-form-labe fw-bold ">Guardian's Address:</label> <br>
                                <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                            </div>
                        </div>  
                        <div class="col">
                            <div class="mb-3 mt-2">
                                <label for="message-text" class="col-form-label fw-bold">Guardian's Contact:</label> <br>
                                <label for="recipient-name" class="col-form-label">09569479397</label>
                            </div>
                        </div>  
                  </div>
                </div>
                </div>
                  <!-- Academic Info -->
                    <div :class="{ 'active-tab': activeTab === 'academicInfo' }">
                        <div class="row">
                          <h5 class="modal-title" id="exampleModalLabel">Academic Information</h5>
                          <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <br>
                                    <label for="message-text" class="col-form-labe fw-bold ">Elementary (Name of School):</label> <br>
                                    <label for="recipient-name" class="col-form-label text-uppercase">Cataning Elementary School</label>
                                </div>
                            </div>  
                            <div class="col">
                                <div class="mb-3">
                                    <br>
                                    <label for="message-text" class="col-form-labe fw-bold ">Elementary (Year graduated):</label> <br>
                                    <label for="recipient-name" class="col-form-label text-uppercase">2013</label>
                                </div>
                            </div>  
                            <div class="col">
                                <div class="mb-3">
                                    <br>
                                    <label for="col-form-label" class="fw-bold">Awards received: </label>
                                    <input type="text " class="form-control text-uppercase" id="message-text">
                                </div>
                            </div>  
                        </div>
                          <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="message-text" class="col-form-labe fw-bold ">JHS (Name of School):</label> <br>
                                      <label for="recipient-name" class="col-form-label text-uppercase">City of Balanga National Highschool</label>
                                  </div>
                              </div>  
                              <div class="col">
                                <div class="mb-3">
                                    <br>
                                    <label for="message-text" class="col-form-labe fw-bold ">JHS (Year graduated):</label> <br>
                                    <label for="recipient-name" class="col-form-label text-uppercase">2013</label>
                                </div>
                            </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Awards received: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                          </div>
                          <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">SHS (Name of school /year graduated): </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                              <div class="col">
                                <div class="mb-3">
                                    <br>
                                    <label for="message-text" class="col-form-labe fw-bold ">SHS (Year graduated):</label> <br>
                                    <label for="recipient-name" class="col-form-label text-uppercase"></label>
                                </div>
                            </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">SHS (Track / Strand ): </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                          </div>
                          <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Subjects interested too: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Organization Membership: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                          </div>
                          <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">How is your studies financed?: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Is your present course / program your personal choice?: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                        </div>
                        <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">If No, Who influenced you?: </label>
                                      <textarea  class="form-control text-uppercase"></textarea>
                                  </div>
                              </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">If No, How do you feel  about the course not being your first choice?: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                        </div>
                        <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">If No,  What is your personal choice? : </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                        </div>
                        <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Why did you choose to enroll in EPCST? </label>
                                      <textarea  class="form-control text-uppercase"></textarea>
                                  </div>
                              </div>  
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">What other school do you consider?: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                        </div>
                      </div>
                  </div>
                  <!-- Behavioral Information -->
                  <div :class="{ 'active-tab': activeTab === 'behavioralInfo' }">
                    <div class="row">
                      <h5 class="modal-title" id="exampleModalLabel">Behavior Information</h5>
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Check if you ever experience the following concerns: </label>
                                <input type="text " class="form-control text-uppercase" id="message-text">
                          </div>
                      </div>  
                    </div>
                    <div class="row">
                      <h5 class="modal-title" id="exampleModalLabel">Previous Psychological Consultation</h5>
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Have you consulted a PSYCHIATRIST before?: </label>
                                <input type="text " class="form-control text-uppercase" id="message-text">
                          </div>
                      </div>  
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">If YES, for what reason?: </label>
                                <textarea  class="form-control"></textarea>
                          </div>
                      </div>  
                    </div>
                    <div class="row">
                        <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Have you consulted a PSYCHOLOGIST before?: </label>
                                <textarea  class="form-control"></textarea>
                          </div>
                      </div>  
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">If YES, for what reason?: </label>
                                <textarea  class="form-control"></textarea>
                          </div>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Have you consulted a COUNSELOR before?  : </label>
                                <input type="text " class="form-control text-uppercase" id="message-text"> 
                          </div>
                      </div>  
                    </div>
                    <div class="row">
                      <h5 class="modal-title" id="exampleModalLabel">Personal Description </h5>
                      <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Tell Something About your Self: </label>
                                <textarea  class="form-control"></textarea> 
                          </div>
                      </div>  
                    </div>
                  </div>
              </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                @click="goToPreviousTab"
                v-if="activeTab !== 'studentInfo'"
              >
                Previous
              </button>
               <button type="button" class="btn btn-primary" @click="goToNextTab" v-if="activeTab !== 'behavioralInfo'">
                Next
              </button>
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
      activeTab: 'studentInfo', // Initially display the studentInfo tab
    };
  },
  methods: {
    goToNextTab() {
        if(this.activeTab === 'studentInfo'){
            this.activeTab = 'familyInfo';
        }else if (this.activeTab === 'familyInfo') {
            this.activeTab = 'fatherInfo';
        }else if (this.activeTab === 'fatherInfo') {
            this.activeTab = 'motherInfo';
        }else if(this.activeTab === 'motherInfo'){
            this.activeTab = 'guardianInfo';
        }else if(this.activeTab === 'guardianInfo'){
            this.activeTab = 'academicInfo';
        }else if(this.activeTab === 'academicInfo'){
            this.activeTab = 'behavioralInfo';
        }
    }, 
    goToPreviousTab() {
      if (this.activeTab === 'fatherInfo') {
        this.activeTab = 'familyInfo';
      }else if(this.activeTab === 'familyInfo'){
        this.activeTab = 'studentInfo';
      } 
      else if (this.activeTab === 'motherInfo') {
        this.activeTab = 'fatherInfo';
      }else if (this.activeTab === 'guardianInfo') {
        this.activeTab = 'motherInfo';
      }else if (this.activeTab === 'academicInfo') {
        this.activeTab = 'guardianInfo';
      }else if (this.activeTab === 'behavioralInfo') {
        this.activeTab = 'academicInfo';
      }
    },
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
  
  .active-tab {
    display: block;
  }
  
  /* Hide non-active tabs */
  .modal-body > div:not(.active-tab) {
    display: none;
  }
  .active-tab {
  display: block;
}
  </style>
  