<template>

    <div class="table_container">
<!--        <div class="search-filter-contianer">-->
<!--            <div class="search-container" >-->
<!--                <input type="text"  placeholder="Search..." v-model="searchQuery" >-->
<!--                <svg class="icon" version="1.1" viewBox="0 0 21.164 21.921" >-->
<!--                    <path id="search" d="M21.826,19.967,16.609,14.54A8.847,8.847,0,1,0,9.835,17.7a8.756,8.756,0,0,0,5.071-1.6l5.257,5.467a1.154,1.154,0,1,0,1.664-1.6ZM9.835,2.309A6.542,6.542,0,1,1,3.293,8.851,6.549,6.549,0,0,1,9.835,2.309Z" transform="translate(-0.984)"/>-->
<!--                </svg >-->
<!--            </div>-->
<!--            <div class="filters-container">-->
<!--&lt;!&ndash;                    <div class="filter">&ndash;&gt;-->
<!--&lt;!&ndash;                        <select v-model="selectedState" >&ndash;&gt;-->
<!--&lt;!&ndash;                            <option value="" selected >Select State</option>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option v-for="state in states"> {{state}}</option>&ndash;&gt;-->
<!--&lt;!&ndash;                        </select>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            </div>-->

<!--        </div>-->

        <table>
            <thead>
            <tr>
                <th>Recover By</th>
                <th>Recover At</th>
                <th>Username</th>
                <th>Name</th>
<!--                <th>Total</th>-->
                <th>Amount Recovered</th>
                <th>Comments</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="recovery in filteredRecoveries">
                <td>{{recovery.user.name}}</td>
                <td>{{recovery.created_at}}</td>
                <td>{{recovery.connection.username}}</td>
                <td>{{recovery.connection.name}}</td>
                <td>{{recovery.amount}}</td>
                <td>{{recovery.comments}}</td>
                <td class="icons-container">
                    <a :href="'connections/'+recovery.connection.id" >
                        <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                            <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
                        </svg>
                    </a>
                    <a :href="'connections/'+recovery.connection.id +'/history' " >
                        <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                            <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
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
    export default {
        props:['recoveries'],

        data(){
            return{
                searchQuery: "",
                selectedState: '',
            }
        },
        methods:{

        },

        computed:{
            filteredRecoveries (){

                let recoveriesList = [];

                recoveriesList =  this.recoveries.filter( recovery =>{
                    if(recovery.user.name.match(this.searchQuery)){
                        return true;
                    }
                });

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