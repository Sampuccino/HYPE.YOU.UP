<template>
  <div class="container">
    <section class="row text-center">
      <a v-show="reviewees" v-for="(r, index) in reviewees" :key="index" class="col-6 mb-4 light-hover" :href="'reviewee/'+r.id">
        <div class="p-3 bg-white light-transluscent-border">
          <div class="row">
          <!--<div class="col-6 apply-right-side-divider my-auto">-->
          <div class="col-6 my-auto">
            <h4 class="font-weight-bolder mb-2">{{ r.name }}</h4>
            <el-rate
              :value="r.rating"
              class="mb-2"
              disabled
              show-score
              text-color="#ff9900"
              :score-template="r.rating+''">
            </el-rate>
            <img :src="r.image" class="img-fluid circle-img mb-2" alt="">
            <p>{{ r.description }}</p>
          </div>
          <div class="col-6 apply-right-side-divider">
            <section>
              <article class="bottom-divider mb-2 p-2">
                <h1 class="font-weight-bolder">{{ returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[0] }}</h1>
                <h5>{{ returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[2] }}</h5>
                <div class="row bg-dark p-1">
                  <div v-show="returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[0] <= 1.66" class="col-4 bg-red"></div>
                  <div v-show="returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[0] <= 3.22 && returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[0] > 1.66" class="col-4 offset-4 bg-yellow"></div>
                  <div v-show="returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[0] >= 3.23" class="col-4 offset-8 bg-green"></div>
                </div>
              </article>
              <article class="bottom-divider mb-2">
                <apexchart :id="index"
                           type="radialBar"
                           height="250" width="250"
                           :options="returnOptions(returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[1])"
                           :series="returnSeries(returnAveragedPTScoreAndRecommendation(r.reviews_pt_scores)[1])"/>
              </article>
              <article v-if="r.latest_review.comment !== null">
                <h6>
                  <img :src="r.latest_review.comment.image" alt="" class="d-inline mr-2 circle-img-sm img-fluid">
                  {{ r.latest_review.comment.name }}

                  <span class="float-right">
                    <el-tag v-if="r.latest_review.comment.recommend === 1" type="success">Recommend</el-tag>
                    <el-tag v-else type="danger">Recommend</el-tag>
                  </span>
                </h6>
                <el-rate class="text-center"
                  :value="r.latest_review.comment.rating"
                  disabled
                  text-color="#ff9900">
                </el-rate>
                <p class="text-center">
                  {{ r.latest_review.comment.body}}
                </p>
              </article>
            </section>
          </div>
          </div>
        </div>
      </a>
    </section>
  </div>
</template>

<script>
  import VueApexCharts from 'vue-apexcharts'
  import axios from "axios";

  Vue.component('apexchart', VueApexCharts);

  export default {
    name: "RevieweeMinimalComponent",
    data() {
      return {
        reviewees: '',
        series: [70],
      }
    },
    async created() {
      const {data} = await axios.get('/api/hyu/review');
      this.reviewees = data;
    },
    methods: {
      returnSeries(d){
        return [d];
      },
      returnOptions(recommendationPercentile) {
        /*
        * > 70% = Green
        * < 70% > 40% Yellow
        * < 40% Red
        * */
        const rp = Number.parseInt(recommendationPercentile);
        let co = {
          chart: {
            height: 250,
              type: 'radialBar',
          },
          colors: ["#20E647"],
          plotOptions: {
            radialBar: {
              hollow: {
                size: '70%',
              },
            },
          },
          labels: ['Recommend'],
        };

        if (rp >= 70) {
          co.colors = ['#0BAA42'];
        } else if (rp >= 40) {
          co.colors = ['#FFC90A'];
        } else {
          co.colors = ['#A91924'];
        }

        return co;
      },
      returnAveragedPTScoreAndRecommendation(scores) {
        // Array of scores
        let s = 0;
        let r = 0;
        let increments = 0;
        scores.forEach(el => {
          s+= Number.parseFloat(el.pt_score);
          r+= Number.parseFloat(el.recommend);

          // Most Common Personality Category

          increments++;
        });
        return [Number.parseFloat((s / increments)).toFixed(2),
                Number.parseFloat((r / increments) * 100).toFixed(2),
                scores[scores.length-1].personality];
      }
    }
  }
</script>

<style lang="scss" scoped>
  a {
    text-decoration: none;
    color: black;
  }

  .light-transluscent-border {
    border: 1px solid rgba(0, 0, 0, 0.15);
  }

  .apply-right-side-divider {
    border-left: 1px solid rgba(0, 0, 0, 0.15);
  }

  .bottom-divider {
    border-bottom: 1px solid rgba(0, 0, 0, 0.15);
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

  span.el-rate__text {
    font-size: 1rem !important;
  }

  .bg-green {
    background: #7CD800;
    height: 1rem;
  }

  .bg-yellow {
    background: #FFC90A;
    height: 1rem;
  }

  .bg-red {
    background:  #A91924;
    height: 1rem;
  }

  .light-hover {
    cursor: pointer;
    transition: all ease-out .5s;

    &:hover {
      transform: scale(1.05);
      transition: all ease-in-out .5s;
      z-index: 999;
    }
  }

</style>
