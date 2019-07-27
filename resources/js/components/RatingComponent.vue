<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Rating Component</div>
               <div class="card-body">
                  <h3>Escort Calificación</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <star-rating v-model="rating" :increment="0.5" text-class="custom-text"></star-rating>
                     </div>
                     <div class="col-md-6"></div>
                  </div>
                  <button @click="setRating" class="btn btn-primary">Publish</button>
                  <h3 class="heading"> Reviews</h3>
                  <div class="review-rating">
                     <div class="left-review">
                        <div class="review-title">3.5</div>
                        <div class="review-start">
                           <span class="fa fa-start"></span>
                           <span class="fa fa-start"></span>
                           <span class="fa fa-start"></span>
                           <span class="fa fa-start-half-o"></span>
                           <span class="fa fa-start-o"></span>
                        </div>
                        <div class="review-people"><i class="fa fa-user"></i>8.433 total</div>
                     </div>
                     <div class="right-review">
                        <div class="row-bar">
                           <div class="left-bar">5</div>
                           <div class="rigth-bar">
                              <div class="bar-container">
                                 <div class="bar-5" style="width:60%"></div>
                              </div>
                           </div>
                        </div>
                        <!--rigth bar-->
                     </div>
                     <!--row bar-->
                     <div class="row-bar">
                        <div class="left-bar">4</div>
                        <div class="rigth-bar">
                           <div class="bar-container">
                              <div class="bar-5" style="width:60%"></div>
                           </div>
                        </div>
                     </div>
                     <!--rigth bar-->
                     <!--row bar-->
                     <div class="row-bar">
                        <div class="left-bar">3</div>
                        <div class="rigth-bar">
                           <div class="bar-container">
                              <div class="bar-5" style="width:60%"></div>
                           </div>
                        </div>
                     </div>
                     <!--rigth bar-->
                     <!--row bar-->
                     <div class="row-bar">
                        <div class="left-bar">2</div>
                        <div class="rigth-bar">
                           <div class="bar-container">
                              <div class="bar-5" style="width:60%"></div>
                           </div>
                        </div>
                     </div>
                     <!--rigth bar-->
                     <!--row bar-->
                     <div class="row-bar">
                        <div class="left-bar">1</div>
                        <div class="rigth-bar">
                           <div class="bar-container">
                              <div class="bar-5" style="width:60%"></div>
                           </div>
                        </div>
                     </div>
                     <!--rigth bar-->
                     <!--row bar-->
                  </div>
                  <!--review-rating !-->
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<style>
   .fa {
   font-size: 25px;
   }
   .left-bar {
   float:left;
   width:5%;
   margin-top:10px;
   }
   .right-bar {
   margin-top:10px;
   float:left;
   width: 95%;
   }
   .row-bar:after {
       content:'';
       display: table;
       clear: both;
   }

    .review-rating:after {
        content:'';
        display:table;
        clear:both;
    }
    
    .left-review {
        float:left;
        width: 30%;
        margin-top:10px;
        text-align: center;
    }
   
     .right-review {
        float:left;
        width: 70%;
        margin-top:10px;
        text-align: center;
    }
    .review-title {
        font-size: 56pt;
    }
    .review-star {
        margin: 0 0 10px 0;
    }

    .review-people .fa {
        font-size: 11pt;
    }
     .bar-container {
         width:100%;
         background-color: #f1f1f1;
         text-align: center;
         color: white;
     }
      .bar-5 {height: 18px; background-color: #57bb8a;}
      .bar-4 {height: 18px; background-color: #9ace6a;}
      .bar-3 {height: 18px; background-color: #ffcf02;}
      .bar-2 {height: 18px; background-color: #ff9f02;}
      .bar-1 {height: 18px; background-color: #ff6f31;}
    .star-rating {
        text-align: center;
    }
    .heading {
        font-size: 25px;
        color: #999;
        border-bottom: 2px solid #eee;
    }
    @media (max-width: 400px) {
        .left-bar, .right-bar, .left-review, .right-review {
            width:100%;
       }
    }
    .custom-text {
        font-weight: bold;
        font-size:1.9em;
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
             escorts:[],
             rating:0
           }

       },
      
       created() {

       },
       methods: {
           setRating() {
                fetch('/rating/new', {
                    method: 'post',
                    body: JSON.stringify({ escort_id: '1', user:'1', rating:this.rating}),
                    headers: {
                        'content-type':'application/json'
                    }
                }).then(res => res.json())
                  .then(data => {
                      alert('gracias');
                  }).catch(err => {
                      alert('fallo');
                  });

           }
       }
   }
</script>