<template>
    <div class="main-container" style="height: 650px; overflow: scroll;">
        <div class="dashboard_header" style="   margin: auto; margin-left: 4rem;">
            <h1 class="fw-bold">Template ID</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Template ID
                    </li>
                </ol>
            </nav>
        </div>
        <div class="upload_files mb-5">
            <div class="upload-container">
                <label for="formFile" class="form-label">Upload ID Template</label>
                <input class="form-control short-input" type="file" id="formFile" multiple @change="handleFileUpload">
            </div>
            <div class="uploaded_files" v-if="uploadedFiles.length > 0" style="width:70%; margin: auto; margin-top: 1rem;">
                <div class="uploaded_file" v-for="(file, index) in uploadedFiles" :key="index">
                    <img :src="file.url" :alt="'Uploaded ID Template ' + (index + 1)">
                    <button class="btn btn-danger btn-sm delete-button" @click="removeUploadedFile(index)">
                        X
                    </button>
                </div>
            </div>
        </div>
        <div class="scroll-container">
            
            <div
            class="row justify-content-center table-main"
            style="width: 90%; margin: auto;
            "
            >

            <div class="">
              <h3 class="fw-bold">Choose Template</h3>
            </div>

            <div class="col-md-12">
                <!-- {{ imageTemplates }} -->
                <div class="image-gallery">
                    <div
                        class="image-item"
                        v-for="(tmpID, index) in imageTemplates"
                        :key="index"
                    >
                        <img :src="'id_template/' + tmpID" alt="Image 1" @click="handleImageClick('id_template/' + tmpID)"/>
                        <!-- <div id="image-overlay" :class="isActive">
                            <h2>Active Template</h2>
                        </div> -->
                        <div :class="{ 'image-overlay': true, 'active': isActive === 'id_template/' + tmpID }">
                            <h2 v-if="isActive === 'id_template/' + tmpID" class="border bg-secondary rounded p-2 text-white"><b>Active Template</b></h2>
                        </div>
                    </div>

                    <!-- editor for template -->
                </div>
                <div class="row mt-5 border p-2">
                    <div class="col-md-6 mt-3">
                        <h3 class="text-secondary fw-bold">Edit Template</h3>
                    </div>  
                    <div class="col-md-6 mt-3">
                        <h3 class="text-secondary fw-bold">Selection Details</h3>
                    </div>  
                        <div class="col-md-2">
                            
                               <!-- For font size dropdown -->
                            <div class="container mt-3">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleDropdown" aria-haspopup="true" aria-expanded="false" >
                                        Select Font Size: <span class="badge text-bg-success" v-if="selectedFontSize"><b>{{ selectedFontSize }} pt</b></span>
                                    </button>
                                    <ul class="dropdown-menu  custom-scrollbar" :class="{ 'show': dropdownOpen }" aria-labelledby="dropdownMenuButton"
                                    style="overflow: hidden; height: 300px; overflow:scroll;"
                                    
                                    >
                                    <li v-for="fontSize in fontSizes" :key="fontSize">
                                        <a class="dropdown-item" href="#" @click="selectFontSize(fontSize)">{{ fontSize }}</a>
                                    </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                              <!-- For font family dropdown -->
                              <div class="container mt-3">
                                    <!-- Your Font Family Dropdown Menu -->
                                    <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleFontFamilyDropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Font Family
                                    </button>
                                    <ul class="dropdown-menu  custom-scrollbar" :class="{ 'show': fontFamilyDropdownOpen }" aria-labelledby="dropdownMenuButton"
                                    style="overflow: hidden; height: 300px; overflow:scroll;"
                                    >
                                        <li v-for="fontFamily in fontFamilies" :key="fontFamily">
                                        <a class="dropdown-item" href="#" @click="selectFontFamily(fontFamily)">{{ fontFamily }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="text-align: center; margin-top: -.5rem;">
                              <!-- For font family dropdown -->
                              <div class="container">
                                    Resize Image
                                    <!-- Your Font Family Dropdown Menu -->
                                    <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleWidthDropdown" aria-haspopup="true" aria-expanded="false" :disabled="!isMoving">
                                        W
                                    </button>
                                    <ul class="dropdown-menu custom-scrollbar" :class="{ 'show': widthDropdownOpen }" aria-labelledby="dropdownMenuButton"
                                    style="overflow: hidden; height: 300px; overflow-y:scroll;"
                                    >
                                        <li v-for="width in widths" :key="width">
                                        <a class="dropdown-item" href="#" @click="selectWidth(width)">{{ width }}</a>
                                        </li>
                                    </ul>
                                </div>
                                    <!-- Your Font Family Dropdown Menu -->
                                    <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleHeightDropdown" aria-haspopup="true" aria-expanded="false" :disabled="!isMoving">
                                        H
                                    </button>
                                    <ul class="dropdown-menu  custom-scrollbar" :class="{ 'show': heightDropdownOpen }" aria-labelledby="dropdownMenuButton"
                                    style="overflow: hidden; height: 300px; overflow-y:scroll;"
                                    >
                                        <li v-for="height in heights" :key="height">
                                        <a class="dropdown-item" href="#" @click="selectHeight(height)">{{ height }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 border rounded">
                              <!-- For font family dropdown -->
                            <div class="container mt-3 mx-auto">
                                    <!-- Your Font Family Dropdown Menu -->
                                <div class="dropdown">
                                    <div class="text-secondary">
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
                                        <b v-if="selectedFontSize">{{ selectedFontSize }} pt</b>
                                        <b v-else="selectedFontSize">{{ 20 }} pt</b>
                                    </div>
                                    
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b class="text-secondary">|</b>
                                    </div>
                                    
                                </div>
                                 <!-- Your Font Family Dropdown Menu -->
                                 <div class="dropdown">
                                    <div class="text-secondary">
                                        Font Family
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b>:</b>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="text-success">
                                        <b v-if="selectedFontFamily">{{ selectedFontFamily }}</b>
                                        <b v-else="selectedFontSize">{{ "Helvetica" }}</b>
                                    </div>
                                    
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b class="text-secondary">|</b>
                                    </div>
                                </div>
                                <!-- Width -->
                                <div class="dropdown">
                                    <div class="text-secondary">
                                       Width
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b>:</b>
                                    </div>
                                </div>
                                <div class="dropdown me-2">
                                    <div class="text-success">
                                        <b v-if="selectedWidth">{{ selectedWidth - 2 }} px</b>
                                        <b v-else="selectedWidth">{{ 350 }} px</b>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b class="text-secondary">|</b>
                                    </div>
                                </div>
                                <!-- Height -->
                                <div class="dropdown">
                                    <div class="text-secondary">
                                       Height
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b>:</b>
                                    </div>
                                </div>
                                <div class="dropdown me-2">
                                    <div class="text-success">
                                        <b v-if="selectedHeight">{{ selectedHeight - 15 }} px</b>
                                        <b v-else="selectedHeight">{{ 400 }} px</b>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <div class="btn btn-white">
                                        <b class="text-secondary">Selected : </b>
                                        <b class="text-success" v-if="selectedContent">{{ selectedContent }} </b>
                                        <b class="text-success" v-else>{{ "select content" }} </b>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                <div class="row mt-4">
                    <!-- <div class="col-md-4 border">
                        <canvas
                            v-for="(content, index) in contents"
                            :key="index"
                            class="draggable"
                            :id="'canvas-' + index"
                            ref="draggableCanvases"
                        ></canvas>
                    </div> -->
                    <div class="col-md-6" style="height: 332px; padding: 1rem; width: 42.7%;">
                        <canvas
                            class=""
                            ref="canvasRef"
                            :width="canvasWidth"
                            :height="canvasHeight"
                        ></canvas>
                        <!-- <div v-if="isLoading" class="canvas-con">
                            <div class="loading-message">
                                <h3 class="text-secondary"><b>Front Template.</b></h3>
                            </div>
                        </div> -->
                    </div>
                    
                    <div class="col-md-6" style="height: 332px; padding: 1rem; width: 42.7%;">
                        <canvas
                            class=""
                            ref="canvasBackRef"
                            :width="canvasWidth"
                            :height="canvasHeight"
                        ></canvas>
                        <!-- <div v-if="isLoading" class="canvas-con">
                            <div class="loading-message">
                                <h3 class="text-secondary"><b>Back Template.</b></h3>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
       

        <button
            type="button"
            class="btn btn-success mt-3 fw-bold generate-id-button"
            data-bs-toggle="modal"
            data-bs-target="#bulkPreviewModal"
            @click="handleExportButtonClick"
        >
            <i class="fa-solid fa-id-card-clip fa-flip fa-xl"></i> Save Template
            <!-- <span v-show="selectedIds != 0" class="badge text-bg-danger">
                {{ selectedIds }}</span
            > -->
        </button>
    </div>
    <!-- view modal -->
    <!-- <viewModal v-show="modalVisible" :modalData="modalData" :dataId="dataId"  @close="closeModalView" />
    <editModal v-show="editModalVisible" @close="closeModalEdit" />
    <addModal v-show="addModalVisible" :modalData="modalData" :dataId="dataId" :addModalVisible="addModalVisible" @close="closeModalAdd" />
    <previewId v-id="previewModalVisible" :modalData="modalData" :dataId="dataId" @close="closeModalPreview" /> -->
</template>
<script>
// defineComponent to call the composition api function in
import { ref, onMounted, computed,getCurrentInstance, watch, defineComponent } from "vue";
import axios from "axios";
import { useToast } from "vue-toast-notification";
// for debuging
// import collegef from "../../images/collegef.png";
// import collegeb from "../../images/collegeb.png";
import profile from "../../images/man.png";
import {useLoading} from 'vue-loading-overlay'
export default defineComponent({
// For adding new template
    data() {
    return {
      uploadedFiles: [],
    };
  },
  methods: {
    handleFileUpload(event) {
      const files = event.target.files;

      const formData = new FormData();

      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        formData.append('files[]',file)
        const fileObject = {
          url: URL.createObjectURL(file),
          name: file.name,
        };
        // Insert the new file at the beginning of the array
        this.uploadedFiles.unshift(fileObject);
      }

      // Send the files to the server using an AJAX request
        axios.post('/api/upload-images', formData)
            .then(response => {
            // Handle the response if needed
            console.log(response.data);
            const $toast = useToast();
            let instance = $toast.success(response.data.message, {
                position: "top-right",
            });
            this.getImageTemplates()
            // Remove everything from the handleFileUpload method
            event.target.value = ''; // Clear the file input
            this.uploadedFiles = []; // Clear the uploadedFiles array

        })
        .catch(error => {
        // Handle the error if needed
        console.error(error);
        });
    },
    removeUploadedFile(index) {
            this.uploadedFiles.splice(index, 1);
    },
  },
    setup() {
        
        const zoomStep = 0.01; // Adjust this value to control zoom speed
        const minZoom = 0.9; // Minimum zoom level
        const maxZoom = 2.0; // Maximum zoom level
        let zoomLevel = 1.0; // Initial zoom level
        // const tmpID = ref("/id_template/collegef.png");
        // storage for templates
        const imageTemplates = ref([]);
        const templateCoordinates = ref([]);

        // college front
        let collegef = ref(localStorage.getItem('activeImage') || '/id_template/collegef.png')
        let collegeb = ref(localStorage.getItem('activeImageBack') ||'/id_template/collegeb.png')
        let signature = ref('/id_signatures/default.png')

        // Create a hidden canvas for double buffering
        const hiddenCanvas = document.createElement("canvas");
        const hiddenContext = hiddenCanvas.getContext("2d");

        // Add a selectedContentIndex reactive variable
        const selectedContentIndex = ref(null);
        const selectedContentIndexBack = ref(null);
        const selectedContent = ref(null);


        const instance = getCurrentInstance();
        const canvasRef = ref(null);
        const canvasBackRef = ref(null);
        const canvasWidth = ref(0);
        const canvasHeight = ref(0);
        // we devided by 2 to make it smaller
        let isMoving = ref(false);
        const profileX = ref(55 / 2); // Adjust the X coordinate as needed
        const profileY = ref(87 / 2); // Adjust the Y coordinate as needed
        const profileWidth = ref(352 / 2); // Adjust the width as needed
        const profileHeight = ref(415 / 2); // Adjust the height as needed

        // we devided by 2 to make it smaller
        const signatureX = ref((240+64.02) ); // Adjust the X coordinate as needed
        const signatureY = ref(75); // Adjust the Y coordinate as needed
        const signatureWidth = ref(300/2); // Adjust the width as needed
        const signatureHeight = ref(150); // Adjust the height as needed

        // Drag variables
        var isDragging = ref(false);
        var startX = ref(0);
        var startY = ref(0);

        var isDraggingBack = ref(false);
        var startXBack = ref(0);
        var startYBack = ref(0);

        const draggedElement = ref(null);
        const draggedElementBack = ref(null);

        // Define a default font size
        const defaultFontSize = 21.33; // Change this value as per your requirement

        // Define a default font family
        const defaultFontFamily = 'Arial'; // Change this value as per your requirement

        // Define the font sizes available in the dropdown
        const fontSizes = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28,30, 36, 48, 72];

        // Your existing font families
        const fontFamilies = [
            'Arial', 'Verdana', 'Times New Roman', 'Courier New', 'Georgia', 'Comic Sans MS',
            'Calibri', 'Century Gothic', 'Monseratt', 'Poppins','Arial Narrow','Myriad Pro',
            'Hevetica', 'Baskerville', 'Tahoma', 'Garamond','Franklin Gothic','Futura',
            'Cambria', 'Rockwell', 'Comfortaa', 'Proxima Nova','Roboto','Lato',
            'Quick Sand', 'Open Sans', 'Ubuntu',' Avenir','News Gothic','Merriweather',
            'Frutiger','Public Sans', 'Arial Rounded MT Bold','Bebas','Palatino',
            'Brandon Grotesque','Trebuchet MS', 
        
        ];

        const widths = [100,150,200,250,300,350,400,450,500]
        const heights = [100,150,200,250,300,350,400,450,500]
        // Define a ref for tracking the selected font size
        const selectedFontSize = ref(null);
        // Define a ref for tracking the selected Width
        const selectedWidth = ref(null);
        // Define a ref for tracking the selected Height
        const selectedHeight = ref(null);
        // Define a ref for tracking the selected font family from the dropdown
        const selectedFontFamily = ref(null);

        // Define a ref to track whether the dropdown is open or closed
        const dropdownOpen = ref(false);
        // Define a ref to track whether the font family dropdown is open or closed
        const fontFamilyDropdownOpen = ref(false);
        // Define a ref to track whether the width dropdown is open or closed
        const widthDropdownOpen = ref(false);
        // Define a ref to track whether the height dropdown is open or closed
        const heightDropdownOpen = ref(false);

        const $loading = useLoading({
        // options
        });

        const isLoading = ref(true)
        const isActive = ref(localStorage.getItem('activeImage') || '');
        // Function to toggle the dropdown visibility
        const toggleDropdown = () => {
        dropdownOpen.value = !dropdownOpen.value;
        };
        // Function to toggle the font family dropdown visibility
        const toggleFontFamilyDropdown = () => {
        fontFamilyDropdownOpen.value = !fontFamilyDropdownOpen.value;
        };
        // Function to toggle the width dropdown visibility
        const toggleWidthDropdown = () => {
            widthDropdownOpen.value = !widthDropdownOpen.value;
        };
        // Function to toggle the width dropdown visibility
        const toggleHeightDropdown = () => {
            heightDropdownOpen.value = !heightDropdownOpen.value;
        };

        // Function to handle the font size selection
        const selectFontSize = (fontSize) => {
            // selectedFontSize.value = fontSize;
            dropdownOpen.value = false; // Close the dropdown after selection (optional)
            // Close the font size dropdown after selection (optional)
            // toggleFontFamilyDropdown(false);
            // Apply the selectedFontSize to your canvas text elements
            // For example:
            // const fontSizeInPixels = parseInt(fontSize);
            // offscreenContext.font = `${fontSizeInPixels}px Arial`;
            // selectedFontSize.value = (parseInt(fontSize)/72)*96
            selectedFontSize.value = parseInt(fontSize)
        };
        // Function to handle the font family selection
        const selectFontFamily = (fontFamily) => {
            selectedFontFamily.value = fontFamily;
            // Close the font family dropdown after selection (optional)
            toggleFontFamilyDropdown(false);
        };
        // Function to handle the Width selection
        const selectWidth = (width) => {
            selectedWidth.value = width + 2;
            // Close the font family dropdown after selection (optional)
            toggleWidthDropdown(false);
        };
        // Function to handle the Width selection
        const selectHeight = (height) => {
            selectedHeight.value = height + 15;
            // Close the font family dropdown after selection (optional)
            toggleHeightDropdown(false);
        };

        const textContents = computed(() => {
            const st_id_s = "20-1234";

            const course_s = "BS. INFORMATION TECHNOLOGY";
            const last_name = "Dela Cruz";
            const first_name = "Juan";
            const middle_name = "Sanchez";
            // we devided by 2 to make it smaller
            // Map the template coordinates to textContent objects
            return [
                { content: st_id_s, x: (templateCoordinates.value[0]?.textContents_0_x || 280) / 2, y: (templateCoordinates.value[0]?.textContents_0_y || 550) / 2, fontSize: (templateCoordinates.value[0]?.textContents_0_fs ||35) / 2, fontFamily:(templateCoordinates.value[0]?.textContents_0_ff ||'Arial') },
                { content: course_s, x: (templateCoordinates.value[0]?.textContents_1_x || 45) / 2, y: (templateCoordinates.value[0]?.textContents_1_y || 590) / 2, fontSize: (templateCoordinates.value[0]?.textContents_1_fs ||25) / 2, fontFamily:(templateCoordinates.value[0]?.textContents_1_ff ||'Arial') },
                { content: last_name, x: (templateCoordinates.value[0]?.textContents_2_x || 430) / 2, y: (templateCoordinates.value[0]?.textContents_2_y || 370) / 2, fontSize: (templateCoordinates.value[0]?.textContents_2_fs ||45) / 2, fontFamily:(templateCoordinates.value[0]?.textContents_2_ff ||'Arial') },
                { content: first_name, x: (templateCoordinates.value[0]?.textContents_3_x || 430) / 2, y: (templateCoordinates.value[0]?.textContents_3_y || 420) / 2, fontSize: (templateCoordinates.value[0]?.textContents_3_fs || 45) / 2, fontFamily:(templateCoordinates.value[0]?.textContents_3_ff ||'Arial') },
                { content: middle_name, x: (templateCoordinates.value[0]?.textContents_4_x || 430) / 2, y: (templateCoordinates.value[0]?.textContents_4_y || 470) / 2, fontSize: (templateCoordinates.value[0]?.textContents_4_fs ||45) / 2, fontFamily:(templateCoordinates.value[0]?.textContents_4_ff ||'Arial') },
                ];

        });

         // for back contents
         const textContentsBack = computed(()=>{
            // Need to consume the credentials for guardian, you can see the guardian credentials at students.json

            // "guardian_name": "Jane Doe",
            const ecp = "CONTACT PERSON";

            // "guardian_address": "123 Elm Street, Metro City",
            const address1 = "#354 QUEZON ST. SAN JOSE BALANGA" 

            //   "guardian_contact_no": "0912 345 6789",
            const ecpc = "09345678986"

            const semester = "2nd Semester AY 2023 - 2024"
            return [
                {content: ecp, x:(templateCoordinates.value[0]?.textContentsBack_0_x || 310), y:(templateCoordinates.value[0]?.textContentsBack_0_y || 120) / 2,fontSize:30/2, fontFamily:'Arial'},
                {content: address1, x:(templateCoordinates.value[0]?.textContentsBack_1_x || 280),y:(templateCoordinates.value[0]?.textContentsBack_1_y ||160)/2,fontSize:22/2,fontFamily:'Arial'},
                // {content: barangay, x:255,y:0,fontSize:25},
                // {content: address2, x:255,y:122,fontSize:25/2},
                // {content: province, x:0,y:0,fontSize:0},
                {content: ecpc, x:(templateCoordinates.value[0]?.textContentsBack_2_x ||340),y:(templateCoordinates.value[0]?.textContentsBack_2_y ||200)/2,fontSize:25/2,fontFamily:'Arial'},
                {content: semester, x:(templateCoordinates.value[0]?.textContentsBack_3_x ||35),y:(templateCoordinates.value[0]?.textContentsBack_3_y || 500)/2,fontSize:30/2,fontFamily:'Arial'},
            ]
        })

        const updateCanvasSize = () => {
            const canvas = canvasRef.value;
            const canvasBack = canvasBackRef.value;
            if (canvas && canvasBack) {
                // we devided by 2 to make it smaller
                canvasWidth.value = canvas.width / 2;
                canvasHeight.value = canvas.height / 2;
            }
        };

        const handleZoom = (event) => {
            event.preventDefault();
            const delta = Math.sign(event.deltaY);

            // Calculate the new zoom level with adjusted zoomStep
            const newZoomLevel = Math.min(Math.max(zoomLevel + delta * zoomStep, minZoom), maxZoom);

            if (newZoomLevel !== zoomLevel) {
                zoomLevel = newZoomLevel;
                redrawCanvas();
            }else{
                zoomLevel = 1.0
                redrawCanvas();
            }
        };

        const redrawCanvas = () => {
            const canvas = canvasRef.value;
            const canvasBack = canvasBackRef.value;

            try {
                if (canvas && canvasBack) {
                const context = canvas.getContext("2d");
                const contextBack = canvasBack.getContext("2d");

                // we devided by 2 to make it smaller
                const canvasWidth = canvas.width / 2;
                let canvasHeight = canvas.height / 2;
                // front
                const offscreenCanvas = document.createElement("canvas");
                const offscreenContext = offscreenCanvas.getContext("2d");

                // back
                const offscreenCanvasBack = document.createElement("canvas");
                const offscreenContextBack = offscreenCanvasBack.getContext("2d");

                // Set offscreen canvas size
                offscreenCanvas.width = canvasWidth;
                offscreenCanvas.height = canvasHeight;

                 // second canvas
                offscreenCanvasBack.width = canvasWidth;
                offscreenCanvasBack.height = canvasHeight;

                // Clear the offscreen canvas
                offscreenContext.clearRect(0, 0, canvasWidth, canvasHeight);
                // Clear the offscreen canvas2
                offscreenContextBack.clearRect(0, 0, canvasWidth, canvasHeight);

                // Draw the template image
                const templateImage = new Image();
                 // draw the back
                const backTemplateImage = new Image();
                templateImage.src = collegef.value;

                templateImage.onload = () => {
                    const templateAspectRatio =
                        templateImage.width / templateImage.height;
                    const canvasAspectRatio = canvasWidth / canvasHeight;

                    let drawWidth, drawHeight;
                    let offsetX = 0,
                        offsetY = 0;

                    console.log(templateAspectRatio, canvasAspectRatio)
                    if (templateAspectRatio != canvasAspectRatio) {
                        console.log('Portrait mode');
                        // Template image is taller than the canvas (portrait mode)
                        drawHeight = canvasHeight;
                        drawWidth = drawHeight * templateAspectRatio;
                        offsetX = (canvasWidth - drawWidth) / 2;
                        // Calculate the zoom level to make the template fit in the canvas width
                        // zoomLevel = canvasWidth / drawWidth;

                        // console.log(zoomLevel)
                    } else {
                        console.log('Landscape mode');
                        // Template image is taller than the canvas
                        drawHeight = canvasHeight;
                        drawWidth = drawHeight * templateAspectRatio;
                        offsetX = (canvasWidth - drawWidth) / 2;
                    }

                    // Apply the zoom level to the back offscreen canvas
                    // offscreenContext.scale(zoomLevel, zoomLevel);

                    // Draw the template image on the offscreen canvas
                    offscreenContext.drawImage(
                        templateImage,
                        offsetX,
                        offsetY,
                        drawWidth,
                        drawHeight
                    );

                    // Draw the profile image
                    const profileImage = new Image();
                    profileImage.src = profile;
                    profileImage.onload = () => {
                        offscreenContext.drawImage(
                            profileImage,
                            profileX.value,
                            profileY.value,
                            profileWidth.value,
                            profileHeight.value
                        );

                        // Add event listener for mouse click on the front canvas
                        canvas.addEventListener("click", handleMouseClick);
                        // canvas.addEventListener("click", handleZoom);
                        // Draw the text elements
                        if (textContents.value) {
                            // console.log(selectedFontSize.value)
                            textContents.value.forEach((textContent, index) => {
                               
                                offscreenContext.font = `${textContent.fontSize}px ${textContent.fontFamily}`;
                                if (index === selectedContentIndex.value) {
                                    // get the selected text
                                    selectedContent.value = textContent.content
                                    offscreenContext.fillStyle = "green"; // Apply selection style for the selected text content (green)
                                    offscreenContext.font = `${textContent.fontSize+0.5}px ${textContent.fontFamily}`;
                                            // Shadow properties
                                            offscreenContext.shadowColor = "grey";
                                            offscreenContext.shadowOffsetX = 1;
                                            offscreenContext.shadowOffsetY = 5;
                                            offscreenContext.shadowBlur = 3;
                                        } else {
                                            offscreenContext.fillStyle = "black"; // Apply regular style for non-selected text content
                                            offscreenContext.shadowColor = "transparent"; // Reset shadow for non-selected text
                                        }
                                offscreenContext.fillText(
                                textContent.content,
                                textContent.x,
                                textContent.y
                                );
                            });
                        }

                         
                        
                        // Copy the offscreen canvas to the visible canvas
                        context.clearRect(0, 0, canvasWidth, canvasHeight);
                        // Set the scaling for the front context based on the zoomLevel
                        // context.scale(zoomLevel, zoomLevel);
                        context.drawImage(offscreenCanvas, 0, 0);
                         // Reset the scaling back to 1.0 for future redraws (front)
                        // context.scale(1.0, 1.0);

                        backTemplateImage.src = collegeb.value
                        backTemplateImage.onload = () => {
                            const backTemplateAspectRatio = backTemplateImage.width / backTemplateImage.height;
                            const canvasAspectRatio = canvasWidth / canvasHeight;

                            let backDrawWidth, backDrawHeight;
                            let backOffsetX = 0, backOffsetY = 0;

                            if (backTemplateAspectRatio != canvasAspectRatio) {
                                // Back template image is wider than the canvas
                                backDrawWidth = canvasWidth;
                                backDrawHeight = backDrawWidth / backTemplateAspectRatio;
                                backOffsetY = (canvasHeight - backDrawHeight) / 2;
                            } else {
                                // Back template image is taller than the canvas
                                backDrawHeight = canvasHeight;
                                backDrawWidth = backDrawHeight * backTemplateAspectRatio;
                                backOffsetX = (canvasWidth - backDrawWidth) / 2;
                                // backOffsetX = 0;
                            }

                            // Draw the back template image on the second canvas
                            offscreenContextBack.drawImage(
                                backTemplateImage,
                                backOffsetX,
                                backOffsetY,
                                backDrawWidth,
                                backDrawHeight
                            );

                             // Draw the profile image
                            const signatureImage = new Image();
                            signatureImage.src = signature.value
                            signatureImage.onload = () => {
                                offscreenContextBack.drawImage(
                                    signatureImage,
                                    signatureX.value,
                                    signatureY.value-4,
                                    signatureWidth.value,
                                    signatureHeight.value
                                );
                                // Add event listener for mouse click on the back canvas
                                canvasBack.addEventListener("click", handleMouseClick);
                                canvasBack.addEventListener("wheel", handleZoom);
                                // Draw the text elements
                                if (textContentsBack.value) {
                                    textContentsBack.value.forEach((textContent, index) => {
                                        // console.log(textContent.content)
                                        offscreenContextBack.font = `${textContent.fontSize}px ${textContent.fontFamily}`;
                                        if (index === selectedContentIndexBack.value) {
                                            //get the selected text
                                            selectedContent.value = textContent.content
                                            offscreenContextBack.fillStyle = "green"; // Apply selection style for the selected text content (green)
                                            offscreenContextBack.font = `${textContent.fontSize+0.5}px ${textContent.fontFamily}`;
                                            // Shadow properties
                                            offscreenContextBack.shadowColor = "grey";
                                            offscreenContextBack.shadowOffsetX = 1;
                                            offscreenContextBack.shadowOffsetY = 5;
                                            offscreenContextBack.shadowBlur = 3;
                                        } else {
                                            offscreenContextBack.fillStyle = "black"; // Apply regular style for non-selected text content
                                            offscreenContextBack.shadowColor = "transparent"; // Reset shadow for non-selected text
                                        }
                                        
                                        offscreenContextBack.fillText(
                                        textContent.content,
                                        textContent.x,
                                        textContent.y
                                        );
                                    });
                                }

                                
                                contextBack.clearRect(0, 0, canvasWidth, canvasHeight);
                                 // Set the scaling for the back context based on the zoomLevel
                                // contextBack.scale(zoomLevel, zoomLevel);
                                contextBack.drawImage(offscreenCanvasBack, 0, 0);
                                // Reset the scaling back to 1.0 for future redraws (back)
                                // contextBack.scale(1.0, 1.0);
                            }
                            
                        
                            // ...
                        };
                    };
                };
            }
            } catch (error) {
                console.log("no id selected")
            }
        };

        const getContentPositions = () => {
            const positions = {};

            // Add canvas size
            positions.canvas = {
                width: canvasWidth.value * 2,
                height: canvasHeight.value * 2,
            };

            // Add profile image position
            positions.profile = {
                x: profileX.value * 2,
                y: profileY.value * 2,
                width: profileWidth.value * 2,
                height: profileHeight.value * 2,
            };

            // Add signature position
            positions.signature = {
                x: signatureX.value,
                y: signatureY.value,
                width: signatureWidth.value,
                height: signatureHeight.value,
            }

            // Add text elements positions
            positions.textContents = textContents.value.map(
                (textContent, index) => ({
                    id: index,
                    content: textContent.content,
                    x: textContent.x * 2,
                    y: textContent.y * 2,
                    fontSize: textContent.fontSize * 2,
                    fontFamily:textContent.fontFamily
                })
            );

            positions.textContentsBack = textContentsBack.value.map(
                (textContentBack, index) => ({
                    id: index,
                    content: textContentBack.content,
                    x: textContentBack.x,
                    y: textContentBack.y * 2,
                    fontSize: textContentBack.fontSize * 2,
                    fontFamily: textContentBack.fontFamily
                })
            )

            positions.templates = {
                template: collegef.value,
                templateBack: collegeb.value
            }

            return positions;
        };

        const sendContentPositions = () => {
            const positions = getContentPositions();
            console.log(positions);
            axios
                .post("api/save-template", positions)
                .then((response) => {
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
                        let instance = $toast.success("Successfully updated!", {
                            position: "top-right",
                        });
                    }, 1000)
                    console.log(
                        "Content positions sent to the server successfully"
                    );
                    

                    // // Force dismiss specific toast
                    // instance.dismiss();

                    // // Dismiss all opened toast immediately
                    // $toast.clear();
                })
                .catch((error) => {
                    console.error(
                        "Failed to send content positions to the server:",
                        error
                    );
                });
        };

        const handleMouseClick = (event) => {
            const rect = canvasRef.value.getBoundingClientRect();
            const offsetX = event.clientX - rect.left;
            const offsetY = event.clientY - rect.top;

            // Check if the mouse is within the profile image
            if (
                offsetX >= profileX.value &&
                offsetX <= profileX.value + profileWidth.value &&
                offsetY >= profileY.value &&
                offsetY <= profileY.value + profileHeight.value
            ) {
                isMoving.value = true;
                isLoading.value = false
                profileWidth.value = (selectedWidth.value || 352) / 2; // Adjust the width as needed
                profileHeight.value = (selectedHeight.value || 415) / 2; // Adjust the width as needed
                // redrawCanvas()
                // const profileHeight = ref(415 / 2); // Adjust the height as needed
            }
            
            // Check if the mouse is within any text element on the front canvas
            for (let i = 0; i < textContents.value.length; i++) {
                const textContent = textContents.value[i];
                if (
                offsetX >= textContent.x &&
                offsetX <= textContent.x + 200 && // Assuming a maximum width of 200 for text elements
                offsetY >= textContent.y - textContent.fontSize &&
                offsetY <= textContent.y
                ) {
                    textContent.fontSize = selectedFontSize.value || defaultFontSize
                    // Use selectedFontFamily if available; otherwise, use the defaultFontFamily
                    textContent.fontFamily = selectedFontFamily.value || defaultFontFamily;
                    selectedContentIndex.value = i; // Set the selected content index
                    isMoving.value = false;
                    isLoading.value = false
                break;
                }
            }

            // Check if the mouse is within any text element on the back canvas
            const rectBack = canvasBackRef.value.getBoundingClientRect();
            const offsetXBack = event.clientX - rectBack.left;
            const offsetYBack = event.clientY - rectBack.top;

            // Check if the mouse is within the signature image
            if (
                offsetXBack >= signatureX.value &&
                offsetXBack <= signatureX.value + signatureWidth.value &&
                offsetYBack >= signatureY.value &&
                offsetYBack <= signatureY.value + signatureHeight.value
            ) {
                isMoving.value = true;
                isLoading.value = false
                signatureWidth.value = (selectedWidth.value || 300) / 2; // Adjust the width as needed
                signatureHeight.value = (selectedHeight.value || 150) - 15; // Adjust the width as needed
                // redrawCanvas()
                // const profileHeight = ref(415 / 2); // Adjust the height as needed
            }

            for (let b = 0; b < textContentsBack.value.length; b++) {
                const textContentBack = textContentsBack.value[b];
                if (
                offsetXBack >= textContentBack.x &&
                offsetXBack <= textContentBack.x + 200 && // Assuming a maximum width of 200 for text elements
                offsetYBack >= textContentBack.y - textContentBack.fontSize &&
                offsetYBack <= textContentBack.y
                ) {
                    textContentBack.fontSize = selectedFontSize.value || defaultFontSize
                    // Use selectedFontFamily if available; otherwise, use the defaultFontFamily
                    textContentBack.fontFamily = selectedFontFamily.value || defaultFontFamily;
                    selectedContentIndexBack.value = b; // Set the selected content index for the back canvas
                    isMoving.value = false;
                    isLoading.value = false
                    break;
                }
            }
            console.log(selectedContentIndex.value)
        };

        // ...

        const handleExportButtonClick = () => {
            sendContentPositions();
        };

        const updateCanvas = () => {
            redrawCanvas();
            requestAnimationFrame(updateCanvas);
        };

        const handleMouseDown = (event) => {
            const rect = canvasRef.value.getBoundingClientRect();
            const offsetX = event.clientX - rect.left;
            const offsetY = event.clientY - rect.top;
            // Check if the mouse is at the edge of the profile (within 5 pixels from the edge)
            // if (offsetX <= 5 || offsetY <= 5 || offsetX >= profileWidth.value - 5 || offsetY >= profileHeight.value - 5) {
            //     isResizing = true;
            // }
            // Check if the mouse is within the profile image
            if (
                offsetX >= profileX.value &&
                offsetX <= profileX.value + profileWidth.value &&
                offsetY >= profileY.value &&
                offsetY <= profileY.value + profileHeight.value
            ) {
                isDragging.value = true;
                draggedElement.value = "image";

                startX.value = offsetX;
                startY.value = offsetY;

                console.log(startX.value)
                console.log(startY.value)
            }

            // Check if the mouse is within any text element
            for (let i = 0; i < textContents.value.length; i++) {
                const textContent = textContents.value[i];
                if (
                    offsetX >= textContent.x &&
                    offsetX <= textContent.x + 200 && // Assuming a maximum width of 200 for text elements
                    offsetY >= textContent.y - textContent.fontSize &&
                    offsetY <= textContent.y
                ) {
                    isDragging.value = true;
                    draggedElement.value = i;

                    // new added
                    selectedContentIndex.value = i; // Set the selected content index

                    startX.value = offsetX;
                    startY.value = offsetY;
                    break;
                }
            }

            // Check if the mouse is within the signature image on the back canvas
            const rectBack = canvasBackRef.value.getBoundingClientRect();
            const offsetXBack = event.clientX - rectBack.left;
            const offsetYBack = event.clientY - rectBack.top;


            if (
                offsetXBack >= signatureX.value &&
                offsetXBack <= signatureX.value + signatureWidth.value &&
                offsetYBack >= signatureY.value &&
                offsetYBack <= signatureY.value + signatureHeight.value
            ) {
                isDraggingBack.value = true;
                draggedElementBack.value = "image";

                startXBack.value = offsetXBack;
                startYBack.value = offsetYBack;
            }

            // Check if the mouse is within any text element on the back canvas
            for (let i = 0; i < textContentsBack.value.length; i++) {
                const textContentBack = textContentsBack.value[i];
                if (
                    offsetXBack >= textContentBack.x &&
                    offsetXBack <= textContentBack.x + 200 && // Assuming a maximum width of 200 for text elements
                    offsetYBack >= textContentBack.y - textContentBack.fontSize &&
                    offsetYBack <= textContentBack.y
                ) {
                    isDraggingBack.value = true;
                    draggedElementBack.value = i;

                    // Set the selected content index
                    selectedContentIndexBack.value = i;

                    startXBack.value = offsetXBack;
                    startYBack.value = offsetYBack;
                    break;
                }
            }
        };

        const handleMouseMove = (event) => {
            if (isDragging.value) {
                const mouseX =
                    event.clientX -
                    canvasRef.value.getBoundingClientRect().left;
                const mouseY =
                    event.clientY - canvasRef.value.getBoundingClientRect().top;
                const diffX = mouseX - startX.value;
                const diffY = mouseY - startY.value;
                // if (isResizing) {
                //     // Calculate the new image size based on mouse position
                //     profileWidth.value = event.offsetX;
                //     profileHeight.value = event.offsetY;

                //     // drawImageOnCanvas();
                // }
                if (draggedElement.value === "image") {
                    // Update the profile image position
                    profileX.value += diffX;
                    profileY.value += diffY;
                    // activate dropdown button
                    // moving
                    isMoving.value = true
                } else if (typeof draggedElement.value === "number") {
                    // Update the text position
                    const draggedTextContent =
                        textContents.value[draggedElement.value];
                    draggedTextContent.x += diffX;
                    draggedTextContent.y += diffY;

                    // update the fontSize
                    draggedTextContent.fontSize = selectedFontSize.value || defaultFontSize
                    draggedTextContent.fontFamily = selectedFontFamily.value || defaultFontFamily

                    // Check if the text element is outside the canvas
                    const canvasWidth = canvasRef.value.width;
                    const canvasHeight = canvasRef.value.height;
                    const textWidth = 200; // Assuming a maximum width of 200 for text elements

                    if (draggedTextContent.x < 0) {
                        draggedTextContent.x = 0;
                    } else if (draggedTextContent.x + textWidth > canvasWidth) {
                        draggedTextContent.x = canvasWidth - textWidth;
                    }

                    if (draggedTextContent.y < 0) {
                        draggedTextContent.y = 0;
                    } else if (draggedTextContent.y > canvasHeight) {
                        draggedTextContent.y = canvasHeight;
                    }
                }

                startX.value = mouseX;
                startY.value = mouseY;

                // Redraw the canvas only when necessary
                if (diffX !== 0 || diffY !== 0) {
                    redrawCanvas();
                }
            }

            if (isDraggingBack.value) {
                const mouseXBack =
                    event.clientX - canvasBackRef.value.getBoundingClientRect().left;
                const mouseYBack =
                    event.clientY - canvasBackRef.value.getBoundingClientRect().top;
                const diffXBack = mouseXBack - startXBack.value;
                const diffYBack = mouseYBack - startYBack.value;

                if (draggedElementBack.value === "image") {
                    // Update the profile image position on the back canvas
                    signatureX.value += diffXBack;
                    signatureY.value += diffYBack;

                    // moving
                    isMoving.value = true
                } else if (typeof draggedElementBack.value === "number") {
                    // Update the text position on the back canvas
                    const draggedTextContentBack = textContentsBack.value[draggedElementBack.value];
                    draggedTextContentBack.x += diffXBack;
                    draggedTextContentBack.y += diffYBack;

                    // update the fontSize
                    draggedTextContentBack.fontSize = selectedFontSize.value || defaultFontSize
                    draggedTextContentBack.fontFamily = selectedFontFamily.value || defaultFontFamily

                    // Check if the text element is outside the back canvas
                    const canvasWidthBack = canvasBackRef.value.width;
                    const canvasHeightBack = canvasBackRef.value.height;
                    const textWidthBack = 200; // Assuming a maximum width of 200 for text elements

                    if (draggedTextContentBack.x < 0) {
                        draggedTextContentBack.x = 0;
                    } else if (draggedTextContentBack.x + textWidthBack > canvasWidthBack) {
                        draggedTextContentBack.x = canvasWidthBack - textWidthBack;
                    }

                    if (draggedTextContentBack.y < 0) {
                        draggedTextContentBack.y = 0;
                    } else if (draggedTextContentBack.y > canvasHeightBack) {
                        draggedTextContentBack.y = canvasHeightBack;
                    }
                }

                startXBack.value = mouseXBack;
                startYBack.value = mouseYBack;

                // Redraw the back canvas only when necessary
                if (diffXBack !== 0 || diffYBack !== 0) {
                    redrawCanvas();
                }

                
            }
        };

        const handleMouseUp = () => {
            // isResizing = false;
            isDragging.value = false;

            // // moving
            // isMoving.value = false
            draggedElement.value = null;
            // new added
            selectedContentIndex.value = null; // Clear the selected content index

            isDraggingBack.value = false;
            draggedElementBack.value = null;
            selectedContentIndexBack.value = null; // Clear the selected content index for the back canvas
        };

        const getImageTemplates = async () => {
            try {
                const response = await axios.get("/api/image-templates");
                imageTemplates.value = response.data;

                // template name
                // collegef.value = imageTemplates.value[0].template_name
                // collegeb.value = imageTemplates.value[0].template_back
                console.log(imageTemplates.value);
            } catch (error) {
                console.error(error);
            }
        };

        // Save the activeImage state to local storage whenever it changes
        watch(isActive, (newValue) => {
            localStorage.setItem('activeImage', newValue);
        });

        // hendle the clicked image
        const handleImageClick = async (src) => {
            console.log(src)
            // isActive.value = ''

            if (isActive.value === src) {
                // If the same image is clicked again, deactivate it
                isActive.value = '';
            } else {
                // Set the clicked image as active
                isActive.value = src;
            }
            
            // get template coordinates when iclicked
            getTemplateCoordinates(src)
            // collegeb.value 
            handleBack(src)
            isLoading.value = true
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
                isLoading.value = false
                
                
                // save it to local storage
                localStorage.setItem('active_id',src)
                collegef.value = src
                
                const $toast = useToast();
                let instance = $toast.success("Successfully updated!", {
                    position: "top-right",
                });
                

                
                
            }, 500)
            
            
        }

         // back id map
         const handleBack = async (src) => {
           collegeb.value = src.replace('f','b')
           localStorage.setItem("activeImageBack",collegeb.value)
            console.log(collegeb.value)
        }

        // get template contents coordinates
        const getTemplateCoordinates = async(src) => {
            try {
                const activeTemplate = {activeTemplate:src} 
                const response = await axios.get("/api/image-templates-coord", {params: activeTemplate});
                templateCoordinates.value = response.data;
                profileX.value = templateCoordinates.value[0]?.profile_x / 2 || 55 / 2
                profileY.value = templateCoordinates.value[0]?.profile_y / 2 || 87 / 2
                profileWidth.value = templateCoordinates.value[0]?.profile_w / 2 || 352 / 2
                profileHeight.value = templateCoordinates.value[0]?.profile_h / 2 || 415 / 2

                signatureX.value = templateCoordinates.value[0]?.signature_x || (240+64.02)
                signatureY.value = templateCoordinates.value[0]?.signature_y-10 || 75

                signatureWidth.value = templateCoordinates.value[0]?.signature_w || 300 / 2
                signatureHeight.value = templateCoordinates.value[0]?.signature_h || 150
                console.log(templateCoordinates.value);
                // console.log(templateCoordinates.value);
            } catch (error) {
                console.error(error);
            }
        }

        // const isActiveImage = (url) => {
        //     console.log(url)
        //     isActive.value = true;
        // //   return activeImage.value === url;
        // };

        onMounted(() => {
            getImageTemplates();
            getTemplateCoordinates(localStorage.getItem('activeImage'));
            const canvas = canvasRef.value;
            if (canvas) {
                canvas.addEventListener("mousedown", handleMouseDown);
                canvas.addEventListener("mousemove", handleMouseMove);
                canvas.addEventListener("mouseup", handleMouseUp);
                canvas.addEventListener("mouseleave", handleMouseUp);
                redrawCanvas();

                // Update canvas size after mounted
                updateCanvasSize();
            }

            const canvasBack = canvasBackRef.value;
            if (canvasBack) {
                canvasBack.addEventListener("mousedown", handleMouseDown);
                canvasBack.addEventListener("mousemove", handleMouseMove);
                canvasBack.addEventListener("mouseup", handleMouseUp);
                canvasBack.addEventListener("mouseleave", handleMouseUp);
                redrawCanvas();

                // Update canvas size after mounted
                updateCanvasSize();
            }

            updateCanvas();
        });

        // canvas for editing template

        return {
            handleExportButtonClick,
            handleZoom,
            // saveCanvasAsImage,
            canvasRef,
            canvasBackRef,
            canvasWidth: 1011,
            canvasHeight: 638,
            imageTemplates,
            getImageTemplates,
            handleImageClick,
            selectedContent,
            
            isActive,
            isMoving,
            isLoading,
            widths,widthDropdownOpen,toggleWidthDropdown,selectWidth,selectedWidth,//width
            heights,heightDropdownOpen,toggleHeightDropdown,selectHeight,selectedHeight,//height
            fontSizes,dropdownOpen,toggleDropdown ,selectFontSize, selectedFontSize, //fontsize
            fontFamilies,fontFamilyDropdownOpen,toggleFontFamilyDropdown,selectFontFamily,selectedFontFamily
        };
    },
});
</script>
<style scoped>
.canvas-con{
    border: 2px solid rgba(230, 224, 224, 0.7);;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  /* background-color: rgba(230, 224, 224, 0.4); Add a semi-transparent background for better visibility */
}
.loading-message {
    display: flex;
  justify-content: center;
  align-items: center;
  height: 40%;
  width: 50%;
  border: 2px dashed rgb(226, 217, 217);
  background-color: rgba(230, 224, 224, 0.3); /* Add a semi-transparent background for better visibility */
  box-shadow: rgba(166, 166, 172, 0.2) 0px 7px 29px 0px;
  /* word-spacing: 2px; */
}

