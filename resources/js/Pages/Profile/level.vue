<template>
    <section>
       <h5>League & Level System
</h5>
<p>Each user has a level. Your level determines what league you belong to. Levels are based on how much XP you have.
The big colored horizontal bar tracks your progress.</p>

<div class="row">
            <div class="col-md-2">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <!-- start level -->
                    <div  
                    v-for="(level, i) in level_chart"
                    :key="i">
                        <a class="nav-link mb-3 p-3 active shadow" id="v-pills-home-tab" data-toggle="pill" :href="'#'+level.name" role="tab" :aria-controls="level.name" 
                        aria-selected="true"
                        @click="showActiveTab(level)"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <path fill="#ccc"  d="M43.681 2.863a12.69 12.69 0 0112.638 0l15.865 9.108 15.803 8.988a12.693 12.693 0 016.418 11.058L94.367 50l.038 17.983a12.692 12.692 0 01-6.418 11.058l-15.803 8.988-15.865 9.108a12.69 12.69 0 01-12.638 0l-15.865-9.108-15.803-8.988a12.69 12.69 0 01-6.418-11.058L5.633 50l-.038-17.983a12.691 12.691 0 016.418-11.058l15.803-8.988 15.865-9.108z"></path>
                                <path  :fill="level.color" d="M43.9419 4.777a12.1761 12.1761 90 0112.1262 0l15.2225 8.7391l15.163 8.624a12.1789 12.1789 90 016.1581 10.6102L92.5751 50.005l0.0365 17.2547a12.178 12.178 90 01-6.1581 10.6102l-15.163 8.624l-15.2225 8.7391a12.1761 12.1761 90 01-12.1262 0l-15.2225-8.7391l-15.163-8.624a12.1761 12.1761 90 01-6.1581-10.6102L7.4349 50.005l-0.0365-17.2547a12.177 12.177 90 016.1581-10.6102l15.163-8.624l15.2225-8.7391z" class="level-badge-stroke"></path>
                                <text text-anchor="middle" fill="white" font-weight="bold" font-size="51" x="50%" y="50%" dy="20" style="color:#fff">
                                {{  i }}
                                </text>
                        </svg>
                        <span class="font-weight-bold ms-2 text-uppercase" :style="'color:'+level.color">{{ level.name }}</span>
                        <p class="font-italic font-size-30  mb-2 display-mobile">Levels {{ level.range }} <span class="ms-2">  Token <img src="/assets/coin2.png" width="18" class="mb-4px"/> {{ level.token }}</span>
                        </p>
                    </a>
                    </div>
                     <!-- end level -->

                    </div>
            </div>


            <div class="col-md-9 display-desktop">
                <!-- Tabs content -->
                <div v-for="(level2, i) in level_chart"
                    :key="i">
                <div class="tab-content" :id="level2.name" v-if="click && level2.name==='Bronze'">
                    <div :class="['tab-pane fade shadow rounded active show bg-white p-5']" :id="level2.name+level2.color" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="font-italic mb-1" :style="'color:'+level2.color">{{  level2.name }}</h3>
                        <p class="font-italic font-size-30  mb-2">Levels {{ level2.range }} | <img src="/assets/coin2.png" width="18" class="mb-4px"/> {{ level2.token }}
                        </p>
                    </div>
                </div>
                <div class="tab-content" :id="level2.name" v-else>
                    <div :class="['tab-pane fade shadow rounded bg-white p-5']" :id="level2.name+level2.color" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="font-italic mb-1" :style="'color:'+level2.color">{{  level2.name }}</h3>
                        <p class="font-italic font-size-30  mb-2">Levels {{ level2.range }} | <img src="/assets/coin2.png" width="18" class="mb-4px"/> {{ level2.token }}
                            
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


</template>


<script>
export default {
    components: {  },
    props:['user'],
    data() {
        return {
           level_chart:[],
           click:true,
        };
    },
    mounted() {
        this.getLevelChart();
    },
    computed: {
       
    },
    methods: {
        showActiveTab(level) {
            console.log(level);
            this.click=false;
            $('.tab-pane').removeClass('active');
            // const div = document.querySelector('.tab-content');
            // console.log(div);
            // div.classList.remove('active','show');
            var element = document.getElementById(level.name+level.color);
            element.classList.add('active');
            element.classList.add('show');
        },
        getLevelChart() {
            try {
                       axios.get("/level_chart").then((resp)=> {
                            this.level_chart = resp.data.level_chart;
                        })
                    } catch (error) {
                        console.log(error);
                    }
        }
    },
};
</script>

<style scoped>

.font-size-30 {
    font-size: 20px;
    color: #fff !important;
}
.font-weight-bold  {
    font-weight: 600;
}
.nav-link svg {
    width: 40px;
    height: 40px;
}
.nav-pills-custom .nav-link {
    color: #aaa;
    background: #000;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #45b649;
    background: #242424;
}


/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #242424;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}



body {
    min-height: 100vh;
    background: linear-gradient(to left, #dce35b, #45b649);
}

/* Add indicator arrow for the active tab */
@media (max-width: 600px) {
    .font-size-30 {
        font-size: 14px;
        margin-left: 48px;

}
}

</style>