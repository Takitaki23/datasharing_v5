<template>
    <!-- bulk modal -->
    <div
        class="modal fade"
        id="bulkPreviewModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        @hidden.bs.modal="resetModal"
    >
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Generate ID {{ statePath }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        @click="closeModal()"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe :src="statePath" :key="statePath" style="top:0; left:0; bottom:0; right:0; width:100%; height:480px; border:none; margin:0; padding:0; overflow:hidden;">
                                Your browser doesn't support iframes
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        @click="closeModal()"
                    ></button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>
import { ref, computed, reactive } from 'vue';
import { useRouter } from 'vue-router'

export default {
  props: ['modalData','dataId'],

  setup(props) {
    const router = useRouter()
    let modalDataValue = reactive({
        state: ''
    });

    const statePath = computed(()=>{
        return modalDataValue.state = props.modalData
    })
    const closeModal = () => {
      console.log(modalDataValue.state);
      modalDataValue.state = '';
    };
    return {
        statePath,
        closeModal
    };
  },
};
</script>
