<template>
    <section>
        <button class="profile">Profile</button>
        <button class="level">League & Level</button>
        <hr />
        <div :class="[ userRole === 'user' ? 'profilebackgroundImage' : 'profilebackgroundImage_host']">
            <div class="header-content">
                <div class="circleModal">
                    <img
                        class="user__avatar"
                        v-if="user.profile_image && !editAvatar"
                        :src="'images/'+user.profile_image"
                        alt=""
                    /> 
                    <img
                         id="fileinput2_img"
                        class="user__avatar"
                        v-else-if="editAvatar"
                        :src="'images/'+user.profile_image"
                        alt=""
                    />
                   
                    
                    <h1
                        v-else
                        class="d-flex justify-content-center align-items-center h-100"
                    >
                        {{ nameFirstLetter }}
                    </h1>
                </div>
                
                <div style="margin: 1rem  1rem 1rem 9rem">
                    <div
                        role="button"
                        @click="editAvatar = true"
                    >
                        <i class="bi bi-pencil"></i>
                    </div>
                    <h4>{{ user.name }}</h4>
                </div>
                <div v-if="editAvatar" class="mt-1">
                    <form @submit.prevent="updateProfile2" method="post" enctype="multipart/form-data" class="row">
                        <div class="form-group col-6">
                            <!-- <img :src="'/images/'+user.profile_image" id="fileinput2_img" class="uploading-image bg-basic m-2 rounded"> -->
                            <input type="file" class="form-control" accept="image/jpeg" @change=uploadImage1>
                        </div>
                        <!-- <div class="form-group col-6">
                            <img src="previewImage2" id="fileinput3_img" class="uploading-image bg-basic m-2 rounded"> 
                            <input type="file" class="form-control" accept="image/jpeg" @change=uploadImage2>
                        </div> -->
                        <div class="form-group my-2">
                            <button class="btn btn-sm text-white" style="background-color: rgb(162, 38, 46)!important;" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: 1rem; gap: 10px; display: flex" class="profile_edit_wrapper">
            <div class="informationDiv">
                <div
                    style="
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 30px;
                    " >
                    <div>
                        <h5>My Information</h5>
                    </div>
                    <div
                        role="button"
                        @click="updateEditMode(true)"
                        v-show="!editMode"
                    >
                        <i class="bi bi-pencil"></i>
                    </div>
                </div>
                <div v-if="!editMode">
                    <div class="row mb-2">
                        <div class="col-md-3" style="color: #878787">From:</div>
                        <div class="col-md-6">{{ user.from }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3" style="color: #878787">
                            About:
                        </div>
                        <div class="col-md-6">{{ user.about }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3" style="color: #878787">DOB:</div>
                        <div class="col-md-6">{{ user.dob }}</div>
                    </div>
                    <!-- <div class="row mb-2">
                        <div class="col-md-3" style="color: #878787">
                            League & level:
                        </div>
                        <div class="col-md-6">grey league, level 1</div>
                    </div> -->
                    <!-- <div class="row mb-2">
                        <div class="col-md-3" style="color: #878787">
                            Intrests:
                        </div>
                        <div class="col-md-6">
                            <label for="fileinput1" class="fileClass"
                                >Upload File</label
                            >
                            <input
                                type="file"
                                id="fileinput1"
                                placeholder="Please, select...... "
                                class="inputBox1 file-input"
                                style="color: #888"
                            />
                            <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>
                        </div>
                    </div> -->
                </div>
                <ProfileEditForm v-else @updateEditMode="updateEditMode" />
            </div>
            <div class="PrfileDiv2">
                <div style="display: flex; justify-content: space-between">
                    <div>Profile Photo</div>
                    <!-- <div
                        role="button"
                        v-if="user.avatar"
                        @click="editAvatar = true"
                    >
                        <i class="bi bi-pencil"></i>
                    </div> -->
                </div>
                <div v-if="user.profile_image">
                    <img :src="'/images/'+user.profile_image"  alt="" class="profile__img mt-3" />
                </div>
                <!-- <div v-else>
                    <form @submit.prevent="updateProfile2" method="post" enctype="multipart/form-data" class="row">
                        <div class="form-group col-6">
                            <img :src="'/images/'+user.profile_image" id="fileinput2_img" class="uploading-image bg-basic m-2 rounded">
                            <input type="file" class="form-control" accept="image/jpeg" @change=uploadImage1>
                        </div>
                        <div class="form-group col-6">
                            <img src="previewImage2" id="fileinput3_img" class="uploading-image bg-basic m-2 rounded"> 
                            <input type="file" class="form-control" accept="image/jpeg" @change=uploadImage2>
                        </div>
                        <div class="form-group my-2">
                            <button class="btn btn-sm text-white" style="background-color: rgb(162, 38, 46)!important;" type="submit">Update</button>
                        </div>
                    </form>

                </div> -->
                <!-- <div class="profile__img_actions">
                    <button
                        class="btn text-white"
                        @click="updateProfile"
                        v-if="editAvatar"
                    >
                        Save
                    </button>
                </div> -->
            </div>
        </div>
            </div>

            <!-- Photo album start-->
            <div class="col-md-12 mt-5 ">
                <div class="photo_album_wrapper">

        <!-- <button class="btn btn-sm text-white" style="background-color: rgb(162, 38, 46)!important;" type="submit">Upload</button> -->
                <div>
                    <div class="mb-2">Upload Photos</div>

                    <div class="row">
                        <div class="col-md-2">
                           <div class="upload_box">
                            <div v-if="photo_album_url_1">
                                <img :src="photo_album_url_1" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[0])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else-if="host_gallery_array.length > 0 ">
                                <img :src="host_gallery_array[0].image" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[0])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else>
                                <label for="my-file" class="cursor_pointer mt-5">Select Image
                                    <div><i class="bi bi-cloud-arrow-up"></i> </div>
                                    <input type="file" accept="image/*" @change="previewImage" class="form-control-file d-none" id="my-file">
                                </label>
                               
                            </div>
                           
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="upload_box">
                            <div v-if="photo_album_url_2">
                                <img :src="photo_album_url_2" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[1])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                                
                            </div> 
                            <div v-else-if="host_gallery_array.length > 1 ">
                               
                                <img :src="host_gallery_array[1].image"  />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[1])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                                
                            </div> 
                            <div v-else>
                                <label for="my-file-2" class="cursor_pointer mt-5">Select Image
                                    <div><i class="bi bi-cloud-arrow-up"></i> </div>
                                    <input type="file" accept="image/*" @change="previewImage22" class="form-control-file d-none" id="my-file-2">
                                </label>
                               
                            </div>
                           
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="upload_box">
                            <div v-if="photo_album_url_3">
                                <img :src="photo_album_url_3"  />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[2])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else-if="host_gallery_array.length > 2 ">
                                <img :src="host_gallery_array[2].image" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[2])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else>
                                <label for="my-file-3" class="cursor_pointer mt-5">Select Image
                                    <div><i class="bi bi-cloud-arrow-up"></i> </div>
                                    <input type="file" accept="image/*" @change="previewImage3" class="form-control-file d-none" id="my-file-3">
                                </label>
                            
                               
                            </div>
                           
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="upload_box">
                            <div v-if="photo_album_url_4">
                                <img :src="photo_album_url_4"  />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[3])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else-if="host_gallery_array.length > 3 ">
                                <img :src="host_gallery_array[3].image" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[3])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else>
                                <label for="my-file-4" class="cursor_pointer mt-5">Select Image
                                    <div><i class="bi bi-cloud-arrow-up"></i> </div>
                                    <input type="file" accept="image/*" @change="previewImage4" class="form-control-file d-none" id="my-file-4">
                                </label>
                            
                               
                            </div>
                           
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="upload_box">
                            <div v-if="photo_album_url_5">
                                <img :src="photo_album_url_5"  />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[4])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else-if="host_gallery_array.length > 4 ">
                                <img :src="host_gallery_array[4].image" />
                                <button class="btn btn-link remove_icon" @click="removeImage(host_gallery_array[4])">
                                <i class="bi bi-x-circle"></i>
                               </button>
                            </div> 
                            <div v-else>
                                <label for="my-file-5" class="cursor_pointer mt-5">Select Image
                                    <div><i class="bi bi-cloud-arrow-up"></i> </div>
                                    <input type="file" accept="image/*" @change="previewImage5" class="form-control-file d-none" id="my-file-5">
                                </label>
                            
                               
                            </div>
                           
                           </div>
                        </div>

                    </div>

                    <div >
                    <!-- <form @submit.prevent="uploadAlbumPhoto" method="post" enctype="multipart/form-data" class="row">
                        <div class="form-group">
                                <div class="row">
                                    <div class="m-2 col-md-2 col-12" v-for="(image, index) in host_gallery_array">

