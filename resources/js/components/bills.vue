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


<!--        <span>There are total <strong>{{ total  }}</strong> Bills</span>-->
        <table>
            <thead>
            <tr>
                <th>Billing Month</th>
                <th>Bandwidth</th>
                <th>Due</th>
                <th>Month Bill</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Remaining</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="bill in bills">
                <td>{{bill.billingMonth}}</td>
                <td>{{bill.bandwidth}}</td>
                <td>{{bill.due}}</td>
                <td>{{bill.billAmount}}</td>
                <td>{{bill.due + bill.billAmount}}</td>
                <td>{{bill.amountPaid}}</td>
                <td>{{ (bill.due + bill.billAmount) - bill.amountPaid}}</td>
                <!--     status 0 means not recovered, 1 means not paid, 2 means paid -->
                <td v-if="bill.status == 0"> Not Recovered</td>
                <td v-else-if="bill.status == 1"> Not Paid</td>
                <td v-else="bill.status == 2"> Paid</td>
                <td class="icons-container" v-if="bill.status !== 0">
                    <a :href="'/bills/'+bill.id+'/recoveries'" >
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
                </td>
                <td class="icons-container" v-if="bill.status === 0">
                    <a :href="'/connections/'+bill.connection_id+'/invoice'" >
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
        props:['bills'],

        data(){
            return{
                // searchQuery: "",
                // selectedState: '',
                // states:[
                // ],
            }
        },

        computed:{
            // filteredVillages (){
            //
            //     let filteredVillagesList = [];
            //
            //     filteredVillagesList =  this.villages.filter(village =>{
            //         if(village.name.match(this.searchQuery)){
            //             return true;
            //         }
            //     });
            //
            //
            //     // console.log('filter by state: '+ this.selectedState);
            //
            //     // if(this.selectedState.length>0){
            //     //     if(this.selectedState === "Active"){
            //     //         filteredVillagesList = filteredVillagesList.filter(user => {
            //     //             return !user.isBlocked;
            //     //         });
            //     //     }else if(this.selectedState === "Blocked"){
            //     //         filteredVillagesList = filteredVillagesList.filter(user => {
            //     //             return user.isBlocked;
            //     //         });
            //     //     }
            //     // }
            //
            //     return filteredVillagesList;
            // },
            // total(){
            //     return this.filteredVillages.length;
            // }
        },
        methods:{
        }
    }
</script>

<style lang="scss">
</style>