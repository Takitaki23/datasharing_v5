<template>
    <div class="popup">
        <div class="popup-inner" style="width: 80%">
            <slot />
            <!-- Font size -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <!-- For font size dropdown -->
                    <div class="container mt-3">
                        <div class="dropdown">
                            <button
                                class="btn btn-secondary dropdown-toggle"
                                type="button"
                                @click="toggleDropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                Select Font Size <span class="badge text-bg-success" v-if="selectedFontSize"><b>{{ selectedFontSize }} pt</b></span>
                            </button>
                            <ul
                                class="dropdown-menu custom-scrollbar"
                                :class="{ show: dropdownOpen }"
                                aria-labelledby="dropdownMenuButton"
                                style="
                                    overflow: hidden;
                                    height: 300px;
                                    overflow: scroll;
                                "
                            >
                                <li
                                    v-for="fontSize in fontSizes"
                                    :key="fontSize"
                                >
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="selectFontSize(fontSize)"
                                        >{{ fontSize }}</a
                                    >
                                </li>
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
                            <div class="text-secondary">Font Size</div>
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
                        <!-- Font Size -->
                        <div class="dropdown">
                            <div class="text-secondary">Font Family</div>
                        </div>
                        <div class="dropdown ">
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
                        <div class="dropdown me-2">
                            <div class="btn btn-white">
                                <b class="text-secondary">|</b>
                            </div>
                        </div>
                        <div class="dropdown me-2">
                            <div class="btn btn-white">
                                <b class="text-secondary">Selected : </b>
                                <b class="text-success" v-if="selectedContent">{{ selectedContent }} </b>
                                <b class="text-success" v-else>{{ "select content" }} </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ID Canvas -->
            <div class="row" style="height: 400px; overflow: hidden">
                <!-- Content for ID preview -->
                <div class="col-sm-6">
                    <canvas
                        ref="canvasRef"
                        :width="canvasWidth"
                        :height="canvasHeight"
                    ></canvas>
                </div>
                <div class="col-md-6" style="height: 380px; overflow: hidden">
                    <canvas
                        class=""
                        ref="canvasBackRef"
                        :width="canvasWidth"
                        :height="canvasHeight"
                    ></canvas>
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
                    @click="TogglePopup()"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {ref,onMounted,computed,watch} from "vue";
