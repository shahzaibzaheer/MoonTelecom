<template>

    <div class="table_container">
        <div class="search-filter-contianer">
            <div class="search-container" >
                <input type="text"  placeholder="Search..." v-model="searchQuery" @keyup.enter="filterUsers">
                <svg class="icon" version="1.1" viewBox="0 0 21.164 21.921" @click="filterUsers" >
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
            </div>

        </div>


        <span>There are total <strong>{{ total  }}</strong> users</span>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>State</th>
                <th>Recoveries</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in filteredUsers">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td v-if="user.isAdmin">Admin</td>
                <td v-else>Employee</td>
                <td v-if="user.isBlocked" class="error">Blocked</td>
                <td v-else class="success">Active</td>
                <td>50</td>
                <td class="icons-container">
                    <a :href="'users/'+user.id+'/block'">
                        <svg class="icon danger" version="1.1" viewBox="0 0 23.441 23.441"   >
                            <path  d="M11.721,0A11.721,11.721,0,1,0,23.441,11.721,11.725,11.725,0,0,0,11.721,0ZM3.313,11.721a8.437,8.437,0,0,1,8.408-8.439,8.3,8.3,0,0,1,4.751,1.469L4.782,16.472A8.3,8.3,0,0,1,3.313,11.721Zm8.408,8.408A8.3,8.3,0,0,1,6.97,18.659L18.659,6.97a8.3,8.3,0,0,1,1.469,4.751A8.39,8.39,0,0,1,11.721,20.128Z" />
                        </svg>
                    </a>
                    <a :href="'users/'+user.id+'/edit'">
                        <svg class="icon" version="1.1" viewBox="0 0 22.763 22.763"  >
                            <path d="M0,81.888v4.743H4.743l13.995-14-4.743-4.743Z" transform="translate(0 -63.868)" />
                            <path d="M265.724,3.323,262.77.37a1.267,1.267,0,0,0-1.79,0l-2.315,2.315,4.743,4.743,2.315-2.315A1.267,1.267,0,0,0,265.724,3.323Z" transform="translate(-243.33)"/>
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
        props:['users'],

        data(){
            return{
                searchQuery: "",
                selectedState: '',
                states:[
                    'Active',
                    'Blocked'
                ],
            }
        },

        computed:{
            filteredUsers (){

                let filteredUsersList = [];

                filteredUsersList =  this.users.filter(user =>{
                    
                    if(user.name.match(this.searchQuery)){
                        return true;
                    }
                    if(user.email.match(this.searchQuery)){
                        return true;
                    }
                });


                // console.log('filter by state: '+ this.selectedState);

                if(this.selectedState.length>0){
                    if(this.selectedState === "Active"){
                        filteredUsersList = filteredUsersList.filter(user => {
                            return !user.isBlocked;
                        });
                    }else if(this.selectedState === "Blocked"){
                        filteredUsersList = filteredUsersList.filter(user => {
                            return user.isBlocked;
                        });
                    }
                }



                return filteredUsersList;
            },
            total(){
                return this.filteredUsers.length;
            }
        },
        methods:{
            filterUsers(){
                // let query = this.searchQuery;
                // this.searchQuery = "";
                // console.log('submit search query: '+this.searchQuery);
            },

        }
    }
</script>

<style lang="scss">
</style>