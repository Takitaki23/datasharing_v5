<template>
    <div>
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item mt-3">
                    <a class="nav-link" href="#" @click.prevent="goToDashboardMain">
                        <i class="fas fa-th"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#"
                        @click.prevent="toggleDatatable"
                    >
                        <i class="fas fa-users"></i>
                        <span>View Records</span>
                    </a>
                </li>
                <!-- End View Records Nav -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="#"
                        @click.prevent="toggleTemplateSelection"
                    >
                        <i class="fa-solid fa-id-card"></i>
                        <span> Template ID</span>
                    </a>
                </li>
                <!-- End Selection of templates Nav -->
            </ul>
        </aside>
        <!-- Saso Dashboard Design -->
        <main>
            <!-- Display the current component based on the toggle -->
            <component :is="currentComponent" />
        </main>
    </div>
    <!-- End Sidebar-->
</template>

<!-- Use the <script setup> tag to define variables and import modules. -->
<script>
// Import the `useRouter` function from the vue-router module
import { reactive, onMounted, defineAsyncComponent, ref } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "vue-toast-notification";
import {useLoading} from 'vue-loading-overlay'
const $loading = useLoading({
        // options
        });
const DashboardMain = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/DashboardMain.vue")
);
const Datatable = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/datatable.vue")
);

// template dash
const TemplateID = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/TemplateID.vue")
);


// test
const ViewStudentsInfo = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/ViewStudentInformation.vue")
);
const AddStudentInfo = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/AddStudentInformation.vue")
);
const EditStudentInfo = defineAsyncComponent(() =>
    import("../dashboard_resources/saso/EditStudentInformation.vue")
);

export default {
    setup() {
        
        // Get the router instance
        const router = useRouter();

        // Define reactive variables
        const isLoggedIn = ref(false);
        const credentials = ref({});

        // Define a function to redirect to another dashboard based on the user's role
        const redirectToOtherDashboard = () => {
            const credentialsValue = credentials.value;
            if (credentialsValue.role !== "saso") {
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
                let instance = $toast.warning(`Your Redirected to ${credentialsValue.role}-Dashboard!`, {
                    position: "top-right",
                });
                router.push({ name: `${credentialsValue.role}-Dashboard` });
            }, 500)
            }
        };
        const currentComponent = ref("DashboardMain");

        const toggleDatatable = () => {
            // currentComponent.value = "Datatable";
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
                let instance = $toast.success(`Table is initialized`, {
                    position: "top-right",
                });
                currentComponent.value = "Datatable";
            }, 500)
        };

        // Method to navigate to DashboardMain component
        const goToDashboardMain = () => {
        //   currentComponent.value = "DashboardMain";
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
                let instance = $toast.success(`Dashboard Loaded Successfully!`, {
                    position: "top-right",
                });
                currentComponent.value = "DashboardMain";
            }, 500)
        };

        // Method for navigation to Template
        const toggleTemplateSelection = () => {
            // currentComponent.value = "TemplateID";
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
                let instance = $toast.success(`Dashboard Template Successfully!`, {
                    position: "top-right",
                });
                currentComponent.value = "TemplateID";
            }, 500)
        }

        

        // Load data from local storage when the component is mounted
        onMounted(() => {
            const storedCredentials = JSON.parse(
                localStorage.getItem("credentials")
            );
            credentials.value = storedCredentials;
            isLoggedIn.value = !!storedCredentials;
            redirectToOtherDashboard();
        });
        // Return the variables and functions that you want to make available in your template
        return {
            isLoggedIn,
            credentials,
            DashboardMain,
            Datatable,
            currentComponent,
            toggleDatatable,
            redirectToOtherDashboard,
            goToDashboardMain, 
            toggleTemplateSelection// expose the new method to the template

            
        };
    },
    components: {
      DashboardMain,
      Datatable,
      TemplateID,


    //test
    ViewStudentsInfo,
    AddStudentInfo,
    EditStudentInfo,
    
    }
};
</script>

<style scoped>
/* Styles for the sidebar */
.sidebar {
    position: fixed;
    top: 5rem;
    left: 0;
    width: 250px;
    height: calc(100vh - 8rem);
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1), 0 6px 10px rgba(0, 0, 0, 0.1),
        0 12px 20px rgba(0, 0, 0, 0.1), 0 24px 40px rgba(0, 0, 0, 0.1);
    height: 100%;
    padding: 0.5rem;
}
.sidebar-nav {
    list-style: none;
    padding: 0;
    margin-top: 2rem;
    font-weight: bold;
}
/* Styles for the navigation */
.nav-item {
    transform-style: preserve-3d;
    transform-origin: left center;
    transition: all 0.3s ease-out;
    background: #fff;
    padding: 10px 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1), 0 6px 10px rgba(0, 0, 0, 0.1),
        0 12px 20px rgba(0, 0, 0, 0.1), 0 24px 40px rgba(0, 0, 0, 0.1);
}
.nav-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 20px 40px rgba(0, 0, 0, 0.2),
        0 30px 60px rgba(0, 0, 0, 0.2), 0 40px 80px rgba(0, 0, 0, 0.3);
}
.nav-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
    transition: color 0.3s ease-out;
}
.nav-link:hover {
    color: #24af12;
}
.fa-th,
.fa-users,
.fa-users-cog,
.fa-id-badge,
.fa-id-card,
.fa-file-alt {
    margin-right: 10px;
    font-size: 1.2rem;
    transition: transform 0.3s ease-out;
}
.nav-link:hover span {
    transform: perspective(1000px) rotateX(30deg) rotateY(0deg) scale(1.1);
}
h1 {
    font-size: 32px;
    margin-top: 0;
}
@media screen and (max-width: 1530px) {
    .sidebar{
        width: 100%;
        position: static;
        margin-bottom: 20px;
        /* border: 1px solid red !important; */
    }
}
</style>
