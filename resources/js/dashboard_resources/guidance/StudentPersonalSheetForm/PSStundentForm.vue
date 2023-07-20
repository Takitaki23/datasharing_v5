<template>
  <div class="form-container">
    <!-- Form -->
    <form class="form" @submit.prevent="submitForm">
      <div v-if="step === 1">
        <!-- Step 1: Personal Information -->
        <h2 class="fw-bold" style="color: green;">Student Personal Sheet Form</h2 >
          <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="recipient-name" class="col-form-label fw-bold">Email Address:</label> <br>
                            <label for="recipient-name" class="col-form-label input-label" >abutarpaaul@gmail.com</label>
                        </div>
                  </div>
          </div>
          <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="recipient-name" class="col-form-label fw-bold">Student Number:</label> <br>
                            <label for="recipient-name" class="col-form-label">20-0098</label>
                        </div>
                    </div>
          </div>
          <div class="row">
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
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="message-text" class="col-form-label fw-bold">First Name:</label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Christian Paul</label>
                        </div>
                    </div>  
          </div>
          <div class="row">
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
              <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Place of Birth: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase">Cataning, Balanga City, Bataan</label>
                        </div>
              </div>
          </div>
          <div class="row">
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
                <select id="birth_order" class="form-select mb-3" @change="toggleBirthOrderInput">
                  <option value="">First</option>
                  <option value="">Second</option>
                  <option value="">Third</option>
                  <option value="">Fourth</option>
                  <option value="birth_option">Others, please specify</option>
                </select>
                <input type="text" id="otherInput" v-if="showBirthOrder" v-model="birth_reason" class="form-control" placeholder="Please specify">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label fw-bold"  class="fw-bold">Religion From Birth : </label>
                            <input type="text " class="form-control text-uppercase" id="message-text">
                        </div>
            </div> 
          </div>
          <div class="row">
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
                              <select id="blood_type" class="form-select">
                                <option value="">O+</option>
                                <option value="">O-</option>
                                <option value="">A+</option>
                                <option value="">A-</option>
                                <option value="">B+</option>
                                <option value="">B-</option>
                                <option value="">AB+</option>
                                <option value="">AB-</option>
                            </select>
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
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Hobbies/Interests: </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div> 
          </div>
          <div class="row">
                  <h5 class="" style="color: green;">Incase of Emergency Details</h5>
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
      <div v-else-if="step === 2">
        <!-- Step 2: Family Background -->
        <h2 class="fw-bold" style="color: green;">Family Background</h2 >
        <div class="form-group">
          <label class="form-label" for="address">Parent's Marital Status:</label>
          <select id="" class="form-select">
                                <option value="">Married in Church</option>
                                <option value="">Civil Married</option>
                                <option value="">Legally Seperated</option>
                                <option value="">Single Parent</option>
                                <option value="">Living Together</option>
          </select>
        </div>
      </div>
      <div v-else-if="step === 3">
        <!-- Step 3: Father's Information -->
        <h2 class="fw-bold" style="color: green;">Father's Information</h2 >
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
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Highest Educational Attainment: </label>
                            <select id="father_highest_attainment_select" class="form-select mb-3" @change="toggleFatherAttainment">
                                <option value="">Elementary Graduate</option>
                                <option value="">Highschool Graduate</option>
                                <option value="">Elementary Undergraduate</option>
                                <option value="">Highschool Undergraduate</option>
                                <option value="">College Graduate</option>
                                <option value="">College Undergraduate</option>
                                <option value="">Technical Vocational</option>
                                <option value="">Post Graduate (Masters or Doctorate degree)</option>
                                <option value="father_highest_attainment_option">Others, please specify</option>
                            </select>
                            <input type="text" id="" v-if="show_father_attainment" v-model="father_highest_attainment" class="form-control" placeholder="Please specify">
                          </div>
                    </div>  
                </div>
      </div>
      <!-- Mother's Information-->
      <div v-else-if="step === 4">
        <h2 class="fw-bold" style="color: green;">Mother's Information</h2 >
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
                </div>
                <div class="row">
                  <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Highest Educational Attainment: </label>
                            <select id="mother_highest_attainment_select" class="form-select mb-3" @change="toggleMotherAttainment">
                                <option value="">Elementary Graduate</option>
                                <option value="">Highschool Graduate</option>
                                <option value="">Elementary Undergraduate</option>
                                <option value="">Highschool Undergraduate</option>
                                <option value="">College Graduate</option>
                                <option value="">College Undergraduate</option>
                                <option value="">Technical Vocational</option>
                                <option value="">Post Graduate (Masters or Doctorate degree)</option>
                                <option value="mother_highest_attainment_option">Others, please specify</option>
                            </select>
                            <input type="text" id="" v-if="show_mother_attainment" v-model="mother_highest_attainment" class="form-control" placeholder="Please specify">
                        </div>
                    </div>  
                </div>
      </div>
      <!-- Guardian Information -->
      <div v-else-if="step === 5">
        <h2 class="fw-bold" style="color: green;">Guardian's Information ( if not living with Parents)</h2 >
          <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <br>
                                <label for="message-text" class="col-form-label fw-bold">Guardian's Fullname :</label> <br>
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
      <!-- Academic Information -->
      <div v-else-if="step === 6">
        <h2 class="fw-bold" style="color: green;">Academic Information</h2 >
          <div class="row">
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
                                      <label for="col-form-label" class="fw-bold">SHS (Name of school): </label>
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
                          </div>
                          <div class="row">
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
                        </div>
                        <div class="row">
                          <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">Is your present course / program your personal choice?: </label>
                                      <select id="" class="form-select">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                      </select>
                                  </div>
                              </div>  
                        </div>
                        <div class="row">
                              <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">If No, Who influenced you?: </label>
                                      <input type="text " class="form-control text-uppercase" id="message-text">
                                  </div>
                              </div>  
                        </div>
                        <div class="row">
                          <div class="col">
                                  <div class="mb-3">
                                      <br>
                                      <label for="col-form-label" class="fw-bold">If No, How do you feel  about the course not being your first choice?: </label>
                                      <textarea  class="form-control text-uppercase"></textarea>
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
                              <label for="col-form-label" class="fw-bold">Why did you choose to enroll in EPCST?</label>
                              <select id="why_epcst_select" class="form-select mb-3" @change="toggleEpcstInput">
                                <option value="quality_education">Quality Education</option>
                                <option value="good_facilities">Good Facilities</option>
                                <option value="recommendation">Recommended by friends, relatives, etc</option>
                                <option value="proximity">Proximity and accessibility</option>
                                <option value="competitive_faculty">Competitive Faculty Members</option>
                                <option value="whyepcst_option">Others, please specify</option>
                              </select>
                              <input type="text" id="why_epcst_input" v-if="showEpcst" v-model="epcst_reason" class="form-control" placeholder="Please specify">
                            </div>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col">
                                    <div class="mb-3">
                                        <label for="col-form-label" class="fw-bold">What other school do you consider?: </label>
                                        <select id="why_school_consider_select" class="form-select mb-3"  @change="toggleSchoolConsider">
                                          <option value="">BPSU</option>
                                          <option value="">APCAS</option>
                                          <option value="">HEROES</option>
                                          <option value="">MICROCITY</option>
                                          <option value="">AMA</option>
                                          <option value="">TDEL</option>
                                          <option value="">LPC</option>
                                          <option value="">PUP</option>
                                          <option value="why_school_consider_option">Others</option>
                                        </select>
                                        <input type="text" id="why_schoolconsider_input" v-if="show_school_consider" v-model="school_consider" class="form-control" placeholder="Please specify">
                                    </div>
                                </div>  
                          </div>
                        </div>
      </div>
      <!-- Behavior Information -->
      <div v-else-if="step === 7">
        <h2 class="fw-bold" style="color: green;">Behavior Information</h2 >
          <div class="row">
             <div class="col-md-6">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Check if you ever experience the following concerns: </label>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Bullying
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Suicidal thoughts
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Suicidal attempts
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Panic attacks
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Anxiety
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Depression
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Self / Anger Management Issues
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Recurring negative thoughts
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Low self-esteem
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Poor study habits
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Poor in decision making
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Impulsivity
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Poor sleeping habits
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Loss of appetite
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Over-eating
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Poor hygiene
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Withdrawal / Isolation
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Family problem
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Other relationship problems
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Alcohol addiction
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Gambling addiction
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Drug addiction
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Computer addiction
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Sexual harassment
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Sexual abuse
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Physical abuse
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Verbal abuse
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Pre-marital sex
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Teenage pregnancy
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Abortion
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Extra marital affairs
                                  </label>
                                </div>
                          </div>
              </div> 
              
          </div>
      </div>
      <!-- Previous Psychological Consultation -->
      <div v-else-if="step === 8">
        <h2 class="fw-bold" style="color: green;">Previous Psychological Consultation</h2 >
          <div class="row">
             <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Have you consulted a PSYCHIATRIST before?: </label>
                                <select id="" class="form-select">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                      </select>
                          </div>
              </div> 
          </div>
          <div class="row">
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
                                <select id="" class="form-select">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                      </select>
                          </div>
              </div> 
          </div>
          <div class="row">
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
                                <label for="col-form-label" class="fw-bold">Have you consulted a COUNSELOR before?: </label>
                                <select id="" class="form-select">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                      </select>
                          </div>
              </div>  
          </div>
      </div>
      <div v-else-if="step === 9">
        <h2 class="fw-bold" style="color: green;">Personal Description </h2 >
          <div class="row">
             <div class="col">
                          <div class="mb-3">
                                <br>
                                <label for="col-form-label" class="fw-bold">Tell Something About your Self: </label>
                                <textarea  class="form-control"></textarea>
                          </div>
              </div> 
          </div>
      </div>
      <div class="form-buttons">
        <!-- Previous and Next buttons -->
        <button type="button" v-if="step > 1" @click="previousStep" class="btn btn-secondary">Previous</button>
        <button type="button" v-if="step < totalSteps" @click="nextStep" class="btn-next">Next</button>
        <button type="submit" v-else class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      step: 1,
      totalSteps: 9,
      name: '',
      email: '',
      address: '',
      city: '',
      age: '',
      gender: '',

      // Birth Order
      showBirthOrder: false,
      birth_reason: '',

      // Why you choose EPCST
      showEpcst: false,
      epcst_reason: '',
      
      // What other school do you consider?
      show_school_consider:false,
      school_consider: '',

      // father highest educational attainment
      show_father_attainment:false,
      father_highest_attainment: '',

      // mother highest educational attainment
      show_mother_attainment:false,
      mother_highest_attainment: '',

    };
  },
  methods: {

    // birthorder
    toggleBirthOrderInput() {
      this.showBirthOrder = document.getElementById("birth_order").value === "birth_option";
    },

    // Why you choose epcst
    toggleEpcstInput() {
      this.showEpcst = document.getElementById("why_epcst_select").value === "whyepcst_option";
    },

    // What other school do you consider?
    toggleSchoolConsider() {
      this.show_school_consider = document.getElementById("why_school_consider_select").value === "why_school_consider_option";
    },

    // father highest educational attainment
    toggleFatherAttainment(){
      this.show_father_attainment = document.getElementById("father_highest_attainment_select").value === "father_highest_attainment_option";
    },
    
    // mother highest educational attainment
    toggleMotherAttainment(){
      this.show_mother_attainment = document.getElementById("mother_highest_attainment_select").value === "mother_highest_attainment_option";
    },
    previousStep() {
      this.step--;
    },
    nextStep() {
      this.step++;
    },
    submitForm() {
      // Handle form submission
    }
  }
};
</script>

<style scoped>
.form-container {
  width: 100%;
  height: 600px; /* Set a specific height for the form container */
  overflow-y: auto; /* Enable vertical scrolling */
}

.form {
  width: 50%;
  margin: auto;
}

h2 {
  margin-top: 2rem;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.form-value {
  display: inline-block;
  margin-bottom: 0.5rem;
}

.form-input,
.form-select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.radio-group {
  margin-top: 0.5rem;
}

.form-radio {
  margin-right: 0.5rem;
}

.form-buttons {
  margin-top: 1rem;
}

.btn-next{
  padding: 0.5rem 1rem;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:not(:last-child) {
  margin-right: 0.5rem;
}
</style>
