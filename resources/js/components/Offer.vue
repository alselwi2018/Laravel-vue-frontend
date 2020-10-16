<template>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
<div class="row">
                <div class="form-group d-flex col-sm-12">
                    <label>Pets</label>
                    <div class="float-right col-sm-3">
                <select v-model="pets"  class="form-control ">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                </div>
                </div>

                <div class="form-group d-flex col-sm-12">
                    <label>Beds</label>
                    <div class="float-right col-sm-3">
                <select v-model="beds"  class="form-control ">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control" v-model="search" placeholder="Search for Location or Property Name" />
                <div v-for="offer in filterPrices" v-bind:key="offer.__pf">
                    <div class="row">
                        <div class="col-sm-12 card m-1 p-2 ml-3">
                            <div class="text-center">
                                <h3><i class="fas fa-map-marker-alt"></i>&nbsp;{{ offer.location_name }}</h3>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-9">
                                    <p><i class='fas fa-building'></i> &nbsp;Property Name:<b>{{ offer.property_name }}</b></p>
                                    <p><span class="fas fa-calendar-alt"></span>&nbsp;Start Date: <b>{{offer.start_date}}</b></p>
                                    <p><span class="fas fa-calendar-alt"></span>&nbsp;End Date: <b>{{ offer.end_date }}</b></p>
                                    <p><i class="fas fa-umbrella-beach"></i>&nbsp;Near Beach: <b>{{ (offer.near_beach==1)?'Yes':'No' }}</b></p>
                                    <small class="bg-primary p-1 col-sm-4 text-white"><i class="fas fa-dog"></i>&nbsp;Pets:<b>{{ (offer.accepts_pets == 1)?'Yes':'No' }} &nbsp;<i class="fas fa-bed"></i>&nbsp;Sleeps:{{ offer.sleeps }} &nbsp;<i class="fas fa-bed"></i>&nbsp;Beds: {{ offer.beds }}</b></small>
                                </div>
                                <div class="col-sm-3"><span style="color:red;">£ {{ offer.percentage }}</span></div>
                            </div>
                        </div>

                    </div>

                </div>
                      <nav>
                            <ul class="pagination">
                                <li class="page-item" v-bind:class="[{disabled: !pagination.prev}]" @click="fetchOffers(pagination.prev)">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class=" page-item" disabled><a class="page-link">Page {{pagination.current_page}} of {{ pagination.last_page }}</a></li>

                                <li class="page-item" v-bind:class="[{ disabled: !pagination.next}]" @click="fetchOffers(pagination.next)">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name :"offer",
    data(){
        return{
            offers: [],
            search: '',
             pets:'',

            beds: '',
            offer:{
                __pk: '',
                _fk_property: '',
                start_date: '',
                end_date: '',
                percentages: '',
                property_name: '',
                near_beach: '',
                accepts_pets:'',
                sleeps:'',
                beds:'',
                location_name:''
            },
            pagination: {}

        }
    },
    computed:{
        filterOffers(){
            var vm = this, offer = vm.offer;
            return _.filter(offer, function(query){

            })
        }
    },
    created() {
        this.fetchOffers();
    },
    methods:{
        fetchOffers(page){
            page = page || 'api/Apioffer';
            fetch(page)
            .then(res => res.json())
            .then(res => {
               this.offers = res.data;
                this.makePagination(res.current_page, res.last_page, res.prev_page_url, res.next_page_url);
            }).catch(err => { console.log(err)});

        },
        makePagination(current, last,prev,next){
            let pagination = {
                current_page: current,
                last_page: last,
                prev: prev,
                next:next
            }
            this.pagination = pagination;
        }
    },
     computed: {
       filterPrices: function(){
            return this.offers.filter((priceBand)=>{
                var locatioAndperperties = priceBand.location_name.toLowerCase().match(this.search.toLowerCase()) || priceBand.property_name.toLowerCase().match(this.search.toLowerCase());
                var accept = priceBand.accepts_pets.match(this.pets);

                var bed = priceBand.beds.match(this.beds);
                return locatioAndperperties && accept && bed;

            })
        }
    },

}
</script>