<img :src="image.image" style="width: 100%; height: auto; "  />
<button class="btn btn-primary btn-sm bg-dark" @click="removeImage(image)">Remove image</button>
</div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <img :src="preview" style="width: 100%; height: auto; "  />
                            </div>
                        </div>
                        <div class="form-group my-2 col-md-3 mt-3">
                            
                        </div>
                    </form> -->

                </div>
                </div>
            </div>
            </div>
        </div>
        
        <!-- <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="..."> -->
    </section>
</template>

<style>
   .uploading-image{
        display:flex;
        width: 5rem;
        height: 5rem;
        background-color: #e9ecef;
   }

   .uploading-album{
        display:flex;
        width: 10rem;
        height: 10rem;
        background-color: #e9ecef;
   }
 </style>

<script>
import ProfileEditForm from "@/Pages/Profile/Partials/ProfileEditForm.vue";
export default {
    components: { ProfileEditForm },
    data() {
        return {
            editMode: false,
            editAvatar: false,
            previewImage1:null,
            preview:null,
            previewImage2:null,
            photo_album_url_1:null,
            photo_album_url_2:null,
            photo_album_url_3:null,
            photo_album_url_4:null,
            photo_album_url_5:null,
            album_photos:[],
            host_gallery_array:[],
        };
    },
    mounted() {
        this.getHostGallery();
    },
    provide() {
        return {
            authUser: this.user,
            userRole: this.userRole,
        };
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
        userRole() {
            return this.$page.props.auth.user_role;
        },
        nameFirstLetter() {
            return this.user.name.substring(0, 1);
        },
    },
    methods: {
        getHostGallery() {
            try {
                       axios.get("/host/gallery/" + this.user.uuid).then((resp)=> {
                            this.host_gallery_array = resp.data.gallery;
                        })
                    } catch (error) {
                        console.log(error);
                    }
        },
        removeImage(e) {
            try {
                       axios.get("host/remove/gallary-image/" + e.uuid).then((resp)=> {
                        this.getHostGallery();
                        window.location.reload();
                        });
                    } catch (error) {
                        console.log(error);
                    }
        },
        updateEditMode(val) {
            this.editMode = val;
        },
        uploadImage1(e){

            this.previewImage1 = e.target.files[0];
            let file1 = URL.createObjectURL(this.previewImage1);
            $('#fileinput2_img').attr('src', file1);

        }, 
        previewImage(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.photo_album_url_1 = e.target.result;
                this.uploadAlbumPhoto(e.target.result);
                }
                this.photo_album_url_1=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
           
         },

         previewImage22(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.photo_album_url_2 = e.target.result;
                this.uploadAlbumPhoto(e.target.result);
                }
                this.photo_album_url_2=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
           
         },

         previewImage3(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.photo_album_url_3 = e.target.result;
                this.uploadAlbumPhoto(e.target.result);
                }
                this.photo_album_url_3=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
           
         },

         previewImage4(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.photo_album_url_4 = e.target.result;
                this.uploadAlbumPhoto(e.target.result);
                }
                this.photo_album_url_4=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
           
         },

         previewImage5(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.photo_album_url_5 = e.target.result;
                this.uploadAlbumPhoto(e.target.result);
                }
                this.photo_album_url_5=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
           
         },

    //     uploadAlbum(e){
    //         var files = e.target.files || e.dataTransfer.files;
    //         if (!files.length) return;
    //         this.createImage(files);
          
    //     },
    //     createImage(files) {
    //     var vm = this;
    //     for (var index = 0; index < files.length; index++) {
    //         var reader = new FileReader();
    //         reader.onload = function(event) {
    //         const imageUrl = event.target.result;
    //         vm.album_photos.push(imageUrl);
    //         }
    //         reader.readAsDataURL(files[index]);
    //     }
    // },
        uploadImage2(e){
            this.previewImage2 = e.target.files[0];
            let file2 = URL.createObjectURL(this.previewImage2);
            $('#fileinput3_img').attr('src', file2);
        },

         updateProfile2(event){

            //--------------------------------------------------------
            const URL = '/uplaod/profile/image';

                let data = new FormData();
                data.append('name', 'profile');
                data.append('image1', this.previewImage1);
                // data.append('image2', this.previewImage2);

                axios.post(
                    URL, 
                    data,
                ).then(
                  
                    response => {
                        this.editAvatar=false;
                        console.log('image upload response > ', response)
                    }
                )

                
            //-------------------------------------------------------

            // axios.post('/shub/test', this.profile, ) 
            //     .then(res => {
            //         if (res.status == 200) {
            //             console.log('request handled!' + JSON.stringify(res));
            //         }
            //     }).catch(err => {
            //     console.log(err);
            // })
            // console.log(this.profile + 'After form submit');
        },

         uploadAlbumPhoto(event){
            console.log(event);
            //--------------------------------------------------------
                try {
                    axios.post("user/host/gallery", {
                    images:event,
                    host_id:this.user.uuid,
                 }).then((resp)=> {
                    this.getHostGallery();
                // console.log(resp);
                });
                } catch (error) {
                    console.log(error);
                }
        }
    },
};
</script>

