<template>
    <div>
      <nav class="navbar navbar-light bg-light justify-content-between">
        <!-- Eastwoods Logo -->
        <div class="logo">
          <img src="../images/east_logo.png" alt="">
          <p>EASTWOODS PROFESSIONAL COLLEGE OF SCIENCE AND TECHNOLOGY</p>
        </div>
        <!-- Display this menu in mobile view -->
        <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- If user is logged in, show user's name and dropdown menu -->
        <div id="navbar" class="user-dropdown d-none d-lg-block" v-if="state.isLoggedIn && Object.keys(state.credentials).length > 0">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> {{ state.credentials.name }}
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li class="dropdown-item-icon">
              <span class="icon"><i class="fas fa-gear"></i></span>
               <!-- Change password option (insert here the actual router link)-->
              <router-link class="dropdown-item" to="#">Change Password</router-link>
            </li>
              <!-- Logout option -->
            <li class="dropdown-item-icon">
              <span class="icon"><i class="fas fa-arrow-right"></i></span>
              <!-- <router-link class="dropdown-item" to="/logout">Logout</router-link> -->
              <a class="dropdown-item" href="#" @click="logout()">Logout</a>
            </li>
          </div>
        </div>
      </nav>
      <!-- Display the content of each page -->
      <div>
        <router-view></router-view>
      </div>
    </div>
</template>
<script setup>
  import { reactive, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  import {useLoading} from 'vue-loading-overlay'
  import { useToast } from "vue-toast-notification";
  // Create router instance
  const router = useRouter()
  
  // reactive state
  const state = reactive({  
    isLoggedIn: false,
    credentials: {}
  })
  const $loading = useLoading({
        // options
        });
  // onMounted hook
  onMounted(() => {
    // Retrieve isLoggedIn and credentials from localStorage
    const isLoggedIn = localStorage.getItem('isLoggedIn')
    const credentials = JSON.parse(localStorage.getItem('credentials'))
  
    // Set state properties
    state.isLoggedIn = isLoggedIn === 'true'
    state.credentials = credentials
  
    // Redirect user to appropriate page
    if (isLoggedIn === 'true') {
      // router.go()
      const loader = $loading.show({
            // Optional parameters
                loader: 'spinner',
                color: '#00FF00',
                width: 94,
                height: 94,
                backgroundColor: '#808080',
                opacity: 0.5,
                zIndex: 999
            });
            // simulate AJAX
            setTimeout(() => {
                loader.hide()  
                const $toast = useToast();
                let instance = $toast.success(`Welcome to ${credentials.role}-Dashboard!`, {
                    position: "top-right",
                });
                router.push({name:`${credentials.role}-Dashboard`})
            }, 500)
    }else{
        const loader = $loading.show({
            // Optional parameters
                loader: 'spinner',
                color: '#00FF00',
                width: 94,
                height: 94,
                backgroundColor: '#808080',
                opacity: 0.5,
                zIndex: 999
            });
            // simulate AJAX
            setTimeout(() => {
                loader.hide()  
                const $toast = useToast();
                let instance = $toast.warning(`Your not Authenticated User!`, {
                    position: "top-right",
                });
                router.push({ name: 'Login' })
            }, 500)
    }

  })
//   logout
const logout = async ()=>{
        localStorage.setItem('isLoggedIn', false)
        const cred = { "name": "" };
        localStorage.setItem('credentials', JSON.stringify(cred));
        const loader = $loading.show({
            // Optional parameters
                loader: 'spinner',
                color: '#00FF00',
                width: 94,
                height: 94,
                backgroundColor: '#808080',
                opacity: 0.5,
                zIndex: 999
            });
            // simulate AJAX
            setTimeout(() => {
                loader.hide()  
                const $toast = useToast();
                let instance = $toast.warning(`Your Logging out User!`, {
                    position: "top-right",
                });
                router.push({ name: 'Login' })
                // Refresh the page
                location.reload();
            }, 500)
        
        
}
</script>

<style scoped>
  /* Styling for logo */
  .logo {
    display: flex;
    align-items: center;
  } 
  .logo img {
    height: 50px;
    margin-right: 10px;
    transform: scale(0.95);
  }
  /* Additional styles for the logo and dropdown */
  .logo img {
    object-fit: contain;
    margin-left: 20px;
  }
  .logo p {
    font-size: 15px;
    margin-top: 20px;
    color: green;
    font-weight: bolder;
  }

  /* Styling for user dropdown menu */
  .user-dropdown {
    display: flex;
    align-items: center;
    position: relative;
  }
  .dropdown-menu {
    background-color: #fff;
    border: none;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0,0,0,.1);
    position: absolute;
    top: 2.5rem;
    right: 0;
    min-width: 180px;
    z-index: 1;
  }
  .dropdown-item {
    color: #333;
    font-weight: 500;
    padding: .5rem 1rem;
    transition: background-color .2s;
    display: flex;
    align-items: center;
    border-radius: 5px;
  }
  .dropdown-item-icon {
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .dropdown-item:hover {
    background-color: #f1f1f1;
  }
  /* Custom styles for icon */
  .fa-user {
    margin-right: 5px;
  }
  .icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    padding: 1rem
  }
  .icon i {
    font-size: 14px;
    color: #333;
  }
  .user-dropdown button {
    margin-right: 20px;
  }
  .user-dropdown a {
    margin-right: 20px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: all 0.2s;
  }
  .user-dropdown a:hover {
    color: #fff;
    background-color: green;
    border-radius: 5px;
  }
  /* 3D box-shadow effect */
  .navbar {
    box-shadow: 0 3px 5px rgba(0,0,0,.1), 
       0 6px 10px rgba(0,0,0,.1), 
       0 12px 20px rgba(0,0,0,.1),
       0 24px 40px rgba(0,0,0,.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }
  /* Optional: Adjust the table layout on smaller screens */
  @media screen and (max-width: 630px) {
    .navbar {
      flex-direction: column;
      align-items: flex-start;
    }
    .user-dropdown {
      margin-top: 10px;
    }
  }
</style>
