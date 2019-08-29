<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header"><h3>Escort Calificación</h3></div>
               <div class="card-body">
                  <div class="row" v-for="escort in arrayescorts" :key="escort.id">
                        <div class="col-sm-2">
                           <img :src="escort.foto_principal" class="img-circle" style="width:45px;" alt="User Image">
                        </div>
                        <div class="col-sm-3" v-text="escort.nombres">
                        </div>
                        <div class="col-sm-5">
                           <star-rating v-model="rating" :increment="0.5" text-class="custom-text"></star-rating>
                        </div>
                        <div class="col-sm-2">  
                           <button @click="setRating" class="btn btn-primary">Valorar</button>
                        </div>
                  </div>
                  <!-- <div class="row">
                     <div class="col-sm-4"></div>
                     <div class="col-sm-4">
                        <star-rating v-model="rating" :increment="0.5" text-class="custom-text"></star-rating>
                     </div>
                     <div class="col-sm-4">
                        <button @click="setRating" class="btn btn-primary">Valorar</button>
                     </div>
                  </div> -->
                  
                  <!-- <h3 class="heading">Reviews</h3>
                  <div class="review-rating">
                     <div class="left-review">
                        <div class="review-title">{{ totalrate }}</div>
                        <div class="review-star">
                           <star-rating :inline="true" :read-only="true" :show-rating="false" v-model="totalrate" :increment="0.1" :star-size="20" active-color="#000000"></star-rating>
                        </div>
                        <div class="review-people"><i class="fa fa-user"></i> {{ totaluser }} total</div>
                     </div>
                     <div class="right-review">
                        <div class="row-bar">
                           <div class="left-bar">5</div>
                           <div class="right-bar">
                              <div class="bar-container">
                                 <div class="bar-5" style="width: 0%;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row-bar">
                           <div class="left-bar">4</div>
                           <div class="right-bar">
                              <div class="bar-container">
                                 <div class="bar-4" style="width: 0%;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row-bar">
                           <div class="left-bar">3</div>
                           <div class="right-bar">
                              <div class="bar-container">
                                 <div class="bar-3" style="width: 0%;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row-bar">
                           <div class="left-bar">2</div>
                           <div class="right-bar">
                              <div class="bar-container">
                                 <div class="bar-2" style="width: 0%;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row-bar">
                           <div class="left-bar">1</div>
                           <div class="right-bar">
                              <div class="bar-container">
                                 <div class="bar-1" style="width: 0%;"></div>
                              </div>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
   
</template>
<style>
   /* Star Rating */
   * {
   box-sizing: border-box;
   }
   .fa {
   font-size: 25px;
   }
   .left-bar {
   float: left;
   width: 5%;
   margin-top:10px;
   }
   .right-bar {
   margin-top:10px;
   float: left;
   width: 95%;
   }
   .row-bar:after {
   content: "";
   display: table;
   clear: both;
   }
   .review-rating:after {
   content: "";
   display: table;
   clear: both;
   }
   .left-review {
   float: left;
   width: 30%;
   margin-top:10px;
   text-align: center;
   }
   .right-review {
   float: left;
   width: 70%;
   margin-top:10px;
   }
   .review-title{
   font-size: 56pt;
   }
   .review-star{
   margin: 0 0 10px 0;
   }
   .review-people .fa{
   font-size: 11pt;
   }
   .bar-container {
   width: 100%;
   background-color: #f1f1f1;
   text-align: center;
   color: white;
   }
   .bar-5 {height: 18px; background-color: #57bb8a;}
   .bar-4 {height: 18px; background-color: #9ace6a;}
   .bar-3 {height: 18px; background-color: #ffcf02;}
   .bar-2 {height: 18px; background-color: #ff9f02;}
   .bar-1 {height: 18px; background-color: #ff6f31;}

   .star-rating{
         text-align: center;
         margin:auto;
         width: 45%;
   }
   .star-rating .fa:hover{
       color: orange;
   }
   .heading {
         font-size: 25px;
         color: #999;
         border-bottom: 2px solid #eee;
   }
   @media (max-width: 400px) {
         .left-bar, .right-bar, .left-review, .right-review {
         width: 100%;
       }
   }
   .custom-text {
         font-weight: bold;
         font-size: 1.9em;
         border: 1px solid #cfcfcf;
         padding-left: 10px;
         padding-right: 10px;
         border-radius: 5px;
         color: #999;
         background: #fff;
   }
</style>
<script>
   export default {
       data() {
           return {
             arrayescorts:[],
             rating:0
           }
       },
       created(){
         this.listarEscort();
       },     
         methods: {
           listarEscort (){
                let me = this;
                var url='listarEscort';
                axios.get(url).then(function (response) {
                    me.arrayescorts = response.data;
                   console.log(me.arrayescorts);
                 
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

           setRating() {
                let me = this;
                axios.post('rating',{
                    'escort_id': this.rating,
                    'user_id':this.rating,
                    'rating' : this.$set(this,'your_object', this.rating)

                }).then(function (response) {
                   console.log(response)

                }).catch(function (error) {
                    console.log(error);
                });
   
              },


           } 
     }
</script>