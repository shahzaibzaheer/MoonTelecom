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
<!--                    <div class="filter">-->
<!--                        <select v-model="selectedState" >-->
<!--                            <option value="" selected >Select State</option>-->
<!--                            <option v-for="state in states"> {{state}}</option>-->
<!--                        </select>-->
<!--                    </div>-->
            </div>

        </div>


        <span>There are total <strong>{{ total  }}</strong> Villages</span>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Village Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="village in filteredVillages">
                <td>{{village.id}}</td>
                <td>{{village.name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    export default {
        props:['villages'],

        data(){
            return{
                searchQuery: "",
                selectedState: '',
                states:[
                ],
            }
        },

        computed:{
            filteredVillages (){

                let filteredVillagesList = [];

                filteredVillagesList =  this.villages.filter(village =>{
                    if(village.name.match(this.searchQuery)){
                        return true;
                    }
                });


                // console.log('filter by state: '+ this.selectedState);

                // if(this.selectedState.length>0){
                //     if(this.selectedState === "Active"){
                //         filteredVillagesList = filteredVillagesList.filter(user => {
                //             return !user.isBlocked;
                //         });
                //     }else if(this.selectedState === "Blocked"){
                //         filteredVillagesList = filteredVillagesList.filter(user => {
                //             return user.isBlocked;
                //         });
                //     }
                // }

                return filteredVillagesList;
            },
            total(){
                return this.filteredVillages.length;
            }
        },
        methods:{
        }
    }
</script>

<style lang="scss">
</style>