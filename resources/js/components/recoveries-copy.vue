<template>

    <div class="table_container recoveries">

        <div class="filters-container">
            <div class="filter">
                <select v-model="selectedUserId" :class="{'neutral': selectedUserId.toString().length > 0 }" >
                    <option value="" selected >Select User</option>
                    <option v-for="user in users" :value="user.id" >{{user.name}}</option>
                </select>
            </div>
            <div class="filter">
                <select v-model="selectedVillageId" :class="{'neutral': selectedVillageId.toString().length > 0 }"   >
                    <option value="" selected >Select Village</option>
                    <option v-for="village in villages" :value="village.id" >{{village.name}}</option>
                </select>
            </div>
            <div class="filter">
                <select v-model="selectedDay" :class="{'neutral': selectedDay.length > 0 }"   >
                    <option value="" selected >Select Day</option>
                    <option v-for="day in days"> {{day}}</option>
                </select>
            </div>
        </div>

        <span class="table-meta-info">There are total <strong>{{ total  }}</strong> Recoveries</span>

        <table>
            <thead>
            <tr>
                <th>Recover By</th>
                <th>Recover At</th>
                <th>Username</th>
                <th>Name</th>
                <th>Amount</th>
                <th class="comments">Comments</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="recovery in filteredRecoveries" >
                <td class="bold success" > <strong>By: </strong> <span>{{recovery.user.name}}</span> </td>
                <td><strong>At: </strong> <span>{{ new Date(recovery.created_at).toLocaleDateString() }}</span> </td>
                <td><strong>Username: </strong> <span>{{recovery.connection.username}}</span></td>
                <td><strong>Name: </strong> <span>{{recovery.connection.name}}</span></td>
                <td class="bold" :class="{danger: recovery.amount <= 0, neutral: recovery.amount > 0}"><strong>Amount: </strong> <span>{{recovery.amount}}</span></td>
                <td class="comments"><strong>Comments: </strong> <span>{{recovery.comments}}</span></td>
                <td class="icons-container">
                    <a :href="'connections/'+recovery.connection.id" >
                        <svg class="icon" version="1.1" viewBox="0 0 1e3 1e3" ><path d="m957.4 736.5c0-64.2-40.9-105.2-104.9-105.2h-567.6-12.5v-13.3-264.9c0-27.2 0.3-54.4-0.2-81.5-0.3-16.9-13.7-30.4-30.2-31.6-16.3-1.1-31 9.8-34.2 25.9-0.9 4.3-0.7 8.8-0.7 13.2-0.1 113.1-0.1 226.2-0.1 339.3v13h-60.8c-59.9 0.1-102 42.1-102.2 101.8-0.1 40.8-0.1 81.5 0 122.3 0.1 59.9 42.1 102.1 101.8 102.1 236.4 0.1 472.8 0.1 709.2 0 60 0 102-41.9 102.2-101.8 0.3-39.9 0.2-79.6 0.2-119.3zm-654.4 90.4c-15.6 0.1-31.3 0-46.9 0s-31.3 0.1-46.9 0c-20-0.2-34.5-13.8-34.6-32.3-0.2-18.6 14.3-32.7 34.1-32.8 31.6-0.2 63.2-0.2 94.8 0 19.8 0.1 34.3 14.3 34.2 32.8-0.2 18.5-14.7 32.2-34.7 32.3zm328.2-0.4c-0.4 19-14.8 33.2-32.9 33-17.7-0.2-31.8-14.2-32.1-32.7-0.3-21.7-0.3-43.5 0-65.2 0.3-18.4 14.6-32.4 32.4-32.4 17.8-0.1 32.2 13.9 32.7 32.2 0.3 10.9 0.1 21.7 0.1 32.6-0.2 10.8 0 21.7-0.2 32.5zm130.4 0.8c-0.6 18.3-14.9 32.3-32.7 32.2s-32.1-14-32.4-32.5c-0.3-21.7-0.3-43.5 0-65.2 0.3-18.5 14.3-32.5 32.1-32.7 18.2-0.2 32.5 14 33 33 0.3 10.9 0 21.7 0 32.6 0.1 10.9 0.3 21.8 0 32.6z"/>
                            <path d="m696.5 285c-0.6 62.5-18.8 132.3-55.5 197.1-8 14.2-21.6 20.9-35.5 18.1-14.3-2.9-25.4-13.7-26-28.7-0.3-7.9 2.5-16.8 6.3-23.9 30.7-56.7 46.4-117 45.2-181.5-1.1-59.8-16.5-115.7-45-168.3-4.1-7.6-7-17.3-6.6-25.8 0.7-14.3 12.3-24.9 26.1-27.5 13.2-2.5 26.8 3.9 34.3 16.8 19.9 34.2 34.5 70.6 44 109 8.5 33.7 12.7 68 12.7 114.7z"/>
                            <path d="m566.1 269.1c-0.5 54.9-12.9 103.6-38.7 148.8-8.5 14.9-23.8 20.9-38.9 16-15-4.9-24.3-19-22.2-34.7 0.7-5.2 3-10.4 5.5-15.1 38.7-74.4 39.1-148.7-0.2-223-10.1-19.1-5.4-38.4 11.4-47.5 17-9.2 35.5-2.7 46 16.4 24.4 44.1 36.6 91.5 37.1 139.1z"/>
                            <path d="m435.5 279.7c-0.6 31.9-12.8 66.8-37.7 97-13.7 16.6-33.7 19.3-48.3 7s-15.5-31.4-2.4-48.1c31-39.2 31-87.1-0.1-126.4-13.1-16.6-12.1-35.8 2.6-48.1 14.4-12 34.1-9.3 47.7 6.5 24.3 28.4 38.2 66.5 38.2 112.1z"/></svg>
                    </a>
                    <a :href="'connections/'+recovery.connection.id +'/history' " >
                        <svg class="icon" version="1.1" viewBox="0 0 423.055 423.055" >
                            <g>
                                <path d="M362.021,10.869c-6.431-2.963-14.009-1.81-19.269,2.93l-27.755,24.575c-0.755,0.672-1.894,0.668-2.645-0.008L274.588,4.59
			c-6.83-6.12-17.17-6.12-24,0l-37.73,33.745c-0.759,0.678-1.906,0.678-2.665,0L172.459,4.59c-6.83-6.119-17.17-6.119-24,0
			L110.69,38.366c-0.756,0.676-1.898,0.679-2.658,0.007l-27.78-24.574c-7.37-6.554-18.658-5.893-25.212,1.477
			c-2.939,3.305-4.547,7.583-4.513,12.005v368.494c-0.066,9.878,7.888,17.939,17.766,18.005c4.425,0.03,8.703-1.582,12.009-4.523
			l27.755-24.575c0.755-0.672,1.894-0.668,2.645,0.008l37.764,33.776c6.83,6.12,17.17,6.12,24,0l37.734-33.745
			c0.759-0.678,1.906-0.678,2.665,0l37.734,33.744c6.831,6.117,17.17,6.117,24,0l37.771-33.776c0.756-0.676,1.898-0.679,2.658-0.007
			l27.78,24.574c7.373,6.551,18.66,5.885,25.211-1.488c2.934-3.302,4.54-7.575,4.508-11.993V27.281
			C372.621,20.202,368.489,13.747,362.021,10.869z M116.734,143.528h99.586c4.418,0,8,3.582,8,8s-3.582,8-8,8h-99.586
			c-4.418,0-8-3.582-8-8S112.316,143.528,116.734,143.528z M306.32,279.528H116.734c-4.418,0-8-3.582-8-8s3.582-8,8-8H306.32
			c4.418,0,8,3.582,8,8S310.738,279.528,306.32,279.528z M306.32,219.528H116.734c-4.418,0-8-3.582-8-8s3.582-8,8-8H306.32
			c4.418,0,8,3.582,8,8S310.738,219.528,306.32,219.528z"/>
                            </g>
                        </svg>
                    </a>

                    <a :href="'/recoveries/'+recovery.id+'/delete'" >
                        <svg class="icon" version="1.1" viewBox="0 0 384 384">
                            <g>
                                <path d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z"/>
                                <polygon points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			"/>
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
    import  * as constants  from  '../constants'
    import {TODAY} from "../constants";

    export default {
        props:['recoveries','users', 'villages'],

        created(){
            let userId = this.$route.query.u_id;

            this.selectedUserId = userId.toString();

        },

        data(){
            return{
                searchQuery: "",
                selectedUserId: "",
                selectedVillageId: "",
                selectedDay: "",
                days : [
                    constants.TODAY,
                    constants.LAST_SEVEN_DAYS,
                ],
            }
        },
        methods:{

        },

        computed:{
            filteredRecoveries (){
                let recoveriesList = [];


                console.log(this.selectedUserId);
                // filter by user

                recoveriesList = this.recoveries.filter(recovery => {
                    if(recovery.user.id.toString() === this.selectedUserId.toString()){
                        return true;
                    }else if(this.selectedUserId.toString().length <= 0){
                       return true;
                    }
                });

                // filter by village
                recoveriesList = recoveriesList.filter(recovery => {
                    if(recovery.connection.village_id.toString().match(this.selectedVillageId.toString())){
                        return true;
                    }
                });





                // filter by days
                if(this.selectedDay.length > 0){
                    recoveriesList = recoveriesList.filter(recovery => {

                        if(this.selectedDay.match(constants.TODAY)){
                            // filter today's recoveries
                            let recoveryDay = new Date(recovery.created_at);
                            let daysToSubtract = 1;
                            let last = new Date(Date.now() -  (daysToSubtract * 24 * 60 * 60 * 1000) ); // subtract last 1 day

                            if(recoveryDay >= last){
                                // is today
                                return true;
                            }
                        }else if(this.selectedDay.match(constants.LAST_SEVEN_DAYS)){
                            // console.log('filter by last seven days');
                            let recoveryDay = new Date(recovery.created_at);
                            let daysToSubtract = 7;
                            let last = new Date(Date.now() -  (daysToSubtract * 24 * 60 * 60 * 1000) ); // subtract last seven days

                            if(recoveryDay >= last){
                                return true;
                            }

                        }

                    });
                }





                return recoveriesList;
            },
            total(){
                return this.filteredRecoveries.length;
            }
        },
        methods:{
        }
    }
</script>

<style lang="scss">
</style>