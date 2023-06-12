<template>
<section>
    <div class="row">
        <div class="col-md-12">
        <div style="font-size: 1.5rem;" class="mb-3">Transaction History</div>
        <div class="table-responsive">
                    <table class="table table-dark table-striped" style="color: #888888;">
                        <thead>
                        <th>#</th>
                        <th>Total Amount </th>
                        <th>Paid Amount </th>
                        <!-- <th>Status</th> -->
                        <th>Order ID</th>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index3) in recharge" :key="index3">
                               <td>{{  index3+1 }}</td>
                               <td>{{  value.amount }}</td>
                               <td>{{  value.amount_paid }}</td>
                               <!-- <td>{{  value.type === 'spend_tip' ? 'Send Tip' : 'Private Chat' }}</td> -->
                               <td>{{  value.order_id }}</td>
                            
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    
    <div style="font-size: 1.5rem;" class="mb-3 mt-5">Token History</div>
        <div class="row">
            <ul
                class="nav nav-tabs chat_card--tabs d-flex"
                id="chat_box"
                role="tablist"
            >
                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn active"
                        id="home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#token_type"
                        type="button"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                    >
                    <i class="bi bi-wallet2"></i>
                        Type
                    </button>
                </li>
                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#privateChat"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                        <i
                            class="bi bi-chat-heart-fill"
                        ></i>
                       Private Chat
                    </button>
                </li>

                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#report"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                    <i class="bi bi-file-bar-graph"></i>
                      Income Report
                    </button>
                </li>
            </ul>
  </div>

            <div
                class="tab-content pt-2 mt-20"
            >
                <div
                    class="tab-pane active show"
                    id="token_type"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                >
                    <div
                        class="tip_box"
                    >
                    <form class="d-flex justify-content-between call_history_filter"
                      style="margin-top: 1.5rem; margin-bottom: 1rem;">
                    <h5 >Type</h5>
                    <div class="d-flex align-items-center call_history_filter--date" style="gap: 1rem;">
                        <datepicker
                        v-model="searchBy2"
                        :locale="locale"
                        :upperLimit="to"
                        :lowerLimit="from"
                        :clearable="true"
                        :style="'background-color:#000; border:1px solid #fff; border-radius:15px; height:40px; color:#fff; padding-left:10px'"
                    />
                        <!-- <input placeholder="Last 30 days" name="daterange" class="inputBox1" type="text"
                               value="{{ $date }}" id="date"/> -->
                        <div>
                            <button class="btn btn__search" type="button" @click="filterTokenHistory">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-dark table-striped" style="color: #888888;">
                        <thead>
                        <th>#</th>
                        
                            <th v-if="role==='user'">Model </th>
                          
                                <th v-else>User</th>
                           
                        <th>Date</th>
                        <!-- <th>Status</th> -->
                        <th>Token</th>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index) in token_spent" :key="index">
                               <td>{{  index+1 }}</td>
                               <td>{{  value.host_name }}</td>
                               <td>{{  value.date }}</td>
                               <!-- <td>{{  value.type === 'spend_tip' ? 'Send Tip' : 'Private Chat' }}</td> -->
                               <td>{{  value.token }}</td>
                            
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
                   </div>
                 </div>
                </div>

                <!--Private Chat -->
                <div
                class="tab-content pt-2 mt-20"
            >
                <div
                    class="tab-pane  "
                    id="privateChat"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                >
                    <div
                        class="tip_box"
                    >
                    <form class="d-flex justify-content-between call_history_filter"
                      style="margin-top: 1.5rem; margin-bottom: 1rem;">
                    <h5 >Private Chat</h5>
                    <div class="d-flex align-items-center call_history_filter--date" style="gap: 1rem;">
                        <datepicker
                        v-model="searchBy"
                        :locale="locale"
                        :upperLimit="to"
                        :lowerLimit="from"
                        :clearable="true"
                        :style="'background-color:#000; border:1px solid #fff; border-radius:15px; height:40px; color:#fff; padding-left:10px'"
                    />
                        <!-- <input placeholder="Select Datte" name="daterange" class="inputBox1" type="date" v-model ="searchBy" id="date"/> -->
                        <div>
                            <button class="btn btn__search" type="button" @click="findFilterData()">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-dark table-striped" style="color: #888888;">
                        <thead>
                        <th>#</th>
                        
                            <th v-if="role==='user'">Model </th>
                          
                                <th v-else>User</th>
                           
                        <th>Date</th>
                        <!-- <th>Status</th> -->
                        <th>Token</th>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index2) in private_chat" :key="index2">
                               <td>{{  index2+1 }}</td>
                               <td>{{  value.host_name }}</td>
                               <td>{{  value.date }}</td>
                               <!-- <td>{{  value.type === 'spend_tip' ? 'Send Tip' : 'Private Chat' }}</td> -->
                               <td>{{  value.total_token }}</td>
                            
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
                   </div>
                 </div>
                </div>
    </section>
</template>

<script>

