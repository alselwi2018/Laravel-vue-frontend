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
                <div class="row">
                <div class="form-group col-sm-6">

                    <label class="">Price Min</label>&nbsp;<input type="text" class="form-control " :min="min" :max="max" v-model="minimum">

                </div>
                <div class="form-group col-sm-6">
                    <label class="">Price Max</label>&nbsp; <input type="text" class="form-control "  :min="min" :max="max" v-model="maximum">
                </div>
                </div>
                <div class="form-group d-flex col-sm-12">
                    <label>Beds</label>
                    <div class="float-right col-sm-3">
                <select v-model="beds" class="form-control ">

                    <option v-for="bed in allBeds" v-bind:key="bed">{{bed}}</option>
                </select>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-8">
                 <input type="text" class="form-control" v-model="search" placeholder="Search for Location or Property Name" />
                <div v-for="pricesBand in filterPrices" v-bind:key="pricesBand.__pk">
                    <div class="row">
                        <div class="col-sm-12 card m-1 p-2 ml-3">
                            <div class="text-center">
                                <h3><i class="fas fa-map-marker-alt"></i>&nbsp;{{ pricesBand.location_name }}</h3>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-9">
                                    <p><i class='fas fa-building'></i> &nbsp;Property Name:<b>{{ pricesBand.property_name }}</b></p>
                                    <p><span class="fas fa-calendar-alt"></span>&nbsp;Start Date: <b>{{pricesBand.start_date}}</b></p>
                                    <p><span class="fas fa-calendar-alt"></span>&nbsp;End Date: <b>{{ pricesBand.end_date }}</b></p>
                                    <p><i class="fas fa-umbrella-beach"></i>&nbsp;Near Beach: <b>{{ (pricesBand.near_beach)?'Yes':'No' }}</b></p>
                                    <small class="bg-primary p-1 col-sm-4 text-white"><i class="fas fa-dog"></i>&nbsp;Pets:&nbsp; <b>{{ (pricesBand.accepts_pets == 1)?'Yes':'No' }} &nbsp;<i class="fas fa-bed"></i>&nbsp;Sleeps:{{ pricesBand.sleeps }} &nbsp;<i class="fas fa-bed"></i>&nbsp;Beds: {{ pricesBand.beds }}</b></small>
                                </div>
                                <div class="col-sm-3"><span style="color:red;">£ {{ pricesBand.price }}</span></div>
                            </div>
                        </div>

                    </div>

                </div>
                      <nav>
                            <ul class="pagination">
                                <li class="page-item" v-bind:class="[{disabled: !pagination.prev}]" @click="fecthPriceband(pagination.prev)">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class=" page-item" disabled><a class="page-link">Page {{pagination.current_page}} of {{ pagination.last_page }}</a></li>

                                <li class="page-item" v-bind:class="[{ disabled: !pagination.next}]" @click="fecthPriceband(pagination.next)">
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
    name :"price-band",
    data(){
        return{
            search: '',
            pricesBands :[],
            pets:'',
            min: 0,
            max: 0,
            minimum: 0,
            maximum: 1000,
            beds: '',

            allBeds: [1,2,3,4,5,6,7,8],

            priceBand :{
                start_date: '',
                end_date: '',
                price: '',
                propery_name: '',
                near_beach: '',
                accepts_pets: '',
                sleeps: '',
                beds: '',
                location: ''
            },
            pagination: {}
        }
    }
    ,created() {
        this.fecthPriceband()
    },
    methods: {
        fecthPriceband(page){
            page = page || 'api/Apipriceband';
            fetch(page)
            .then(res => res.json())
            .then(res => {
                this.pricesBands = res.data;
                this.makePagination(res.current_page, res.last_page,res.prev_page_url,res.next_page_url)
            }).catch(err=>{
                console.log(err.data);
            })

        },
        makePagination(first, last, prev, next){
            let pagination = {
                current_page: first,
                last_page: last,
                prev: prev,
                next: next

            }
            this.pagination = pagination;
        }

    },
    computed: {
        filterPrices: function(){
            return this.pricesBands.filter((priceBand)=>{
                var locatioAndperperties = priceBand.location_name.toLowerCase().match(this.search.toLowerCase()) || priceBand.property_name.toLowerCase().match(this.search.toLowerCase());
                var accept = priceBand.accepts_pets.match(this.pets);
                var m = Math.min(priceBand.price);
                var price = m >= this.minimum;
                var maMath = Math.max(priceBand.price);
                var mx =  this.maximum >= maMath;
                var bed = priceBand.beds.match(this.beds);


                return locatioAndperperties && accept && price && mx && bed ;

            })
        }

    }

}
</script>