/* Main container */
.main-container {
  width: 85%;
  margin: auto;
  margin-left: 14rem;
  padding-top: 1rem;
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
/* for image gallery */
.image-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 10px;
}

.image-item {
    position: relative;
    overflow: hidden;
}

.image-item img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.image-item:hover img {
    transform: scale(1.1);
}

.image-item:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-item:hover:before {
    opacity: 1;
}

.image-item:before {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    text-align: center;
}

.image-item:before:hover {
    cursor: pointer;
}


.image-overlay.active {
    position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(196, 187, 187, 0.7); /* Semi-transparent background */
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 1;
  transition: opacity 0.2s ease;
}

/* Adjust the active text style as needed */
.image-overlay h2 {
  font-size: 24px;
  color: #000;
  text-align: center;
}

/* Design for the generated button ID */
.generate-id-button {
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
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
/* For upload new template */

.upload-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 2rem;
  width: 78%;
  margin: auto;
  margin-top: 3rem;
}

.upload-container .form-label {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.short-input {
  width: 50%;
}

.upload_section {
  display: flex;
  flex-direction: column;
  /* align-items: center; */
  position: relative; /* Add this line */
}

.upload_container {
  margin-bottom: 2rem;
}

.upload_container label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.uploaded_files {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.uploaded_file {
  flex: 0 0 200px;
  border: 1px solid red;
}

.uploaded_file img {
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 0.5rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.uploaded_file {
    position: relative;
}

.delete-button {
    position: absolute;
    top: 5px;
    right: 5px;
}
/* Dropdown */

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
.custom-scrollbar::-webkit-scrollbar {
  display: none;
}
.dropdown-item:hover {
  background-color: #d5d0d0;
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