// custom loader
import { useCustomLoader } from "../../../plugins/loader";
export default {
    props: ["TogglePopup", "dataId"],
    setup(props) {
        // Define a default font size
        const defaultFontSize = 21.33; // Change this value as per your requirement
        // Define the font sizes available in the dropdown
        const fontSizes = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72];

        // Define a ref for tracking the selected font size
        const selectedFontSize = ref(null);
        // Define a ref for tracking the selected font size
        const selectedFontFamily = ref(null);

        // Define a ref to track whether the dropdown is open or closed
        const dropdownOpen = ref(false);

        // Add a selectedContentIndex reactive variable
        const selectedContentIndex = ref(null);
        const selectedContentIndexBack = ref(null);
        const selectedContent = ref(null);

        const canvasRef = ref(null);
        const canvasBackRef = ref(null);
        const canvasWidth = ref(0);
        const canvasHeight = ref(0);
        // we devided by 2 to make it smaller
        let isMoving = ref(false);
        const isLoading = ref(true)
        const profileX = ref(null); // Adjust the X coordinate as needed
        const profileY = ref(null); // Adjust the Y coordinate as needed
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

        const { initializeLoader } = useCustomLoader() 

        // Function to toggle the dropdown visibility
        const toggleDropdown = () => {
        dropdownOpen.value = !dropdownOpen.value;
        };

        // Function to handle the font size selection
        const selectFontSize = (fontSize) => {
            dropdownOpen.value = false; // Close the dropdown after selection (optional)
            selectedFontSize.value = fontSize
        };

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
                    fontFamily: templateCoordinates.value[0]?.textContents_0_ff || "Helvetica-Bold",
                    colors: "rgb("+(idCoordinates.value?.rgb_color_secondary || 'black')+")" 
                },
                { content: course_s, 
                    x: (idCoordinates.value?.textContents_1_x || templateCoordinates.value[0]?.textContents_1_x || 45) / 2, 
                    y:(idCoordinates.value?.textContents_1_y || templateCoordinates.value[0]?.textContents_1_y || 590) / 2, 
                    fontSize: (templateCoordinates.value[0]?.textContents_1_fs || 25) / 2,
                    fontFamily: templateCoordinates.value[0]?.textContents_1_ff || 'Helvetica',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: last_name,
                    x: (idCoordinates.value?.textContents_2_x || templateCoordinates.value[0]?.textContents_2_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_2_y || templateCoordinates.value[0]?.textContents_2_y || 370) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_2_fs || 45) / 2,
                    fontFamily: templateCoordinates.value[0]?.textContents_2_ff || 'Helvetica-Bold',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: first_name,
                    x: (idCoordinates.value?.textContents_3_x || templateCoordinates.value[0]?.textContents_3_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_3_y || templateCoordinates.value[0]?.textContents_3_y || 420) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_3_fs || 45) / 2,
                    fontFamily: templateCoordinates.value[0]?.textContents_3_ff || 'Helvetica',
                    colors: "rgb("+(idCoordinates.value?.rgb_color_primary || 'black')+")"
                },
                {
                    content: middle_name,
                    x: (idCoordinates.value?.textContents_4_x || templateCoordinates.value[0]?.textContents_4_x || 430) / 2,
                    y: (idCoordinates.value?.textContents_4_y || templateCoordinates.value[0]?.textContents_4_y || 470) / 2,
                    fontSize: (templateCoordinates.value[0]?.textContents_4_fs || 45) / 2,
                    fontFamily: templateCoordinates.value[0]?.textContents_4_ff || 'Helvetica',
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

                        // Add event listener for mouse click on the front canvas
                        canvas.addEventListener("click", handleMouseClick);

                        if(textContents.value){
                            // Draw the text elements
                            textContents.value.forEach((textContent, index) => {
                                offscreenContext.font = `${textContent.fontSize}px ${textContent.fontFamily}`;
                                if (index === selectedContentIndex.value) {
                                    console.log(index, selectedContentIndex.value)
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
                                canvasBack.addEventListener("click", handleMouseClick);

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
                                contextBack.drawImage(offscreenCanvasBack, 0, 0);
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
                width: signatureWidth.value * 2,
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
                    fontFamily: textContent.fontFamily,
                })
            );

            positions.textContentsBack = textContentsBack.value.map(
                (textContentBack, index) => ({
                    id: index,
                    content: textContentBack.content,
                    x: textContentBack.x,
                    y: textContentBack.y * 2,
                    fontSize: textContentBack.fontSize * 2,
                    fontFamily: textContentBack.fontFamily,
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
            axios
                .post("api/previewID", positions)
                .then(async(response) => {
                    console.log(
                        "Content positions sent to the server successfully"
                    );
                    const loader = await initializeLoader('Successfully Updated!')

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
                // profileWidth.value = (selectedWidth.value || 352) / 2; // Adjust the width as needed
                // profileHeight.value = (selectedHeight.value || 415) / 2; // Adjust the width as needed
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
                    // selectedFontFamily.value = textContents.fontFamily
                    selectedFontFamily.value = textContent.fontFamily
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
                    selectedContentIndexBack.value = b; // Set the selected content index for the back canvas
                    isMoving.value = false;
                    isLoading.value = false
                    break;
                }
            }
            console.log(selectedContentIndex.value)
        };

         // get template contents coordinates
         const getTemplateCoordinates = async(src) => {
            try {
                const activeTemplate = {activeTemplate:src} 
                const response = await axios.get("/api/image-templates-coord",{params: activeTemplate});
                templateCoordinates.value = response.data;
                console.log(templateCoordinates.value)
                // profileX.value = templateCoordinates.value[0].profile_x / 2
                // profileY.value = templateCoordinates.value[0].profile_y / 2
                profileWidth.value = templateCoordinates.value[0].profile_w / 2
                profileHeight.value = templateCoordinates.value[0].profile_h / 2

                signatureWidth.value = templateCoordinates.value[0].signature_w
                signatureHeight.value = templateCoordinates.value[0].signature_h

                // template name
                collegef.value = templateCoordinates.value[0]?.template_name || '/id_template/collegef.png'
                collegeb.value = templateCoordinates.value[0]?.template_back || '/id_template/collegeb.png'
                
            } catch (error) {
                console.log(error);
            }
        }

         // get id contents coordinates in db
         const getIdCoordinates = async(st_id_no) => {
            console.log("st_id_no",props.dataId)
            try {
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

                        console.log(idCoordinates.value?.profile_x)
                        let f = await checkImageExists(st_id_no)
                        let s = await checkSignatureExists(st_id_no)
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

        const statePath = computed(async () => {
            try {
                // Add null checks for props.modalData and props.modalData.value
                if (props.dataId) {
                    // console.log('Sending request with path:', props.modalData.value);
                    const response = await axios.get(`/api/students`);
                    
                    users.value = JSON.parse(response.data);
                    console.log(users.value)
                    // map to a data
                    // console.log(users.value.data.find((item) => item.id === props.modalData.value) || null)
                    responseData.value =
                        users.value.data.find(
                            (item) => item.student_no === props.dataId
                        ) || null;
                    // console.table(responseData.value)
                    // redrawCanvas();
                    // getIdCoordinates()
                    return (modalDataValue.state = props.dataId);
                }
            } catch (error) {
                console.error(error);
            }
        });

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

            // redrawCanvas()
        });

        onMounted(() => {
            // active template
            const active_Tmp =localStorage.getItem('active_id')
            getTemplateCoordinates(active_Tmp)
            getIdCoordinates(props.dataId)
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

        return {
            handleExportButtonClick,canvasRef,canvasBackRef,canvasWidth: 1011,canvasHeight: 638,
            statePath,modalDataValue,st_id,responseData,image_src,profile,image_signature,signature,
            fontSizes,dropdownOpen,toggleDropdown ,selectFontSize, selectedFontSize, selectedContent, selectedFontFamily,  //fontsize
            selectedContent,isMoving,isLoading, 
        }
    },
};
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
    overflow-y: scroll;
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
