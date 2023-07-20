<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="addModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Add Student Information
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body" :key="statePath">
                        <!-- image display from public folder -->
                        <!-- its working -->
                        <!-- <img :src="image_src"> -->
                        <!-- {{ statePath }} -->
                        <!-- Student Info -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label
                                        for="recipient-name"
                                        class="col-form-label fw-bold"
                                        >Student Number:</label
                                    >
                                    <br />
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{ responseData.student_no }}</label
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
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{ responseData.last_name }}</label
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label
                                        for="message-text"
                                        class="col-form-label fw-bold"
                                        >Middle Name:</label
                                    >
                                    <br />
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{ responseData.middle_name }}</label
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label
                                        for="message-text"
                                        class="col-form-label fw-bold"
                                        >First Name:</label
                                    >
                                    <br />
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{ responseData.first_name }}</label
                                    >
                                </div>
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
                                        >{{ responseData.course }}</label
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
                                        >{{ responseData.college }}</label
                                    >
                                </div>
                            </div>
                        </div>
                        <!-- Guardian's Info -->
                        <h5 class="modal-title" id="exampleModalLabel">
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
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{ responseData.guardian_name }}</label
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label
                                        for="message-text"
                                        class="col-form-labe fw-bold"
                                        >Guardian's Address:</label
                                    >
                                    <br />
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{
                                            responseData.guardian_address
                                        }}</label
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label
                                        for="message-text"
                                        class="col-form-label fw-bold"
                                        >Guardian's Contact:</label
                                    >
                                    <br />
                                    <label
                                        for="recipient-name"
                                        class="col-form-label"
                                        >{{
                                            responseData.guardian_contact_no
                                        }}</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <i
                                        class="fa-solid fa-thumbtack thumbtack-icon"
                                    ></i>
                                    <div class="card-header">
                                        <h6 class="ms-3 text-light">
                                            Identification Card Picture
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <div
                                            class="d-flex justify-content-center"
                                            
                                        >
                                            <img
                                                :key="stateInit"
                                                :src="capturedImage"
                                                alt=""
                                                style="
                                                    background-color: white;
                                                    width: 150px;
                                                    height: 150px;
                                                "
                                            />
                                        </div>
                                        <div class="mt-3">
                                            <button
                                                class="btn btn-success w-100 mb-3"
                                            >
                                                <i
                                                    class="fa-solid fa-upload me-2"
                                                ></i
                                                >Upload Picture
                                            </button>
                                            <button
                                                class="btn btn-success w-100 mb-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#cameraModal"
                                            >
                                                <i
                                                    class="fa-solid fa-camera me-2"
                                                ></i
                                                >Use Camera
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <i
                                        class="fa-solid fa-thumbtack thumbtack-icon"
                                    ></i>
                                    <div class="card-header">
                                        <h6 class="ms-3 text-light">
                                            Identification Card Signature
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <div
                                            class="d-flex justify-content-center"
                                            :key="stateInit"
                                        >
                                            <img
                                                :src="signatureImage"
                                                alt=""
                                                style="
                                                    background-color: white;
                                                    width: 150px;
                                                    height: 150px;
                                                "
                                            />
                                        </div>
                                        <div class="mt-3">
                                            <button
                                                class="btn btn-success w-100 mb-3"
                                                type="file"
                                            >
                                                <i
                                                    class="fa-solid fa-upload me-2"
                                                ></i
                                                >Upload Signature
                                            </button>
                                            <button
                                                class="btn btn-success w-100 mb-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#signatureModal"
                                            >
                                                <i
                                                    class="fa-solid fa-signature me-2"
                                                ></i
                                                >Signature Pad
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- camera modal -->
    <div
        class="modal fade"
        id="cameraModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Capture Profile
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body col-md-12">
                    <!-- Student Profile -->
                    <div class="container row">
                        <video ref="video" autoplay class="col-sm-6">
                            Stream unavailable
                        </video>

                        <div class="col-sm-6">
                            <div class="card border-0 image-container">
                                <img
                                    :src="capturedImage"
                                    alt=""
                                    class="centered-image"
                                    id="capture-img"
                                />
                                <!-- <Editor :canvasWidth="canvasWidth" :canvasHeight="canvasHeight" ref="editor" editorId="canvasId"/> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                            <video ref="video" autoplay>Stream unavailable</video>
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-primary text-center"
                        @click="captureImage()"
                    >
                        <i class="fa-solid fa-id-card"></i> Capture
                    </button>

                    <button
                        class="btn btn-secondary text-center"
                        @click="saveCroppedImage"
                    >
                        <i class="fa-solid fa-id-card"></i> Save
                    </button>
                </div>
            </div>
        </div>
        <!-- Display Captured Image -->
        <!-- <img :src="capturedImage" alt="" style="background-color: white; width: 150px; height: 150px;"> -->
    </div>
    <!-- camera modal -->
    <div
        class="modal fade"
        id="signatureModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Write your Signature
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body col-md-12">
                    <!-- Student Profile -->
                    <div class="conatiner row">
                        <div class="col-sm-6">
                            <!-- :w="'1280px'" :h="'400px'" -->
                            <Vue3Signature  ref="signature1" :sigOption="state.option" :w="'500px'" :h="'300px'"
                            :disabled="state.disabled" class="signature border"></Vue3Signature>
                            <!-- <button @click="save('image/jpeg')">Save</button> -->
                            <!-- <button @click="clear">Clear</button> -->
                            <!-- <button @click="undo">Undo</button> -->
                            <!-- <button @click="addWaterMark">addWaterMark</button> -->
                            <!-- <button @click="fromDataURL">fromDataURL</button> -->
                            <!-- <button @click="handleDisabled">disabled</button> -->
                        </div>

                        <div class="col-sm-6">
                            <div class="card border-0 image-container">
                                <img
                                    :src="signatureImage"
                                    alt=""
                                    class="centered-image"
                                    id="capture-img"
                                />
                                <!-- <Editor :canvasWidth="canvasWidth" :canvasHeight="canvasHeight" ref="editor" editorId="canvasId"/> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                            <video ref="video" autoplay>Stream unavailable</video>
                        </div> -->
                </div>
                <div class="modal-footer">
            
                    <button
                        class="btn btn-primary text-center"
                        @click="clear"
                    >
                        <i class="fa-solid fa-eraser"></i> Clear
                    </button>
                    <button
                        class="btn btn-secondary text-center"
                        @click="undo"
                    >
                        <i class="fas fa-undo"></i> Undo
                    </button>
                    <button
                        class="btn btn-success text-center"
                        @click="save('image/jpeg')"
                    >
                        <i class="fa-solid fa-id-card"></i> Save
                    </button>
                    <!-- <button
                        class="btn btn-secondary text-center"
                        @click="saveCroppedImage"
                    >
                        <i class="fa-solid fa-id-card"></i> Save
                    </button> -->
                </div>
            </div>
        </div>
        <!-- Display Captured Image -->
        <!-- <img :src="capturedImage" alt="" style="background-color: white; width: 150px; height: 150px;"> -->
    </div>

    <!-- components recieved props -->
    <InitComponents :initProfile="stateInit" />
