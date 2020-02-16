<template>

    <div class="table_container villages">
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


        <span class="table-meta-info">There are total <strong>{{ total  }}</strong> Villages</span>
        <table>
            <thead>
            <tr>
<!--                <th>id</th>-->
                <th>Village Name</th>
                <th>Connections</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="village in filteredVillages">
<!--                <td>{{// village.id}}</td>-->
                <td> <strong>Name: </strong><span>{{village.name}}</span></td>
                <td class="neutral"><strong>Connections: </strong> <span>{{village.connections_count}}</span></td>
                <td class="icons-container"><a :href="'connections?village='+village.name">
                    <svg class="icon" version="1.1" viewBox="0 0 1e3 1e3" ><path d="m957.4 736.5c0-64.2-40.9-105.2-104.9-105.2h-567.6-12.5v-13.3-264.9c0-27.2 0.3-54.4-0.2-81.5-0.3-16.9-13.7-30.4-30.2-31.6-16.3-1.1-31 9.8-34.2 25.9-0.9 4.3-0.7 8.8-0.7 13.2-0.1 113.1-0.1 226.2-0.1 339.3v13h-60.8c-59.9 0.1-102 42.1-102.2 101.8-0.1 40.8-0.1 81.5 0 122.3 0.1 59.9 42.1 102.1 101.8 102.1 236.4 0.1 472.8 0.1 709.2 0 60 0 102-41.9 102.2-101.8 0.3-39.9 0.2-79.6 0.2-119.3zm-654.4 90.4c-15.6 0.1-31.3 0-46.9 0s-31.3 0.1-46.9 0c-20-0.2-34.5-13.8-34.6-32.3-0.2-18.6 14.3-32.7 34.1-32.8 31.6-0.2 63.2-0.2 94.8 0 19.8 0.1 34.3 14.3 34.2 32.8-0.2 18.5-14.7 32.2-34.7 32.3zm328.2-0.4c-0.4 19-14.8 33.2-32.9 33-17.7-0.2-31.8-14.2-32.1-32.7-0.3-21.7-0.3-43.5 0-65.2 0.3-18.4 14.6-32.4 32.4-32.4 17.8-0.1 32.2 13.9 32.7 32.2 0.3 10.9 0.1 21.7 0.1 32.6-0.2 10.8 0 21.7-0.2 32.5zm130.4 0.8c-0.6 18.3-14.9 32.3-32.7 32.2s-32.1-14-32.4-32.5c-0.3-21.7-0.3-43.5 0-65.2 0.3-18.5 14.3-32.5 32.1-32.7 18.2-0.2 32.5 14 33 33 0.3 10.9 0 21.7 0 32.6 0.1 10.9 0.3 21.8 0 32.6z"/>
                        <path d="m696.5 285c-0.6 62.5-18.8 132.3-55.5 197.1-8 14.2-21.6 20.9-35.5 18.1-14.3-2.9-25.4-13.7-26-28.7-0.3-7.9 2.5-16.8 6.3-23.9 30.7-56.7 46.4-117 45.2-181.5-1.1-59.8-16.5-115.7-45-168.3-4.1-7.6-7-17.3-6.6-25.8 0.7-14.3 12.3-24.9 26.1-27.5 13.2-2.5 26.8 3.9 34.3 16.8 19.9 34.2 34.5 70.6 44 109 8.5 33.7 12.7 68 12.7 114.7z"/>
                        <path d="m566.1 269.1c-0.5 54.9-12.9 103.6-38.7 148.8-8.5 14.9-23.8 20.9-38.9 16-15-4.9-24.3-19-22.2-34.7 0.7-5.2 3-10.4 5.5-15.1 38.7-74.4 39.1-148.7-0.2-223-10.1-19.1-5.4-38.4 11.4-47.5 17-9.2 35.5-2.7 46 16.4 24.4 44.1 36.6 91.5 37.1 139.1z"/>
                        <path d="m435.5 279.7c-0.6 31.9-12.8 66.8-37.7 97-13.7 16.6-33.7 19.3-48.3 7s-15.5-31.4-2.4-48.1c31-39.2 31-87.1-0.1-126.4-13.1-16.6-12.1-35.8 2.6-48.1 14.4-12 34.1-9.3 47.7 6.5 24.3 28.4 38.2 66.5 38.2 112.1z"/></svg>
                </a>
                    <a :href="'villages/'+ village.id +'/edit'" >
                        <svg class="icon" version="1.1" viewBox="0 0 383.947 383.947" >
                            <g>
                                <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			"/>
                                <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
				C386.027,77.92,386.027,64.373,377.707,56.053z"/>
                            </g>
                        </svg>
                    </a>
                    <a :href="'villages/'+ village.id +'/delete'" v-if="village.connections_count === 0" >
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