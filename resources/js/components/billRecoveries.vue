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
                <th>Amount Recovered</th>
                <th>Comments</th>


            </tr>
            </thead>
            <tbody>
            <tr v-for="recovery in filteredRecoveries">
                <td>{{recovery.user.name}}</td>
                <td>{{recovery.created_at}}</td>
                <td>{{recovery.amount}}</td>
                <td>{{recovery.comments}}</td>
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