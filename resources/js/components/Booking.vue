<template>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4 bordered">
            <div>
                All Bookings
            </div>
        </div>
        <div class="col-sm-8" >
            <input type="text" class="form-control" v-model="search" placeholder="Search for Location or Property Name" />
            <div v-for="booking in filterBookings" v-bind:key="booking.__pk">
            <div class="row">
                <div class="col-sm-12 m-1">
            <div class="card">
                <div class="card-header bg-primary text-white text-center"><i class="fas fa-map-marker-alt"></i>&nbsp;{{ booking.location_name}}</div>
                <div class="card-body">
                    <i class='fas fa-building'></i> &nbsp;Property Name: {{ booking.property_name }}
                    <p><span class="fas fa-calendar-alt"></span> Date From: <b>{{ booking.start_date }}</b></p>
                    <p><span class="fas fa-calendar-alt"></span> Date To: <b>{{ booking.end_date }}</b></p>
                   <p><i class="fas fa-umbrella-beach"></i>&nbsp; Near Beach <b>{{ (booking.near_beach)? 'Yes':'No' }}</b></p>
                   <p>Pets <i class="fas fa-dog"></i>&nbsp;  <b>{{ (booking.accepts_pets)? 'Yes': 'No' }}</b></p>
                </div>
                </div>
            </div>
            </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item" v-bind:class="[ { disabled: !pagination.previous}]" @click="fetchBookings(pagination.previous)">
                    <a class="page-link" href="#" >Previous</a>
                    </li>
                     <li class="page-item" disabled><a class="page-link" >Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                   <!-- <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                    </li> -->

                    <li class="page-item" v-bind:class="[ { disabled: !pagination.next}]" @click="fetchBookings(pagination.next)">
                    <a class="page-link" href="#" >Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

</template>
<script>

export default {
    data(){
        return{
            search:'',
            bookings: [],
            booking: {
                __pk: '',
                _fk_property:'',
                start_date: '',
                end_date: '',
                _fk_location: '',
                property_name: '',
                near_beach: '',
                accepts_pets: '',
                sleeps: '',
                beds: '',
                location_name:''
            },
            pagination: {}
        }
    },
    created() {
        this.fetchBookings();

    },
    methods: {
        fetchBookings(page_url){
            page_url = page_url || 'api/Apibooking'
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.bookings = res.data;
                this.makePagination(res.current_page, res.last_page,res.prev_page_url,res.next_page_url);
            }).catch(err => console.log(err));
        },
        makePagination(first,last,prev,next){
            let pagination ={
            first_page: first,
            last_page : last,
            previous : prev,
            next : next
            }
            this.pagination = pagination;
        }

    },
    computed: {
        filterBookings: function(){
            return this.bookings.filter((booking)=>{
                return booking.location_name.match(this.search) || booking.property_name.match(this.search);
            })
        }
    }

}
</script>
