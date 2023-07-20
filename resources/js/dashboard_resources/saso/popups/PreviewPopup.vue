<template>
     <div class="popup">
        <div class="popup-inner" style="width: 80%;">
            <slot />
            <!-- {{ dataId }} -->
            <!-- Font size -->
            <div class="row mt-5">
                <div class="col-md-6">
                  <div class="container">
                    <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Font Size
                                </a>
                                    <ul class="dropdown-menu custom-scrollbar" aria-labelledby="dropdownMenuLink"
                                    style="overflow: hidden; height: 300px; overflow-y:scroll;">
                                        <li><a class="dropdown-item" href="#">8</a></li>
                                        <li><a class="dropdown-item" href="#">9</a></li>
                                        <li><a class="dropdown-item" href="#">10</a></li>
                                        <li><a class="dropdown-item" href="#">11</a></li>
                                        <li><a class="dropdown-item" href="#">12</a></li>
                                        <li><a class="dropdown-item" href="#">14</a></li>
                                        <li><a class="dropdown-item" href="#">16</a></li>
                                        <li><a class="dropdown-item" href="#">18</a></li>
                                        <li><a class="dropdown-item" href="#">20</a></li>
                                        <li><a class="dropdown-item" href="#">22</a></li>
                                        <li><a class="dropdown-item" href="#">24</a></li>
                                        <li><a class="dropdown-item" href="#">26</a></li>
                                        <li><a class="dropdown-item" href="#">28</a></li>
                                        <li><a class="dropdown-item" href="#">36</a></li>
                                        <li><a class="dropdown-item" href="#">48</a></li>
                                        <li><a class="dropdown-item" href="#">72</a></li>
                                    </ul>
                                </div>
                  </div>
                </div>
                <!-- Selection -->
                <div class="col-md-6">
                    <div class="container">
                                <div class="btn btn-white">
                                        <b class="text-secondary">Selection Details: </b>
                                    </div>
                                 <!-- Font Size -->
                                <div class="dropdown">
                                    <div class="text-secondary ">
                                        Font Size
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b>:</b>
                                    </div>
                                </div>
                                <div class="dropdown me-2">
                                    <div class="text-success">
                                        <b>0 pt</b>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b class="text-secondary">|</b>
                                    </div>
                                    
                                </div>
                                      <!-- Font Size -->
                                      <div class="dropdown">
                                    <div class="text-secondary">
                                        Selected
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b>:</b>
                                    </div>
                                </div>
                                <div class="dropdown me-2">
                                    <div class="text-success">
                                        <b>0</b>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <!-- ID Canvas -->
                <div
                        class="row"
                        style="height: 400px; overflow: hidden"
                        >
                        <!-- Content for ID preview -->
                        <div class="col-sm-6">
                            <canvas
                                ref="canvasRef"
                                :width="canvasWidth"
                                :height="canvasHeight"
                            ></canvas>
                        </div>
                        <div class="col-md-6" style="height: 380px;overflow: hidden;">
                            <canvas class="" ref="canvasBackRef" :width="canvasWidth" :height="canvasHeight"></canvas>
                        </div>
                     
                    </div>
            <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-success me-3"
                            @click="handleExportButtonClick()"
                        >
                            Save Changes
                        </button>
                         <button
                            class="popup-close btn btn-secondary"
                            @click="TogglePopup()">
                            Close
                        </button>
                    </div>
        </div>
     </div>
</template>

<script>
    import { onMounted } from 'vue';
    export default {
        
        props: ["TogglePopup", "dataId"],
        setup(props){

            onMounted(()=>{
                
            })
        }
    }
</script>

<style scoped>
.popup {
    /* width: 100%; */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100;
    overflow-y: scroll  
}
.popup .popup-inner {
    position: relative;
    background: #fff;
    padding: 35px;
}
/* Dropdown Design */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-toggle {
  padding: 0.5rem 1rem;
  font-size: 14px;
  font-weight: bold;
  color: #333;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.dropdown-toggle:hover {
  background-color: #f4f4f4;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  min-width: 100%;
  padding: 0.5rem 0;
  margin: 0;
  list-style: none;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
  display: block;
  padding: 0.5rem 1rem;
  color: #333;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.dropdown-item:hover {
  background-color: #d5d0d0;
}
.custom-scrollbar::-webkit-scrollbar {
  display: none;
}
</style>