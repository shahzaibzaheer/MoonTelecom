<template>

    <div class="table_container">
        <div class="search-filter-contianer">
            <div class="search-container" >
                <input type="text"  placeholder="Search..." v-model="searchQuery" >
                <svg class="icon" version="1.1" viewBox="0 0 21.164 21.921" >
                    <path id="search" d="M21.826,19.967,16.609,14.54A8.847,8.847,0,1,0,9.835,17.7a8.756,8.756,0,0,0,5.071-1.6l5.257,5.467a1.154,1.154,0,1,0,1.664-1.6ZM9.835,2.309A6.542,6.542,0,1,1,3.293,8.851,6.549,6.549,0,0,1,9.835,2.309Z" transform="translate(-0.984)"/>
                </svg >
            </div>
            <div class="filters-container">
                    <div class="filter">
                        <select v-model="selectedState" >
                            <option value="" selected >Select State</option>
                            <option v-for="state in states"> {{state}}</option>
                        </select>
                    </div>
                    <div class="filter">
                        <select v-model="selectedPackage" >
                            <option value="" selected >Select Package</option>
                            <option v-for="packageName in packageNames"> {{packageName}}</option>
                        </select>
                    </div>
                    <div class="filter">
                        <select v-model="selectedStatus" >
                            <option value="" selected >Select Status</option>
                            <option v-for="status in billStatus"> {{status}}</option>
                        </select>
                    </div>
                    <div class="filter">
                        <select v-model="selectedVillage" >
                            <option value="" selected >Select Village</option>
                            <option v-for="villageName in villageNames" :value="villageName.toLowerCase()">{{villageName}}</option>
                        </select>
                    </div>
            </div>
        </div>

        <span>There are total <strong>{{ total  }}</strong> Connections</span>
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>Name</th>
                <th>Fathername</th>
                <th>Village</th>
                <th>Package</th>
                <th>Bandwidth</th>
                <th>Due</th>
                <th>Current</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Remaining</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="connection in filteredConnections">
                <td v-if="!connection.isBlocked" ><span class="active circle"></span></td>
                <td v-else="connection.isBlocked"><span class="block circle"></span></td>
                <td>{{connection.username}}</td>
                <td>{{connection.name}}</td>
                <td>{{connection.fathername}}</td>
                <td>{{connection.village.name}}</td>
                <td>{{connection.package.name}}</td>
                <td>{{connection.package.bandwidth}}</td>
                <td>{{connection.current_bill.due}}</td>
                <td>{{connection.current_bill.billAmount}}</td>
                <td>{{ connection.current_bill.due + connection.current_bill.billAmount}}</td>
                <td>{{connection.current_bill.amountPaid}}</td>
                <td>{{ (connection.current_bill.due + connection.current_bill.billAmount) - connection.current_bill.amountPaid}}</td>

                <!--     status 0 means not recovered, 1 means not paid, 2 means paid           -->
                <td v-if="connection.current_bill.status == 0"> Not Recovered</td>
                <td v-else-if="connection.current_bill.status == 1"> Not Paid</td>
                <td v-else="connection.current_bill.status == 2"> Paid</td>
                <td class="icons-container">
                    <a :href="'connections/'+connection.id" >
                        <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                            <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
                        </svg>
                    </a>
                    <a :href="'connections/'+connection.id +'/invoice'" >
                        <svg class="icon" version="1.1" viewBox="0 0 21.246 25.279" >
                            <g  transform="translate(-0.359 0)" >
                                <path  d="M104.008,125.9a5.413,5.413,0,1,0,5.413-5.413A5.413,5.413,0,0,0,104.008,125.9Zm5.413.342a1.779,1.779,0,0,1-.452-3.5v-.458a.375.375,0,0,1,.75,0v.435a1.761,1.761,0,0,1,1.467,1.748.371.371,0,1,1-.741,0,1.026,1.026,0,1,0-1.024,1.027,1.776,1.776,0,0,1,.3,3.525v.447a.375.375,0,0,1-.75,0V129a1.8,1.8,0,0,1-1.337-1.725.38.38,0,0,1,.759,0,1.029,1.029,0,0,0,.917,1.021.391.391,0,0,1,.059,0,.378.378,0,0,1,.084.01,1.026,1.026,0,0,0-.03-2.052Zm0,0" transform="translate(-98.094 -114.035)" />
                                <path  d="M80.48,352.822l-.009,0-3.482,1.645a2.691,2.691,0,0,1,.049.585.375.375,0,0,1-.375.365h-.011l-5.1-.14a.375.375,0,0,1,.021-.75l4.685.129a1.934,1.934,0,0,0-1.85-1.607l-3.1-.085a4.083,4.083,0,0,1-1.757-.454l-.315-.163a4.766,4.766,0,0,0-4.865.274l-.124,4.51.533-.285a2.317,2.317,0,0,1,1.727-.189l5.261,1.477a4.914,4.914,0,0,0,3.011-.337l7.289-4.715a1.363,1.363,0,0,0-1.591-.264Zm0,0" transform="translate(-60.467 -332.958)" />
                                <path  d="M.359,347.261l.185-6.71,2.65.073-.185,6.71Zm0,0" transform="translate(0 -322.301)" />
                                <path  d="M198.336,4.448V.375a.375.375,0,0,0-.75,0V4.448a.375.375,0,0,0,.75,0Zm0,0" transform="translate(-186.657)" />
                                <path  d="M258.336,42.3V40.375a.375.375,0,0,0-.75,0V42.3a.375.375,0,1,0,.75,0Zm0,0" transform="translate(-243.442 -37.856)" />
                                <path  d="M138.336,42.3V40.375a.375.375,0,0,0-.75,0V42.3a.375.375,0,1,0,.75,0Zm0,0" transform="translate(-129.873 -37.856)" />
                            </g>
                        </svg>
                    </a>
                </td>

            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    export default {
        props:['connections', 'villageNames', 'packageNames'],


        created (){

            let state = this.$route.query.state;
            let village = this.$route.query.village;
            let status = this.$route.query.status;

            if(state != null){
                // console.log('state is set');
                state = state.toLowerCase();  // for case insensitive check
                if(state.length > 0){
                    if(state === 'active'){
                        this.selectedState = "Active"
                    }
                    else if(state === 'blocked'){
                        this.selectedState = "Blocked"
                    }
                }
                console.log(state.toLowerCase().length);
            }

            if(village != null){
                this.selectedVillage = village.toLowerCase();
            }
            if(status != null){
                const NOT_RECOVERED =  "notrecovered";
                const NOT_PAID =  "notpaid";
                const PAID =  "paid";

                status = status.toLowerCase();  // for case insensitive comparision
                if(status === NOT_RECOVERED){  // not recovered
                    this.selectedStatus = "Not Recovered";
                }
                else if(status === NOT_PAID){ // not paid
                    this.selectedStatus = "Not Paid";
                }else if(status === PAID){   // paid
                    this.selectedStatus = "Paid";
                }
            }


            console.log(state);
        },

        data(){
            return{
                searchQuery: "",
                selectedPackage: '',
                selectedVillage: '',
                selectedStatus: '',
                billStatus: [
                    'Not Recovered',
                    'Not Paid',
                    'Paid'
                ],
                selectedState: 'Active',
                states:[
                    'Active',
                    'Blocked'
                ],

            }
        },
        methods:{

        },

        computed:{
            filteredConnections (){
                let filteredConnectionsList = [];
                filteredConnectionsList =  this.connections.filter( connection => {

                    // search by  Username, Name, Fathername, Village
                    if( connection.username.match(this.searchQuery)
                        || connection.name.match(this.searchQuery)
                        || connection.fathername.match(this.searchQuery)
                        || connection.village.name.match(this.searchQuery)

                    ){
                        return true;
                    }
                });

                // filter by village
                if(this.selectedVillage.length > 0){
                    console.log("Filter by village");
                    filteredConnectionsList = filteredConnectionsList.filter( connection => {
                            if(connection.village.name.toLowerCase().match( this.selectedVillage.toLowerCase() )){
                                return true;
                            }
                    }
                    );
                }

                // filter by packages
                if(this.selectedPackage.length > 0){
                    console.log("Filter by package");
                    filteredConnectionsList = filteredConnectionsList.filter( connection => {
                            if(connection.package.name.match( this.selectedPackage )){
                                return true;
                            }
                        }
                    );
                }

                // filter by bill status
                const PAID = 2;
                const NOT_PAID = 1;
                const NOT_RECOVERED = 0;

                if(this.selectedStatus.length > 0){
                    console.log("Filter by Bill Status");
                    filteredConnectionsList = filteredConnectionsList.filter( connection => {

                            if(this.selectedStatus.match("Not Recovered")){
                                return connection.current_bill.status === NOT_RECOVERED;
                            }else if(this.selectedStatus.match("Not Paid")){
                                return connection.current_bill.status === NOT_PAID;
                            }else if(this.selectedStatus.match("Paid")){
                                return connection.current_bill.status === PAID;
                            }
                        }
                    );
                }


                // filter by State
                if(this.selectedState.length>0){
                    if(this.selectedState === "Active"){
                        filteredConnectionsList = filteredConnectionsList.filter(connection => {
                            return  !connection.isBlocked;
                        });
                    }else if(this.selectedState === "Blocked"){
                        filteredConnectionsList = filteredConnectionsList.filter(connection => {
                            return connection.isBlocked;
                        });
                    }
                }




                return filteredConnectionsList;
            },
            total(){
                return this.filteredConnections.length;
            }
        },

    }
</script>

<style lang="scss">
</style>