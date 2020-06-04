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
            <h4>
              <img :src="reviewee.image" class="circle-img-sm" alt="">
              {{ reviewee.name }}</h4>
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

                <el-alert
                  title="1 is Strong Agree, 3 is Neutral and while 5 is Strongly Disagree"
                  class="mb-2"
                  type="info">
                </el-alert>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} enjoys vibrant social events with lots of people.</span>
                  <el-slider :value="reviews.q1" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} is a person whom people can rarely upset.</span>
                  <el-slider :value="reviews.q2" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} is a person who if their friend is sad about something, their first instinct is to support them emotionally, not try to solve their problem.</span>
                  <el-slider :value="reviews.q3" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} relies on other people to be the ones to start a conversation and keep it going.</span>
                  <el-slider :value="reviews.q4" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} is rarely worried if they made a good impression on individuals they just met.</span>
                  <el-slider :value="reviews.q5" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} often finds it difficult to relate to people who let their emotions guide them.</span>
                  <el-slider :value="reviews.q6" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} can stay calm under a lot of pressure.</span>
                  <el-slider :value="reviews.q7" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} feels it is OK to step on others to get ahead in life.</span>
                  <el-slider :value="reviews.q8" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} is a person that when it comes to making life-changing choices, they mostly listen to their heart rather than their own head.</span>
                  <el-slider :value="reviews.q9" disabled :min=0 :max=5></el-slider>
                </div>

                <div class="block mb-3">
                  <span class="demonstration">{{ reviewee.name }} usually prefers to get their revenge rather than forgive.</span>
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
</style>
