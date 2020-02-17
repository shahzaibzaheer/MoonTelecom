<template>
    <div class="table_container bills">
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
                <td class="neutral" ><strong>Month</strong> <span>{{ new Date(bill.billingMonth).toLocaleString('default',{month: 'long'}) }}</span></td>
                <td><strong>Bandwidth</strong> <span>{{bill.bandwidth}}</span></td>
                <td><strong>Due</strong> <span>{{bill.due}}</span></td>
                <td><strong>Month Bill</strong> <span>{{bill.billAmount}}</span></td>
                <td><strong>Total</strong> <span>{{bill.due + bill.billAmount}}</span></td>
                <td
                        :class="{
                            'danger': bill.amountPaid <= 0,
                            'success': bill.amountPaid > 0
                        }"
                ><strong>Paid</strong> <span>{{bill.amountPaid}}</span></td>
                <td
                        :class="{
                            'danger': ((bill.due + bill.billAmount) - bill.amountPaid) > 0,
                            'success': ((bill.due + bill.billAmount) - bill.amountPaid) <= 0
                        }"
                ><strong>Remaining</strong> <span>{{ (bill.due + bill.billAmount) - bill.amountPaid}}</span></td>
                <!--     status 0 means not recovered, 1 means not paid, 2 means paid -->
                <td v-if="bill.status == 0"   class="danger" ><strong>Status</strong> <span> Not Recovered</span></td>
                <td v-else-if="bill.status == 1" class="danger"  ><strong>Status</strong> <span> Not Paid</span></td>
                <td v-else="bill.status == 2" class="success" ><strong>Status</strong> <span> Paid</span></td>
                <td class="icons-container" v-if="bill.status !== 0">
                    <a :href="'/bills/'+bill.id+'/recoveries'" >
                        <svg class="icon" version="1.1" viewBox="0 0 424.98 424.98"  ><path d="m241.4 282.3c-1.587-1.738-3.595-3.038-5.67-4.121-4.518-2.356-9.459-3.785-14.365-5.075v38.016c7.963-0.9 17.105-3.79 21.286-11.224 1.996-3.551 2.393-7.914 1.58-11.867-0.441-2.142-1.352-4.108-2.831-5.729z"/><path d="m242.6 299.97c0.016-0.027 0.025-0.044 0.042-0.073-0.014 0.024-0.028 0.048-0.042 0.073z"/><path d="m184.01 221.53c-1.369 1.999-2.228 4.27-2.465 6.684-0.237 2.419-0.104 5.11 0.815 7.387 0.875 2.17 2.708 3.772 4.6 5.062 2.123 1.444 4.458 2.572 6.836 3.528 1.995 0.803 4.239 1.571 6.658 2.313v-34.4c-6.111 1.304-12.788 4.088-16.444 9.426z"/><path d="m242.8 299.62c-0.05 0.089-0.104 0.182-0.157 0.28 0.062-0.114 0.111-0.198 0.157-0.28z"/><path d="m243 299.26c0.013-0.024 0.015-0.026 0 0z"/><path d="m234.75 92.469c32.329-27.158 53.931-88.341 40.637-91.017-17.664-3.557-56.022 12.04-74.562 14.788-26.296 3.175-54.936-28.515-71.012-10.851-13.071 14.362 9.371 66.592 44.482 89.346-104.75 51.484-251.99 309.94 4.873 328.69 355.41 25.949 177.44-280.79 55.582-330.96zm30.523 203.83c-1.093 10.076-6.433 19.188-14.415 25.374-8.428 6.532-18.999 9.57-29.502 10.421v11.133c0 2.979-1.301 5.86-3.531 7.832-3.065 2.712-7.569 3.381-11.289 1.667-3.673-1.69-6.086-5.457-6.086-9.499v-12.168c-1.801-0.342-3.589-0.749-5.356-1.234-9.816-2.697-18.921-7.954-25.572-15.732-3.313-3.877-6.014-8.276-7.882-13.025-0.488-1.241-0.923-2.505-1.304-3.783-0.345-1.157-0.701-2.333-0.824-3.539-0.207-2.023 0.194-4.087 1.137-5.889 1.938-3.707 6.022-5.946 10.192-5.574 4.104 0.364 7.701 3.212 8.993 7.124 0.398 1.205 0.668 2.44 1.115 3.632 0.443 1.184 0.978 2.335 1.607 3.431 1.242 2.158 2.798 4.148 4.59 5.875 3.694 3.559 8.399 5.872 13.304 7.248v-41.362c-9.591-2.483-19.491-5.69-27.411-11.848-3.849-2.994-7.115-6.714-9.254-11.117-2.257-4.647-3.192-9.824-3.23-14.966-0.039-5.221 0.953-10.396 3.131-15.153 2.04-4.454 4.977-8.453 8.578-11.768 7.7-7.087 17.928-11.04 28.187-12.492v-11.557c0-2.978 1.301-5.86 3.531-7.832 3.066-2.711 7.568-3.381 11.289-1.667 3.672 1.691 6.086 5.457 6.086 9.499v11.494c1.367 0.172 2.73 0.378 4.086 0.624 10.074 1.823 19.927 5.983 27.294 13.246 3.49 3.44 6.347 7.539 8.356 12.009 0.561 1.247 1.052 2.523 1.477 3.824 0.396 1.213 0.794 2.462 0.983 3.728 0.302 2.021-6e-3 4.109-0.871 5.958-1.772 3.788-5.746 6.2-9.927 6.021-4.108-0.179-7.83-2.854-9.301-6.694-0.438-1.142-0.657-2.351-1.104-3.49-0.451-1.153-1.035-2.253-1.708-3.292-1.308-2.02-3.003-3.752-4.938-5.179-4.19-3.094-9.272-4.706-14.35-5.607v39.582c6.035 1.445 12.075 3.021 17.857 5.301 8.739 3.446 17.02 8.73 21.79 17.062-0.74-1.298-1.46-2.563 0.025 0.043 1.458 2.56 0.762 1.34 0.03 0.057 3.795 6.688 5.042 14.685 4.217 22.282z"/><path d="m242.49 300.17c-0.061 0.109-0.114 0.205-0.156 0.278 0.036-0.063 0.09-0.158 0.156-0.278z"/></svg>
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