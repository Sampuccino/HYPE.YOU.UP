<template>
    <div class="container">
      <div class="row">
        <div class="col-1">
          <section v-for="(review, idx) in reviewsWithComments">
            <el-button class="d-block" @click="handleSelect(idx, review.id)">Review</el-button>
          </section>
        </div>
        <div class="col-3 text-left">
          <section class="bg-white p-4 light-transluscent-border">
            <article  v-for="(comment) in comments.comments">
              <h6>
                <img :src="comment.image" alt="" class="d-inline mr-2 circle-img-sm img-fluid">
                {{ comment.name }}

                <span class="float-right">
                      <el-tag v-if="comment.recommend === 1" type="success">Recommend</el-tag>
                      <el-tag v-else type="danger">Recommend</el-tag>
                    </span>
              </h6>
              <el-rate class="text-center"
                       :value="comment.rating"
                       disabled
                       text-color="#ff9900">
              </el-rate>
              <p>
                {{ comment.body}}
              </p>
            </article>
          </section>
        </div>

        <div class="col-8">
          <section class="bg-white p-4 light-transluscent-border">
            <h4>{{ reviewee.name }}</h4>
            <hr>
            <article>
              <section>

                <table class="table">
                  <thead>
                  <tr>
                    <th>Personality Type (PT)</th>
                    <th>PT-Score</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{ reviews.personality }}</td>
                    <td>{{ reviews.pt_score }}</td>
                  </tr>
                  </tbody>
                </table>

                <h6>Pros</h6>
                <p>{{ reviews.pros }}</p>
                <h6>Cons</h6>
                <p>{{ reviews.cons }}</p>

                <table class="table">
                  <thead>
                  <tr>
                    <th>Snapchat</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{ reviews.snapchat_url }}</td>
                    <td>{{ reviews.facebook_url }}</td>
                    <td>{{ reviews.instagram_url }}</td>
                  </tr>
                  </tbody>
                </table>

                <hr>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q1" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q2" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q3" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q4" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q5" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q6" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q7" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q8" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q9" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">Question</span>
                  <el-slider :value="reviews.q10" disabled :min=0 :max=5></el-slider>
                </div>

              </section>
            </article>
          </section>

        </div>

      </div>
    </div>
</template>

<script>
  import axios from "axios";

  export default {
    name: "ReviewDetailedComponent",
    props: {
      reviewee: {
        type: Object
      }
    },
    data(){
      return {
        _reviewee: '',
        reviewsWithComments: '',
        comments: '',
        reviews: ''
      }
    },
    created(){
      this._reviewee = this.reviewee;
    },
    async mounted() {
      const {data} = await axios.get('/getReviewsWithComments/1');
      this.reviewsWithComments = data;
    },
    methods: {

      handleSelect(idx, rID) {
        console.warn('handleSelect ', idx, '   ', rID);
        this.reviews = this.reviewsWithComments.find(el => {
          return el.id === (idx+1)
        });
        this.comments = this.reviewsWithComments.find(el => {
          return el.id === (idx+1)
        });
      }
    }
  }
</script>

<style lang="scss" scoped>
  .light-transluscent-border {
    border: 1px solid rgba(0, 0, 0, 0.15);
  }

  .el-button {
    border-radius: 0 !important;

    &:hover {
        cursor: pointer;
     }
  }

  .circle-img {
    object-fit: cover;
    object-position: center;
    border-radius: 5rem;
    width: 10rem;
    height: 10rem;
  }

  .circle-img-sm {
    object-fit: cover;
    object-position: center;
    border-radius: 5rem;
    width: 2rem;
    height: 2rem;
  }

  .el-slider__runway.disabled .el-slider__bar {
    background-color: #409EFF !important;
  }
  .el-slider__bar {
    height: 6px;
    background-color: #409EFF !important;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    position: absolute;
  }

</style>