</template>

<script>
import { ref, onMounted, onUnmounted, computed, watch, reactive } from "vue";
import "cropperjs/dist/cropper.css";
import Cropper from "cropperjs";
import axios from "axios";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

import InitComponents from './ViewStudentInformation.vue'
// import Vue3Signature from "vue3-signature"
let cropper = null

export default {
    components:{InitComponents},
    props: ["modalData", "dataId", "addModalVisible"],
    setup(props) {
        const video = ref(null);
        let mediaStream = null;
        // accessing public folder in laravel
        const capturedImage = ref("/id_image/1685325544.png"); // Initialize the captured image URL
        const profileImage = ref('')
        const signatureImage = ref('')
        // accessing public folder in laravel
        const image_src = ref("/id_template/jhsf.png");
        const responseData = ref({});
        const stateI = ref(0);
        const stateInit = ref(0);
        let modalDataValue = ref({
            state: "",
        });
        const users = ref([]);

        // for signature
        const state = reactive({
            count: 0,
            option: {
                penColor: "rgb(0, 0, 0)",
                backgroundColor: "rgb(255,255,255)"
            },
            disabled: false
        })

        const signature1 = ref(null)

        const save = (t) => {
            signatureImage.value = signature1.value.save(t)

            // Create an image element
            const image = new Image();
            // Set the base64-encoded data as the image source
            image.src = signatureImage.value;

            // Wait for the image to load
            image.onload = () => {
                // Create a new canvas with the desired dimensions
                const targetCanvas = document.createElement("canvas");
                const targetContext = targetCanvas.getContext("2d");
                targetCanvas.width = 220;
                targetCanvas.height = 240;
                
                // Draw the image onto the target canvas
                targetContext.drawImage(
                image,
                0,
                0,
                targetCanvas.width,
                targetCanvas.height
                );

            // Convert the resized canvas to a blob
            targetCanvas.toBlob((blob) => {
                        const formData = new FormData();
                        formData.append(
                            "signatureImage",
                            blob,
                            `${responseData.value.student_no}.png`
                        );

                        // Send the resized image to the Laravel API endpoint
                        axios
                            .post("/api/save-signature-image", formData, {
                                headers: {
                                    "Content-Type": "multipart/form-data",
                                },
                            })
                            .then((response) => {
                                // Handle the response from the server
                                console.log(response.data);
                                const $toast = useToast();
                                let instance = $toast.success(response.data.message, { position: 'bottom-right' });
                            })
                            .catch((error) => {
                                // Handle any errors
                                console.error(error);
                            });
                    }, "image/png");


            console.log(signature1.value.save(t))
            }
        }

        const clear = () => {
            // signatureImage.value.clear()
            signature1.value.clear()
        }

        const undo = () => {
        
         signature1.value.undo();
        }

        const addWaterMark = () => {
            signature1.value.addWaterMark({
                text: "This signature is belongs to eastwoodians!",          // watermark text, > default ''
                font: "20px Arial",         // mark font, > default '20px sans-serif'
                style: 'all',               // fillText and strokeText,  'all'/'stroke'/'fill', > default 'fill
                fillStyle: "red",           // fillcolor, > default '#333'
                strokeStyle: "blue",	       // strokecolor, > default '#333'
                x: 100,                     // fill positionX, > default 20
                y: 200,                     // fill positionY, > default 20
                sx: 100,                    // stroke positionX, > default 40
                sy: 200                     // stroke positionY, > default 40
            });
        }

        const fromDataURL = (url) => {
            signature1.value.fromDataURL("https://avatars2.githubusercontent.com/u/17644818?s=460&v=4");
        }

        const handleDisabled = () => {
            state.disabled = !state.disabled
        }

        
        const statePath = computed(async () => {
            try {
                // Add null checks for props.modalData and props.modalData.value
                if (props.modalData && props.modalData.value) {
                    console.log(props.addModalVisible);
                    console.log(
                        "Sending request with path:",
                        props.modalData.value
                    );
                    // send request to a json file
                    const response = await axios.get(`/api/students`);
                    users.value = JSON.parse(response.data);
                    // map to a data
                    console.log(
                        users.value.data.find(
                            (item) => item.id === props.modalData.value
                        ) || null
                    );
                    responseData.value =
                        users.value.data.find(
                            (item) => item.id === props.modalData.value
                        ) || null;

                    // initialize profile
                    profileImage.value = `/id_image/${responseData.value.student_no}.png` 
                    capturedImage.value = `/id_image/${responseData.value.student_no}.png`

                    signatureImage.value = `/id_signatures/${responseData.value.student_no}.png`
                    // Replace the image within the existing Cropper instance
                    cropper.replace(capturedImage.value);
                    
                    return (modalDataValue.state = props.modalData);
                }
            } catch (error) {
                console.log(error);
            }
            // return modalDataValue.state = props.modalData

            return null;
        });

        watch(
            () => props.modalData,
            (newModalData) => {
                modalDataValue.value = newModalData;
            }
        );
        // watch the modal
        // watch(() => props.modalShow, (newModalData) => {
        //   showModal.value = newModalData;
        // });

        onMounted(async () => {
            // Listen to the modal shown and hidden events
            const cameraModal = document.getElementById("cameraModal");
            cameraModal.addEventListener("shown.bs.modal", startCapture);
            cameraModal.addEventListener("hidden.bs.modal", stopCapture);
        });

        onUnmounted(() => {
            // // Cleanup: remove event listeners and stop camera
            // const cameraModal = document.getElementById("cameraModal");
            // cameraModal.removeEventListener("shown.bs.modal", startCapture);
            // cameraModal.removeEventListener("hide.bs.modal", stopCapture);
            // stopCapture();
            // Cleanup: remove event listeners and stop camera
            const cameraModal = document.getElementById("cameraModal");
            if (cameraModal) {
                cameraModal.removeEventListener("shown.bs.modal", startCapture);
                cameraModal.removeEventListener("hide.bs.modal", stopCapture);
                stopCapture();
            }
        });

        // Start the camera when the camera modal is shown
        const startCapture = () => {
            navigator.mediaDevices
                .getUserMedia({ video: true, audio: false })
                .then((stream) => {
                    video.value.srcObject = stream;
                    mediaStream = stream;
                })
                .catch((err) => {
                    console.log(err);
                });
        };

        const stopCapture = () => {
            if (mediaStream) {
                mediaStream.getTracks().forEach((track) => {
                    track.stop();
                });
                mediaStream = null;
            }
        };

        const captureImage = () => {
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");
            canvas.width = video.value.videoWidth;
            canvas.height = video.value.videoHeight;
            context.drawImage(video.value, 0, 0, canvas.width, canvas.height);
            const imageSrc = canvas.toDataURL("image/jpeg");

            // Update the capturedImage data property
            capturedImage.value = imageSrc;

            // crop images
            const imageCropElement = document.getElementById("capture-img");
            // Retrieve the existing Cropper instance or create a new one
            cropper = imageCropElement._cropper;
            if (!cropper) {
                // // If an existing Cropper instance exists, destroy it
                // cropper.destroy();
                // Set the new image source
                imageCropElement.src = imageSrc;

                // Create a new Cropper instance
                cropper = new Cropper(imageCropElement, {
                    aspectRatio: 0,
                    viewMode: 0,
                    crop(event) {
                        // console.log(event.detail.x);
                        // console.log(event.detail.y);
                        // event.detail.width = 352;
                        // event.detail.height = 415;
                        // console.log(event.detail.rotate);
                        // console.log(event.detail.scaleX);
                        // console.log(event.detail.scaleY);
                    },
                   
                });
                // cropper.rotate(-90);
            } else {
                // Replace the image within the existing Cropper instance
                cropper.replace(imageSrc);
            }

            // Store the Cropper instance reference on the image element
            imageCropElement._cropper = cropper;

            // Update the Cropper with the new image
            // cropper = updateCropperWithImage(cropper, imageSrc, imageCropElement);

            stopCapture();
            // Save the cropped image to the server
            // saveCroppedImage(imageCropElement);

            startCapture();
        };

        // You can also create a function to trigger the re-render if needed
        const triggerRerender = () => {
            stateInit.value += 1;
        };

        // Function to save the cropped image to the server
        // const saveCroppedImage = () => {
        //     if (cropper) {
        //         const canvas = cropper.getCroppedCanvas();
        //         if (canvas) {
        //           console.log(responseData.value.student_no)
        //             canvas.toBlob((blob) => {
        //                 const formData = new FormData();
        //                 formData.append(
        //                     "croppedImage",
        //                     blob,
        //                     `${responseData.value.student_no}.png`
        //                 );

        //                 // Send the cropped image to the Laravel API endpoint
        //                 axios
        //                     .post("/api/save-cropped-image", formData, {
        //                         headers: {
        //                             "Content-Type": "multipart/form-data",
        //                         },
        //                     })
        //                     .then((response) => {
        //                         // Handle the response from the server
        //                         console.log(response.data);
        //                         const $toast = useToast();
        //                         let instance = $toast.success(response.data.message,{ position: 'bottom-right'});
        //                     })
        //                     .catch((error) => {
        //                         // Handle any errors
        //                         console.error(error);
        //                     });
        //             });
        //         }
        //     }
        // };
        const saveCroppedImage = () => {
            triggerRerender()
            if (cropper) {
                const canvas = cropper.getCroppedCanvas();
                if (canvas) {
                    // Resize the canvas
                    const resizedCanvas = document.createElement("canvas");
                    const resizedContext = resizedCanvas.getContext("2d");
                    resizedCanvas.width = 220;
                    resizedCanvas.height = 240;
                    resizedContext.drawImage(canvas, 0, 0, 220, 240);

                    // Convert the resized canvas to a blob
                    resizedCanvas.toBlob((blob) => {
                        const formData = new FormData();
                        formData.append(
                            "croppedImage",
                            blob,
                            `${responseData.value.student_no}.png`
                        );

                        // Send the resized image to the Laravel API endpoint
                        axios
                            .post("/api/save-cropped-image", formData, {
                                headers: {
                                    "Content-Type": "multipart/form-data",
                                },
                            })
                            .then((response) => {
                                // Handle the response from the server
                                console.log(response.data);
                                stateI.value = response.data.id
                                const $toast = useToast();
                                let instance = $toast.success(response.data.message, { position: 'bottom-right' });
                                // Update stateInit after a successful response
                                
                                // localStorage.setItem('student_no',responseData.value.student_no)
                                triggerRerender()
                            })
                            .catch((error) => {
                                // Handle any errors
                                console.error(error);
                            });
                    }, "image/png");
                }
            }
        };


        // Function to convert a data URL to a Blob object
        // const dataURItoBlob = (dataURI) => {
        //     const byteString = atob(dataURI.split(",")[1]);
        //     const mimeString = dataURI
        //         .split(",")[0]
        //         .split(":")[1]
        //         .split(";")[0];
        //     const ab = new ArrayBuffer(byteString.length);
        //     const ia = new Uint8Array(ab);
        //     for (let i = 0; i < byteString.length; i++) {
        //         ia[i] = byteString.charCodeAt(i);
        //     }
        //     return new Blob([ab], { type: mimeString });
        // };

        return {
            video,
            captureImage,
            capturedImage,
            profileImage,
            signatureImage,
            statePath,
            responseData,
            image_src,
            saveCroppedImage,
            signature1,
            state,
            save,
            clear,
            undo,
            addWaterMark,
            fromDataURL,
            handleDisabled,
            stateInit,
            stateI,
            triggerRerender,
            InitComponents


        };
    },
};
</script>

<style scoped>
/* signature */
.signature{
    margin: 0 auto;
}
/* image */
img {
    display: block;

    /* This rule is very important, please don't ignore this */
    max-width: 100%;
}
.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Add any other necessary styles */
}

.centered-image {
    background-color: white;
    /* width: 250px;
  height: 250px; */
    /* border: 1px solid red; */
    /* Add any other necessary styles */
}
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
.btn-view {
    width: 100%;
}
/* Card Design */
.card-header {
    background-color: rgb(57, 157, 199);
}
/* Thumbtack Icon Design */
.thumbtack-icon {
    color: #ffffff;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -3px;
    left: 10px;
    z-index: 1;
}
</style>
