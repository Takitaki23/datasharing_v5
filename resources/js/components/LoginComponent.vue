  <template>
    <div>
    <!-- Section: Design Block -->
    <section class="text-center position-relative">
      <!-- Background image -->
        <div class="p-5 bg-image" style="
              background-image: url('https://epcst.files.wordpress.com/2012/08/eastwoods-3.jpg');
              height: 400px;
              background-size: cover; /* add this line */
              filter: brightness(85%);
              ">
        </div>
        <!-- Background image -->
        <div class="card mx-4 mx-md-5 shadow-5-strong col-md-6" style="
              border-radius: 0;
              margin-top: 250px;
              background: hsla(0, 0%, 100%, 0.8);
              backdrop-filter: blur(30px);
              box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
              ">
          <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-8">
                <h2 class="fw-bold mb-5 ">Please login your account</h2>
                <form  @submit.prevent="onSubmit">
                  <!-- Email input -->
                  <input type="text" hidden value="{{ errors }}">
                  <div class="form-outline mb-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                      </div>
                      <input type="email" id="email" class="form-control" v-model="email.modelValue"  placeholder="example@gmail.com" required/>
                    </div>
                    <p class="text-danger" v-if="errors.email">{{ errors.email }}</p>
                  </div>
                  <!-- Password input -->
                    <div class="form-outline mb-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input type="password" id="password" class="form-control" v-model="password.modelValue"  placeholder="password" required/>
                      </div>
                      <p class="text-danger" v-if="errors.password">{{ errors.password }}</p>
                    </div>
                    <!-- Button -->
                    <button class="myBtn">
                      <i class="fa-solid fa-right-to-bracket fa-bounce"></i> SIGN IN
                    </button>

                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
  <!-- Section: Design Block -->
    </div>
  </template>

  <!-- composition setup -->
  <script>
    import { reactive, nextTick  } from 'vue'
    import axios from 'axios';
    import { useRouter } from 'vue-router'
    export default {
      setup() {
        const router = useRouter()
        const state = reactive({
          email: {modelValue:''},
          role:'',
          password: {modelValue:''},
          isLoggedIn:false,
          errors: {
            email: '',
            password: ''
          }
        })
        // // 1st task initialize credentials
        // const cred = {
        //         "name": '',
        //     }
        // onMounted(()=>{
        //     localStorage.setItem('credentials', JSON.stringify(cred))
        // })

        const onSubmit = async() => {
          // Clear any existing errors
          state.errors.email = ''
          state.errors.password = ''

          // Validate the form data
          if (!state.email.modelValue) {
            console.log(state.email)
            state.errors.email = 'Please enter an email address.'
            return
          }
          if (!state.password.modelValue) {
            state.errors.password = 'Please enter a password.'
            return
          }
          // Submit the form data to the server
          // (replace this with your own implementation)
          const formData = {
            email: state.email.modelValue,
            password: state.password.modelValue
          }
          console.log(formData)
          // header
          // set header
          const headers = {
                  'Accept': 'application/vnd.api+json',
                  'Content-Type': 'application/vnd.api+json',
                  }
          // submit data
          try {
            const response = await axios.post('/api/', formData, {headers})
            // Handle successful authentication
            if (response.data.status === true) {
              // set role here
              state.role = response.data.credentials.role
              // just for now stored it on local storage
              localStorage.setItem('credentials',JSON.stringify(response.data.credentials))
              localStorage.setItem('token',response.data.token)
              state.isLoggedIn = true
              // just for now
              localStorage.setItem('isLoggedIn',state.isLoggedIn)
              console.log(router)
              // router.push({ name: 'Dashboard' })
              nextTick(() => {
                router.push({ name: `${state.role}-Dashboard` });
                location.reload();
              });
            }else {
              state.errorMessage = response.data.message
            }
          } catch (error) {
            // Handle authentication error
            if (error.response.status === 422) {
              // state.errors = errors.response.data.errors
              if (error.response.data.errors.email) {
                state.errors.email = error.response.data.errors.email[0]
              } else if(error.response.data.errors.password) {
                state.errors.password = error.response.data.errors.password[0]
              }
            
              
              console.log(state.errors)
            } else {
              state.errors = { message: 'An error occurred. Please try again later.' }
            }
          }
        }
        return {
          email: state.email,
          password: state.password,
          errors: state.errors,
          onSubmit
        }
      }
    }
  </script>
  <style scoped>
  .bg-gradient-green {
    background-image: linear-gradient(to bottom right, #09ff09a5, #99eab3cb);
  }
  .input-group-text {
    font-size: 1.5rem; /* adjust the size as needed */
    line-height: 1.5; /* adjust the line-height as needed */
  }
  /* Error Design */
  .text-danger {
    font-size: 14px;
    font-weight: 600;
    margin-top: 8px;
  }
  .text-danger:before {
    content: "⚠ ";
    color: #dc3545;
  }
  .text-danger:after {
    content: "";
    display: block;
    height: 2px;
    width: 100%;
    background-color: #dc3545;
    margin-top: 4px;
  }
  /* Card body */
.card {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
/* Sign in Button Design */
.myBtn {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: green;
  border: none;
  border-radius: 49px;
  color: #fff;
  font-weight: 600;
  height: 49px;
  margin: 10px 0;
  outline: none;
  text-transform: uppercase;
  width: 150px;
  margin: auto
}
.myBtn:hover{
  background-color: #45a049;
}
.myBtn i {
  margin-right: 5px;
}
  </style>