<style scoped>
/* .header {
    min-height: 150px;
} */
.bg-dark {
    background-color: #511212;
    border: 1px solid #fff;
}
#fileinput1 {
    display: none;
}

.fileClass {
    display: inline-block;
    border: 3px solid green;
    border-radius: 20px;
    padding: 3px 10px;
    font-size: 12px;
}

.profile {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
}

.level {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
    margin-left: 3rem;
}

.profilebackgroundImage {
    background-image: url("/img/user_cover.jpg");
    border-top-left-radius: calc(0.42rem - 1px);
    border-top-right-radius: calc(0.42rem - 1px);
    height: 30rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0;
    position: relative;
}
.profilebackgroundImage_host {
    background-image: url("/img/host_cover.jpg");
    border-top-left-radius: calc(0.42rem - 1px);
    border-top-right-radius: calc(0.42rem - 1px);
    height: 30rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0;
    position: relative;
}

.header-content {
    display: flex;
    position: absolute;
    bottom: 0;
    /* left: 0; */
    background: #222222;
    width: 100%;
    height: 6rem;
}

.circleModal {
    position: absolute;
    bottom: 20%;
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    background-color: #26272b;
    border: 6px solid #9f9f9f;
    /* margin-left: 10px; */
    font-size: 10px;
    line-height: 80px;
    text-align: center;
    margin: auto;
}

.informationDiv {
    background-color: #26272b;
    width: 60%;
    padding: 1rem 1rem;
}

.PrfileDiv2 {
    background-color: #26272b;
    width: 40%;
    padding: 1rem 1rem;
}
.PrfileDiv2 .profile__img {
    width: 10rem;
    height: 6rem;
    object-fit: cover;
}

.photo_album_wrapper {
    background-color: #26272b;
    width: 100%;
    padding: 1rem 1rem;
}
.photo_album_wrapper .profile__img {
    width: 10rem;
    height: 6rem;
    object-fit: cover;
}
.user__avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.profile__img_actions {
    margin-top: 1rem;
}
.profile__img_actions button {
    background: var(--primary);
    border-radius: 2rem;
    padding: 0.3rem 1.3rem;
}

@media screen and (max-width: 600px){
  .profile_edit_wrapper{
    align-items: center;
    flex-direction: column;
  }
  .informationDiv, .PrfileDiv2{
    width: 100%;
  }
}
</style>
