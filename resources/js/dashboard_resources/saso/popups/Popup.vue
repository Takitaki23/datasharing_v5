<template>
    <div class="popup">
        <div class="popup-inner" style="width: 80%;">
            {{ state }}
            <!-- allow us anycontent we write to parent  -->
            <slot />
            <div class="popup-content" :key="dataId">
                <!-- Student Info -->
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="recipient-name"
                                class="col-form-label fw-bold"
                                >Student Number:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.student_no }}</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="recipient-name"
                                class="col-form-label fw-bold"
                                >Last Name:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.last_name }}</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="recipient-name"
                                class="col-form-label fw-bold"
                                >Middle Name:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.middle_name }}</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="recipient-name"
                                class="col-form-label fw-bold"
                                >First Name:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.first_name}}</label
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label
                                    for="recipient-name"
                                    class="col-form-label fw-bold"
                                    >Course</label
                                >
                                <br />
                                <label
                                    for="recipient-name"
                                    class="col-form-label"
                                    >{{ studentData.course }}</label
                                >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label
                                    for="recipient-name"
                                    class="col-form-label fw-bold"
                                    >Type</label
                                >
                                <br />
                                <label
                                    for="recipient-name"
                                    class="col-form-label"
                                    >{{ studentData.college }}</label
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guardian's Info -->
                <h5
                    class="modal-title"
                    id="exampleModalLabel"
                    style="color: rgb(67, 155, 67)"
                >
                    Guardian's Information
                </h5>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="message-text"
                                class="col-form-label fw-bold"
                                >Guardian's Name:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.guardian_name }}</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="message-text"
                                class="col-form-labe fw-bold mt-2"
                                >Guardian's Address:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.guardian_address }}</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label
                                for="message-text"
                                class="col-form-labe fw-bold mt-2"
                                >Guardian's Contact:</label
                            >
                            <br />
                            <label for="recipient-name" class="col-form-label"
                                >{{ studentData.guardian_contact_no }}</label
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <i class="fa-solid fa-thumbtack thumbtack-icon"></i>
                            <div class="card-header">
                                <h6 class="ms-3 text-light">
                                    Identification Card Picture
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img class="text-danger"  :src="profile" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <i class="fa-solid fa-thumbtack thumbtack-icon"></i>
                            <div class="card-header">
                                <h6 class="ms-3 text-light">
                                    Identification Card Signature
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img class="text-danger" :src="signature"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="popup-close btn btn-secondary mt-3"
                @click="TogglePopup()"
            >
                Close
            </button>
        </div>
    </div>
</template>

<script>
import { onMounted, ref, watchEffect } from "vue";

// custom loader
// import { useCustomLoader } from "../../plugins/loader";
export default {
    props: ["TogglePopup", "dataId"],
    setup(props) {
        // const { TogglePopup, dataId } = props; // Destructure the props
        const studentData = ref({});
        const profile = ref(null);
        const signature = ref(null);


        // send a request for student data
        const studentDataRequest = async(studentNumber) => {
            try {
                const response = await axios.get(`/api/students`);
                const studentsData = JSON.parse(response.data);
                studentData.value =
                studentsData.data.find((item) => item.student_no === studentNumber) ||
                null;
            } catch (error) {
                console.error("Error fetching student data:", error);
            }
        }

        // const get the profile
        const getStudentProfile = async(studentNumber) => {
           try {
                const response = await axios.get(`/api/get-images`);
                console.log(response.data)
                const studentProfile = response.data.find(filename => filename === `${studentNumber}.png`) || "man.png";
                profile.value = `/id_image/${studentProfile}`
                // signature

            } catch (error) {
                console.error("Error fetching student data:", error);
           }
        }
        // const get the signature
        const getStudentSignature = async(studentNumber) => {
            try {
                const response = await axios.get(`/api/get-signatures`);
                console.log(response.data)
                const studentProfile = response.data.find(filename => filename === `${studentNumber}.png`) || "default.png";
                signature.value = `/id_signatures/${studentProfile}`
            } catch (error) {
                console.error("Error fetching student data:", error);
           }
        }

        // load when popup loaded
        onMounted(async () => {
            // call the request to begins
            studentDataRequest(props.dataId)
            // call the profile fetching
            getStudentProfile(props.dataId)
            // call the signature fetching
            getStudentSignature(props.dataId)
           
        });


        return {studentData, profile,signature};
    },
};
</script>

