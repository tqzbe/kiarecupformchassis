<template>

    <div class="files-uploader">

        <label class="files-uploader__btn-add">
            <span><i class="fas fa-file-upload"></i>Ajouter des photos</span>
            <input accept="image/*" type="file" id="file" ref="file" @change="handleFileUpload"/>
        </label>

        <ul class="files-uploader__list" v-if="files.length !== 0">
            <li v-for="(file, index) in files">
                <a :href="'/storage/' + file.location + '/' + file.name" target="_blank">{{ file.name }}</a>
                <button @click="deleteFile" :data-index="index" :data-id="file.id" type="button" class="files-uploader__btn-delete"><i class="fas fa-trash"></i></button>
            </li>
        </ul>

        <input type="hidden" name="files_id" v-model="filesStored">

    </div>

</template>

<script>
    export default {
        data() {
            return {
                file: '',
                files: [],
                filesStored: []
            }
        },
        methods: {
            submitFile() {
                let formData = new FormData()

                formData.append('file', this.file)

                axios.post('/files/store', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                .then((response) => {
                    if ( response.data !== 'failed' ) {
                        this.files.push(response.data)
                        this.filesStored.push(response.data.id)
                    }
                })
            },
            deleteFile(e) {
                let elem = e.currentTarget
                let id = elem.getAttribute('data-id')
                let indexArray = elem.getAttribute('data-index')
    
                axios.post('/files/delete', {
                    file_id: id
                })
                .then((response) => {
                    if ( response.data === 'success') {
                        this.files.splice(indexArray, 1);
                        this.filesStored.splice(indexArray, 1);
                    }
                })
            },
            handleFileUpload(e) {
                this.file = this.$refs.file.files[0]
                this.submitFile()
            }
        }
    }
</script>