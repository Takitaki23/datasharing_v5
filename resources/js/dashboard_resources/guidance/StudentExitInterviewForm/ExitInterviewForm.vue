<template>
  <div class="form-container">
    <!-- Form -->
    <form class="form">
      <div>
        <!-- Step 1: Personal Information -->
        <h2 class="fw-bold" style="color: green;">Student Exit Interview Form</h2 >
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
                            <label for="col-form-label" class="fw-bold">Course / Year Graduated: </label> <br>
                            <label for="recipient-name" class="col-form-label text-uppercase"></label>
                        </div>
              </div>
          </div>
          <div class="row">
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
                            <label for="col-form-label" class="fw-bold">Are you continuing your education?: </label> <br>
                            <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
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
                            <label for="col-form-label" class="fw-bold">If yes, where? ( name of Institution): </label>
                            <input type="text " class="form-control text-uppercase" id="message-text">
                        </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">What degree are you seeking?: </label>
                            <input type="text " class="form-control text-uppercase" id="message-text">
                        </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label fw-bold"  class="fw-bold">Are you currently working or a position lined up? : </label>
                            <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
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
                            <div class="col">
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label fw-bold">If yes, provide the following (employer's name/ Supervisor's name/ Job title/ Employer's contact number):</label>
                            <br>
                            <label for="col-form-label" class="fw-bold">Employer's Name : </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Job Title : </label>
                            <input type="text " class="form-control" id="message-text">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">Employer's contact number : </label>
                            <input type="number " class="form-control" id="message-text">
                        </div>
                    </div>
                            
                        </div>
            </div>   
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3 fw-bold">
                            <br>
                            <label for="col-form-label" class="fw-bold">Is your current position is: </label> <br>
                            <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
                                <option value="">In your field of study</option>
                                <option value="">In a related field</option>
                                <option value="">Not related</option>
                            </select>
                        </div>
            </div> 
          </div>
          <div class="row">
            <div class="col">
                        <div class="mb-3">
                            <br>
                            <label for="col-form-label" class="fw-bold">If you don't have a job are you seeking employment?: </label>
                            <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
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
                            <label for="col-form-label" class="fw-bold">Have you submitted your resume to Career Services assistance for approval?: </label>
                            <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
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
                            <label for="col-form-label" class="fw-bold">Do you need any Career Services assistance for any of the following?: </label>
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Resume
                                  </label>
                            </div>
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Interviewing skills
                                  </label>
                            </div>
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Placement
                                  </label>
                            </div>
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Job search
                                  </label>
                            </div>
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                  <label class="form-check-label" for="flexCheckChecked">
                                    Others
                                  </label>
                            </div>
                        </div>
                    </div> 
          </div>
          <div class="row">
            <div class="col">
              <label for="col-form-label" class="fw-bold">What are your plans for the immediate future?: </label>
              <select id="future_plan_select" class="form-select mb-3" @change="toggleFuturePlan">
                                <option value="">Continue education</option>
                                <option value="">Work</option>
                                <option value="">Start a Family</option>
                                <option value="">Health issues prevents working</option>
                                <option value="future_plan_option ">Others, please specify</option>
              </select>
              <input type="text" id="" v-if="show_future_plan" v-model="future_plan_model" class="form-control" placeholder="Please specify">
           </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="col-form-label" class="fw-bold">How you rate the usefulness of your educational preparation at EPCST for your career plans?: </label>
              <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
                                <option value="">Not helpful</option>
                                <option value="">Somewhat helpful</option>
                                <option value="">Helpful</option>
                                <option value="">Very helpful</option>
              </select>
           </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="col-form-label" class="fw-bold">Which aspects of your EPCST education were the most important and most helpful in preparing for your career plans?: </label>
              <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
                                <option value="">Curriculum</option>
                                <option value="">Career Planning Department</option>
                                <option value="">Training / Seminar</option>
                                <option value="">Internship/OJT</option>
              </select>
           </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="col-form-label" class="fw-bold">In your opinion, which areas of your educational programs at EPCST could be improved, if any?: </label>
             <textarea class="form-control"></textarea>
           </div>
          </div>
      </div>
      <div class="row">
            <div class="col">
              <label for="col-form-label" class="fw-bold">May we use your name and address for prospective student referrals?: </label>
              <select id="birth_order" class="form-select mb-3" @change="toggleOtherInput">
                                <option value="">Yes</option>
                                <option value="">No</option>
              </select>
           </div>
          </div>
      <div class="form-buttons">
        <button type="button" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data(){
    return{

    // What are your plans for the immediate future?:
    show_future_plan:false,
    future_plan_model: '',

    }
  },

  methods:{
    toggleFuturePlan(){
      this.show_future_plan = document.getElementById("future_plan_select").value === "future_plan_option ";
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
.btn:not(:last-child) {
  margin-right: 0.5rem;
}
</style>