<!-- <script>
// import { useToast } from "vue-toastification";
import axios from "axios";
import {ref,onMounted,getCurrentInstance,computed,watch} from "vue";
// import collegef from "../../images/collegef.png";
// import collegeb from "../../images/collegeb.png";
import profile from "../../images/man.png";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
import {useRouter} from 'vue-router'
// import 'vue-toast-notification/dist/theme-default.css';
// import { ref, computed, reactive } from 'vue';


export default {
    props: ["modalData", "dataId","initProfile","TogglePopup"],
    name: "IdCardGenerator",
    setup(props) {
        const router = useRouter();
        //  Get toast interface
        // const toast = useToast();
        let modalDataValue = ref({
            state: "",
        });
        const responseData = ref({});
        let st_id = ref(null);
        const users = ref([]);

        // accessing public folder in laravel
        const image_src = ref("/id_template/jhsf.png");
        const image_signature = ref("/id_signatures/default.png");
        let signature = ref('/id_signatures/default.png')
        let profile = ref(null)
        // template coordinates
        const templateCoordinates = ref([]);
        // student id coordinates
        const idCoordinates = ref([]);
        const collegef = ref(null)
        const collegeb = ref(null)

        const reInit = ref(props.initProfile)
        // return the id
        const statePath = computed(async () => {
            try {
                // Add null checks for props.modalData and props.modalData.value
                if (props.modalData && props.modalData.value || props.initProfile) {
                    console.log('Sending request with path:', props.modalData.value);
                    const response = await axios.get(`/api/students`);
                    users.value = JSON.parse(response.data);
                    // map to a data
                    // console.log(users.value.data.find((item) => item.id === props.modalData.value) || null)
                    responseData.value =
                        users.value.data.find(
                            (item) => item.id === props.modalData.value
                        ) || null;
                    // console.table(responseData.value)
                    redrawCanvas();
                    // getIdCoordinates()
                    return (modalDataValue.state = props.modalData);
                }
            } catch (error) {
                console.error(error);
            }
        });

        watch(
            () => props.modalData,
            (newModalData) => {
                modalDataValue.value = newModalData;
                console.log(modalDataValue.value)
            }
           
        );

        watch(
            () => props.initProfile,
            (initializeProfile) => {
                console.log(initializeProfile)
                // window.location.reload()
                // console.log(router)
                // router.back(-1)
            }
        );

        

        // Create a hidden canvas for double buffering
        const hiddenCanvas = document.createElement("canvas");
        const hiddenContext = hiddenCanvas.getContext("2d");

        // Add a selectedContentIndex reactive variable
        const selectedContentIndex = ref(null);
        const selectedContentIndexBack = ref(null);

        const instance = getCurrentInstance();
        const canvasRef = ref(null);
        const canvasBackRef = ref(null);
        const canvasWidth = ref(0);
        const canvasHeight = ref(0);
        // we devided by 2 to make it smaller
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
        const fontSizes = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72];

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
        // Define a ref for tracking the selected font size
        const selectedFontSize = ref(null);
        // Define a ref for tracking the selected font family from the dropdown
        const selectedFontFamily = ref(null);

        // Define a ref to track whether the dropdown is open or closed
        const dropdownOpen = ref(false);
        // Define a ref to track whether the font family dropdown is open or closed
        const fontFamilyDropdownOpen = ref(false);

        // Function to toggle the dropdown visibility
        const toggleDropdown = () => {
        dropdownOpen.value = !dropdownOpen.value;
        };
        // Function to toggle the font family dropdown visibility
        const toggleFontFamilyDropdown = () => {
        fontFamilyDropdownOpen.value = !fontFamilyDropdownOpen.value;
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
            selectedFontSize.value = fontSize
        };
        // Function to handle the font family selection
        const selectFontFamily = (fontFamily) => {
            selectedFontFamily.value = fontFamily;
            // Close the font family dropdown after selection (optional)
            toggleFontFamilyDropdown(false);
        };

        watch(statePath, () => {
            console.log(statePath);
            redrawCanvas();
        });

        // Use a watch property to trigger getIdCoordinates when responseData.value.student_no changes
        watch(() => responseData.value.student_no, (newStudentNo) => {
            console.log(newStudentNo)
            profile.value = '/id_image/man.png'
            getIdCoordinates(newStudentNo);
            // get active templates from local storage
            const act_Tmp = localStorage.getItem('active_id')
            getTemplateCoordinates(act_Tmp);
        });

        const textContents = computed(() => {
            console.log(responseData.value);
            // getIdCoordinates(responseData.value.student_no)
            
            const st_id_s = responseData.value.student_no
                ? responseData.value.student_no
                : "12-3456";

            const course_s = responseData.value.course
                ? responseData.value.course
                : "BS. INFORMATION TECHNOLOGY";
            const last_name = responseData.value.last_name
                ? responseData.value.last_name
                : "DOE";
            const first_name = responseData.value.first_name
                ? responseData.value.first_name
                : "JOHN";
            const middle_name = responseData.value.middle_name
                ? responseData.value.middle_name
                : "SMITH";
            // we devided by 2 to make it smaller
            return [
                { content: st_id_s, 
                    x: (idCoordinates.value?.textContents_0_x || templateCoordinates.value[0]?.textContents_0_x || 280) / 2, 
                    y: (idCoordinates.value?.textContents_0_y || templateCoordinates.value[0]?.textContents_0_y || 550) / 2, 
                    fontSize: (templateCoordinates.value[0]?.textContents_0_fs || 35) / 2,
                    fonts: templateCoordinates.value[0]?.textContents_0_ff || "Helvetica-Bold",
                    colors: "rgb("+(idCoordinates.value?.rgb_color_secondary || 'black')+")" 
                },
                { content: course_s, 
                    x: (idCoordinates.value?.textContents_1_x || templateCoordinates.value[0]?.textContents_1_x || 45) / 2, 
                    y:(idCoordinates.value?.textContents_1_y || templateCoordinates.value[0]?.textContents_1_y || 590) / 2, 
                    fontSize: (templateCoordinates.value[0]?.textContents_1_fs || 25) / 2,
                    fonts: templateCoordinates.value[0]?.textContents_1_ff || 'Helvetica',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: last_name,
                    x: (idCoordinates.value?.textContents_2_x || templateCoordinates.value[0]?.textContents_2_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_2_y || templateCoordinates.value[0]?.textContents_2_y || 370) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_2_fs || 45) / 2,
                    fonts: templateCoordinates.value[0]?.textContents_2_ff || 'Helvetica-Bold',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: first_name,
                    x: (idCoordinates.value?.textContents_3_x || templateCoordinates.value[0]?.textContents_3_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_3_y || templateCoordinates.value[0]?.textContents_3_y || 420) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_3_fs || 45) / 2,
                    fonts: templateCoordinates.value[0]?.textContents_3_ff || 'Helvetica',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: middle_name,
                    x: (idCoordinates.value?.textContents_4_x || templateCoordinates.value[0]?.textContents_4_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_4_y || templateCoordinates.value[0]?.textContents_4_y || 470) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_4_fs || 45) / 2,
                    fonts: templateCoordinates.value[0]?.textContents_4_ff || 'Helvetica',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
            ];
        });

        // for back contents
        const textContentsBack = computed(()=>{
            const ecp = responseData.value.guardian_name ? responseData.value.guardian_name : "CONTACT PERSON";
            const address1 = responseData.value.guardian_address ? responseData.value.guardian_address : "#354 QUEZON ST. SAN JOSE BALANGA"
            // const barangay = "SAN JOSE"
            // const address2 = "BALANGA BATAAN"
            // const province = "BATAAN"
            const ecpc = responseData.value.guardian_contact_no ? responseData.value.guardian_contact_no :"09345678986"
            const semester = "2nd Semester AY 2023 - 2024"
            return [
                {
                    content: ecp, 
                    x:idCoordinates.value?.textContentsBack_0_x || templateCoordinates.value[0]?.textContentsBack_0_x || 310, 
                    y:(idCoordinates.value?.textContentsBack_0_y || templateCoordinates.value[0]?.textContentsBack_0_y || 120) / 2,
                    fontFamily:(templateCoordinates.value[0]?.textContentsBack_0_ff || "Helvetica"),
                    fontSize:(templateCoordinates.value[0]?.textContentsBack_0_fs || 30)/2},
                {
                    content: address1, 
                    x:(idCoordinates.value?.textContentsBack_1_x || templateCoordinates.value[0]?.textContentsBack_1_x || 280),
                    y:(idCoordinates.value?.textContentsBack_1_y || templateCoordinates.value[0]?.textContentsBack_1_y ||160)/2,
                    fontFamily:(templateCoordinates.value[0]?.textContentsBack_1_ff || "Helvetica"),
                    fontSize:(templateCoordinates.value[0]?.textContentsBack_1_fs ||22)/2},
                // {content: barangay, x:255,y:0,fontSize:25},
                // {content: address2, x:255,y:122,fontSize:25/2},
                // {content: province, x:0,y:0,fontSize:0},
                {
                    content: ecpc, 
                    x:(idCoordinates.value?.textContentsBack_2_x || templateCoordinates.value[0]?.textContentsBack_2_x ||340),
                    y:(idCoordinates.value?.textContentsBack_2_y || templateCoordinates.value[0]?.textContentsBack_2_y ||200)/2,
                    fontFamily:(templateCoordinates.value[0]?.textContentsBack_2_ff || "Helvetica"),
                    fontSize:(templateCoordinates.value[0]?.textContentsBack_2_fs ||25)/2},
                {
                    content: semester, 
                    x:(idCoordinates.value?.textContentsBack_3_x || templateCoordinates.value[0]?.textContentsBack_3_x ||35),
                    y:(idCoordinates.value?.textContentsBack_3_y || templateCoordinates.value[0]?.textContentsBack_3_y || 500)/2,
                    fontFamily:(templateCoordinates.value[0]?.textContentsBack_3_ff || "Helvetica"),
                    fontSize:(templateCoordinates.value[0]?.textContentsBack_3_fs ||30)/2},
            ]
        })

        const saveImageToLocal = (imageData) => {
            localStorage.setItem("generatedImage", imageData);
            console.log("Image saved to local storage");
        };

        const displayImage = (imageData) => {
            const imageContainer = document.getElementById("imageContainer");

            const imageElement = document.createElement("img");
            imageElement.src = imageData;

            imageContainer.appendChild(imageElement);
        };

        const updateCanvasSize = () => {
            const canvas = canvasRef.value;
            const canvasBack = canvasBackRef.value;
            if (canvas && canvasBack) {
                // we devided by 2 to make it smaller
                canvasWidth.value = canvas.width / 2;
                canvasHeight.value = canvas.height / 2;
            }
        };
        // new redraw
        const redrawCanvas = () => {
            const canvas = canvasRef.value;
            const canvasBack = canvasBackRef.value;
            if (canvas && canvasBack) {
                const context = canvas.getContext("2d");
                const contextBack = canvasBack.getContext("2d");
                // we devided by 2 to make it smaller
                const canvasWidth = canvas.width / 2;
                const canvasHeight = canvas.height / 2;
                // back
                const offscreenCanvas = document.createElement("canvas");
                const offscreenContext = offscreenCanvas.getContext("2d");

                // back
                const offscreenCanvasBack = document.createElement("canvas");
                const offscreenContextBack = offscreenCanvas.getContext("2d");
                
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

                // draw the back
                const backTemplateImage = new Image();

                // Draw the template image
                const templateImage = new Image();
                templateImage.src = collegef.value;

                templateImage.onload = () => {
                    const templateAspectRatio =
                        templateImage.width / templateImage.height;
                    const canvasAspectRatio = canvasWidth / canvasHeight;

                    let drawWidth, drawHeight;
                    let offsetX = 0,
                        offsetY = 0;

                    if (templateAspectRatio > canvasAspectRatio) {
                        // Template image is wider than the canvas
                        drawWidth = canvasWidth;
                        drawHeight = drawWidth / templateAspectRatio;
                        offsetY = (canvasHeight - drawHeight) / 2;
                    } else {
                        // Template image is taller than the canvas
                        drawHeight = canvasHeight;
                        drawWidth = drawHeight * templateAspectRatio;
                        offsetX = (canvasWidth - drawWidth) / 2;
                    }

                    // Draw the template image on the offscreen canvas
                    offscreenContext.drawImage(
                        templateImage,
                        offsetX,
                        offsetY,
                        drawWidth,
                        drawHeight
                    );

                    if(profile.value){
                        // Draw the profile image
                    const profileImage = new Image();
                    profileImage.src = profile.value;
                    profileImage.onload = () => {
                        offscreenContext.drawImage(
                            profileImage,
                            profileX.value,
                            profileY.value,
                            profileWidth.value,
                            profileHeight.value
                        );

                        // Draw the text elements
                        textContents.value.forEach((textContent, index) => {
                            offscreenContext.font = `${textContent.fontSize}px ${textContent.fonts}`;
                            offscreenContext.fillStyle = textContent.colors;
                            offscreenContext.fillText(
                                textContent.content,
                                textContent.x,
                                textContent.y
                            );
                        });

                        // Copy the offscreen canvas to the visible canvas
                        context.clearRect(0, 0, canvasWidth, canvasHeight);
                        context.drawImage(offscreenCanvas, 0, 0);

                        backTemplateImage.src = collegeb.value
                        backTemplateImage.onload = () => {
                            const backTemplateAspectRatio = backTemplateImage.width / backTemplateImage.height;
                            const canvasAspectRatio = canvasWidth / canvasHeight;

                            let backDrawWidth, backDrawHeight;
                            let backOffsetX = 0, backOffsetY = 0;

                            if (backTemplateAspectRatio > canvasAspectRatio) {
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
                                    signatureY.value,
                                    signatureWidth.value,
                                    signatureHeight.value
                                );

                                // Draw the text elements
                                if (textContentsBack.value) {
                                    textContentsBack.value.forEach((textContent, index) => {
                                        // console.log(textContent.content)
                                        offscreenContextBack.font = `${textContent.fontSize}px ${textContent.fontFamily}`;
                                        contextBack.fillStyle = "black"; // Apply selection style
                                        offscreenContextBack.fillText(
                                        textContent.content,
                                        textContent.x,
                                        textContent.y
                                        );
                                    });
                                }
                                contextBack.clearRect(0, 0, canvasWidth, canvasHeight);
                                contextBack.drawImage(offscreenCanvas, 0, 0);
                            }
                            
                        
                            // ...
                        };
                    };
                    }
                };
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
                profile: profile.value,
                x: profileX.value * 2,
                y: profileY.value * 2,
                width: profileWidth.value * 2,
                height: profileHeight.value * 2,
            };

            // Add signature position
            positions.signature = {
                signature: signature.value,
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
                })
            );

            positions.textContentsBack = textContentsBack.value.map(
                (textContentBack, index) => ({
                    id: index,
                    content: textContentBack.content,
                    x: textContentBack.x,
                    y: textContentBack.y * 2,
                    fontSize: textContentBack.fontSize * 2,
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
                .post("api/previewID", positions)
                .then((response) => {
                    console.log(
                        "Content positions sent to the server successfully"
                    );
                    const $toast = useToast();
                    let instance = $toast.success("Successfully updated!", {
                        position: "top-right",
                    });

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

        // ...

        const handleExportButtonClick = () => {
            sendContentPositions();
        };

        const updateCanvas = () => {
            redrawCanvas();
            requestAnimationFrame(updateCanvas);
        };

        const handleMouseDown = (event) => {
            // front
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
                isDragging.value = true;
                draggedElement.value = "image";

                startX.value = offsetX;
                startY.value = offsetY;
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

                if (draggedElement.value === "image") {
                    // Update the profile image position
                    profileX.value += diffX;
                    profileY.value += diffY;
                } else if (typeof draggedElement.value === "number") {
                    // Update the text position
                    const draggedTextContent =
                        textContents.value[draggedElement.value];
                    draggedTextContent.x += diffX;
                    draggedTextContent.y += diffY;

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
                } else if (typeof draggedElementBack.value === "number") {
                    // Update the text position on the back canvas
                    const draggedTextContentBack = textContentsBack.value[draggedElementBack.value];
                    draggedTextContentBack.x += diffXBack;
                    draggedTextContentBack.y += diffYBack;

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
            isDragging.value = false;
            draggedElement.value = null;
            // new added
            selectedContentIndex.value = null; // Clear the selected content index

            isDraggingBack.value = false;
            draggedElementBack.value = null;
            selectedContentIndexBack.value = null; // Clear the selected content index for the back canvas
        };

         // get template contents coordinates
         const getTemplateCoordinates = async(src) => {
            try {
                const activeTemplate = {activeTemplate:src} 
                const response = await axios.get("/api/image-templates-coord",{params: activeTemplate});
                templateCoordinates.value = response.data;
                profileX.value = templateCoordinates.value[0].profile_x / 2
                profileY.value = templateCoordinates.value[0].profile_y / 2
                profileWidth.value = templateCoordinates.value[0].profile_w / 2
                profileHeight.value = templateCoordinates.value[0].profile_h / 2

                // template name
                collegef.value = templateCoordinates.value[0]?.template_name || '/id_template/collegef.png'
                collegeb.value = templateCoordinates.value[0]?.template_back || '/id_template/collegeb.png'
                
                console.log(templateCoordinates.value);
            } catch (error) {
                console.log(error);
            }
        }

        // get id contents coordinates in db
        const getIdCoordinates = async(st_id_no) => {
            try {
                // let st_id_no = responseData.value.student_no? responseData.value.student_no: ""
                console.log(st_id_no)
                if(st_id_no){
                    const response = await axios
                    .post("/api/get-generated-id",{st_id_no})
                    .then(async(res)=>{
                        console.log(res.data)
                        idCoordinates.value = res.data

                        signatureX.value = idCoordinates.value?.signature_x || templateCoordinates.value[0]?.signature_x || (240+64.02)
                        signatureY.value = idCoordinates.value?.signature_y || templateCoordinates.value[0]?.signature_y -15 || 75

                        profileX.value = idCoordinates.value?.profile_x / 2 || templateCoordinates.value[0]?.profile_x / 2 || 55 / 2
                        profileY.value = idCoordinates.value?.profile_y / 2 || templateCoordinates.value[0]?.profile_y / 2 || 87 / 2

                        // if (st_id_no) {
                        //     profile.value = `/id_image/${st_id_no}.png`;
                        // } 
                        let f = await checkImageExists(st_id_no)
                        let s = await checkSignatureExists(st_id_no)
                        console.log(f)
                        console.log(idCoordinates.value)
                    })
                    .catch((err)=>{
                        console.log(err)
                    })
                    //templateCoordinates.value = response.data;
                }
                
            } catch (error) {
                console.error(error);
            }
        }

        // check if image found on public folder
        const checkImageExists = async (st_no) => {
            try {
                const response = await axios
                    .get('/api/get-images')
                    .then((res)=>{
                        // console.log(res.data)
                        // Find the filename "23-002.png" or fallback to "man.png" if not found
                        const desiredFilename = res.data.find(filename => filename === `${st_no}.png`) || "man.png";
                        profile.value = `/id_image/${desiredFilename}`;
                        console.log(desiredFilename);  // Output: "23-002.png"
                    })
                    .catch((err)=>{
                        console.log(err)
                    })
            } catch (error) {
                return false;
            }
        }
        // check if signature found on public folder
        const checkSignatureExists = async (st_no) => {
            try {
                const response = await axios
                    .get('/api/get-signatures')
                    .then((res)=>{
                        // console.log(res.data)
                        // Find the filename "23-002.png" or fallback to "man.png" if not found
                        const desiredFilename = res.data.find(filename => filename === `${st_no}.png`) || "default.png";
                        signature.value = `/id_signatures/${desiredFilename}`;
                        console.log(desiredFilename);  // Output: "23-002.png"
                    })
                    .catch((err)=>{
                        console.log(err)
                    })
            } catch (error) {
                return false;
            }
        }

        onMounted(() => {
            // active template
            const active_Tmp =localStorage.getItem('active_id')
            console.log('djkwajdkwa')
            getTemplateCoordinates(active_Tmp)
            // getIdCoordinates()
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

        const saveCanvasAsImage = () => {
            const canvas = canvasRef.value;
            if (canvas) {
                // Create a data URL of the canvas content
                const imageData = canvas.toDataURL("image/png");

                // Create a link element
                const link = document.createElement("a");
                link.href = imageData;
                link.download = "id_card.png";

                // Programmatically trigger a click event on the link
                link.click();
            }
        };

        return {
            handleExportButtonClick,
            saveCanvasAsImage,
            canvasRef,
            canvasBackRef,
            canvasWidth: 1011,
            canvasHeight: 638,
            statePath,
            modalDataValue,
            st_id,
            reInit,
            responseData,
            image_src,
            profile,
            image_signature,
            signature,
            fontSizes,dropdownOpen,toggleDropdown ,selectFontSize,  //fontsize
            fontFamilies,fontFamilyDropdownOpen,toggleFontFamilyDropdown,selectFontFamily,selectedFontFamily
        };
    },
};
</script> -->

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

.popup-close {
  /* Add this style to align the button to the right */
  float: right;
}
</style>