import Datepicker from 'vue3-datepicker'
export default {
    components: { Datepicker },
    props: ["user", "role", "date"],
   
    data() {
        return {
            token_spent:null,
            private_chat:null,
            searchBy:null,
            searchBy2:null,
            recharge:[],
        };
    },
    mounted() {
        this.getSpentToken();
        this.getPrivateChat();
        this.getRechargeHistory();
    },
    methods: {
       findFilterData() {
        this.getPrivateChat();
       } ,   
        filterTokenHistory() {
        this.getSpentToken();
       } ,  
       convert(str) {
        var date = new Date(str),
        mnth = ("0" + (date.getMonth() + 1)).slice(-2),
        day = ("0" + date.getDate()).slice(-2);
        return [date.getFullYear(), mnth, day].join("-");
        },
        getSpentToken() {
            try {
                let new_date = this.convert(this.searchBy2);
                if(this.searchBy2) {
                axios.get("/checker/user/token/sent-tip-history/"+this.user.uuid+'?date='+new_date).then((resp)=> {
                    this.token_spent = this.formetData(resp.data.token_spent);
                    });
                } else {
                    axios.get("/checker/user/token/sent-tip-history/"+this.user.uuid).then((resp)=> {
                    this.token_spent = this.formetData(resp.data.token_spent);
                    });
                }
                
                } catch (error) {
                    console.log(error);
                }
    }, 
    
    getRechargeHistory() {
            try {
                axios.get("/checker/user/token/recharge-history/"+this.user.uuid).then((resp)=> {
                    this.recharge = this.formetRechargeData(resp.data.recharge);
                });
                } catch (error) {
                    console.log(error);
                }
    },
    getPrivateChat() {
            try {
                if(this.searchBy) {
                    let new_date = this.convert(this.searchBy);
                    axios.get("/checker/user/token/private-chat-history/"+this.user.uuid+'?date='+new_date).then((resp)=> {
                    this.private_chat = this.formetData2(resp.data.token_spent);
                    });
                
                } else {
                    axios.get("/checker/user/token/private-chat-history/"+this.user.uuid).then((resp)=> {
                    this.private_chat = this.formetData2(resp.data.token_spent);
                    });
                
                }
               
                } catch (error) {
                    console.log(error);
                }
    },
    formetData(data) {
			let table_rows = [];
			for (let key in data) {
				let node = data[key];
				if (node) {
					var new_node = {};
					new_node.host_name = node.host_name;
					new_node.date = node.created_at;
					new_node.host_id = node.host_id;
					new_node.total_token = node.total_token ? node.total_token:null;
					new_node.token = node.token;
					new_node.type = node.type;
					new_node.user_id = node.user_id;
				
					table_rows.push(new_node);
				}
			};
			return table_rows;
		},

        formetData2(data) {
			let table_rows = [];
            if(data) {
                for (let key in data) {
				let node = data[key];
				if (node) {
					var new_node = {};
					new_node.host_name = node.host_name;
					new_node.date = node.created_at;
					new_node.host_id = node.host_id;
					new_node.total_token = node.total_token;
					table_rows.push(new_node);
				}
			};
            }
			
			return table_rows;
		}, 
        
        formetRechargeData(data) {
			let table_rows = [];
            if(data) {
                for (let key in data) {
				let node = data[key];
				if (node) {
                    console.log(node);
					var new_node = {};
					new_node.amount = node.amount;
					new_node.amount_paid = node.amount_paid;
					new_node.order_id = node.order_id ? node.order_id : '-';
					table_rows.push(new_node);
				}
			};
            }
			
			return table_rows;
		},
    
    },
};
</script>

<style scoped>
        .inputBox1 {
            border-radius: 20px;
            background-color: black;
            height: 35px;
            padding: 0 10px;
            border: 2px solid white;
            color: white;
        }

        .btn__search {
            background-color: var(--primary);
            color: #fff;
            border-radius: 2rem;
        }

        .btn__search:hover {
            background-color: var(--primary) !important;
            color: #fff;
        }

        .daterangepicker {
            background-color: #000 !important;
        }

        .daterangepicker .calendar-table {
            background-color: #000 !important;
        }

        .daterangepicker .ranges li:hover {
            background-color: #2c3034 !important;
        }

        .daterangepicker td.available:hover,
        .daterangepicker th.available:hover,
        .daterangepicker td.off,
        .daterangepicker td.off.in-range,
        .daterangepicker td.off.start-date,
        .daterangepicker td.off.end-date {
            background-color: #000 !important;
        }

        .daterangepicker td.active,
        .daterangepicker td.active:hover,
        .daterangepicker .ranges li.active {
            background-color: var(--primary) !important;
        }

        .daterangepicker .drp-buttons .cancelBtn {
            background-color: #fff !important;
        }

        .daterangepicker .drp-buttons .cancelBtn:hover {
            color: #000 !important;
        }

        .daterangepicker .drp-buttons .applyBtn {
            background-color: var(--primary) !important;
            border-color: transparent !important;
        }

        .next.available,
        .prev.available,
        .calendar-table .table-condensed .next.available:hover,
        .calendar-table .table-condensed .prev.available:hover {
            background-color: #fff !important;
        }

        @media screen and (max-width: 600px) {
            .call_history_filter {
                display: flex;
                flex-direction: column;
                margin-top: 0 !important;
                gap: 1rem;
            }
            .call_history_filter .inputBox1{
                width: 60%;
            }
            .call_history_filter--date{
                justify-content: flex-end;
            }
        }
   
</style>
