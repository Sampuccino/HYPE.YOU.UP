<template>
  <div class="container">
    <div class="row">
      <div class="col-12 bg-white p-4 mb-3">

        <div class="row" style="overflow: scroll; height: 7rem">
          <div class="col-3 reviewee" v-for="(person, index) in reviewees" @click="onRevieweeSelected(person)">
            <div class="mb-2 bg-light p-2 mr-1">
              <img :src="person.image" class="circle-img-sm" alt=""/> <b>{{ person.name }}</b>
            </div>
          </div>
        </div>

      </div>
      <div class="col-4">
        <section class="bg-white p-4 mb-3">
          <article v-if="revieweeSelected" class="text-center">
            <h4 class="font-weight-bolder mb-2">{{ reviewee.name }}</h4>
            <el-rate
              :value="Number.parseFloat(reviewee.rating)"
              class="mb-2"
              disabled
              show-score
              text-color="#ff9900">
            </el-rate>
            <img :src="reviewee.image" class="img-fluid circle-img mb-2" alt=""/>
            <p>{{ reviewee.description }}</p>
          </article>
          <article v-else class="text-center">
            <input class="text-center mb-2" placeholder="i.e John Doe"
                   v-model="reviewee.name"
                   style="font-size: 1.5rem; border: none; border-bottom: 1px solid rgba(0,0,0,0.25)" />
            <el-rate
              :value="reviewee.rating"
              class="mb-2"
              show-score
              allow-half
              text-color="#ff9900">
            </el-rate>
            <img :src="reviewee.image" class="img-fluid circle-img mb-2" alt=""/>
            <el-input class="mt-2" placeholder="Enter a small description about the individual" v-model="reviewee.description"></el-input>
          </article>
        </section>
      </div>

      <div class="col-4">
        <section class="bg-white p-4 mb-3">
          <article>
            <el-alert
              title="1 is Strong Agree, 3 is Neutral and while 5 is Strongly Disagree"
              class="mb-2"
              type="info">
            </el-alert>

            <el-dropdown class="mt-2 mb-2" @command="handleCommand">
              <span class="el-dropdown-link">
                {{ typeSelected }} <i class="el-icon-arrow-down el-icon--right"></i>
              </span>
              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item :command="[0,'Conscientiousness']">Conscientiousness</el-dropdown-item>
                <el-dropdown-item :command="[1,'Extroversion']">Extroversion</el-dropdown-item>
                <el-dropdown-item :command="[2,'Agreeable']">Agreeable</el-dropdown-item>
                <el-dropdown-item :command="[3,'Openness']">Openness</el-dropdown-item>
                <el-dropdown-item :command="[4,'Nueroticism']">Nueroticism</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>

            <p>{{ typeSelectedDescription }}</p>

            <hr>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} enjoys vibrant social events with lots of people.</span>
              <el-slider v-model="review.q1" :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} is a person whom people can rarely upset.</span>
              <el-slider v-model="review.q2" :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} is a person who if their friend is sad about something, their first instinct is to support them emotionally, not try to solve their problem.</span>
              <el-slider :value="review.q3" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} relies on other people to be the ones to start a conversation and keep it going.</span>
              <el-slider :value="review.q4" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} is rarely worried if they made a good impression on individuals they just met.</span>
              <el-slider :value="review.q5" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} often finds it difficult to relate to people who let their emotions guide them.</span>
              <el-slider :value="review.q6" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} can stay calm under a lot of pressure.</span>
              <el-slider :value="review.q7" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} feels it is OK to step on others to get ahead in life.</span>
              <el-slider :value="review.q8" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} is a person that when it comes to making life-changing choices, they mostly listen to their heart rather than their own head.</span>
              <el-slider :value="review.q9" disabled :min=0 :max=5></el-slider>
            </div>

            <div class="block mb-3">
              <span class="demonstration">{{ reviewee.name }} usually prefers to get their revenge rather than forgive.</span>
              <el-slider :value="review.q10" disabled :min=0 :max=5></el-slider>
            </div>


          </article>
        </section>
      </div>

      <div class="col-4">
        <section class="bg-white p-4 mb-3">
          <article>

            <h6>Pros</h6>
            <el-input
              type="textarea"
              :rows="3"
              placeholder="Please input"
              v-model="review.pros">
            </el-input>

            <h6 class="mt-2">Cons</h6>
            <el-input
              type="textarea"
              :rows="3"
              placeholder="Please input"
              v-model="review.pros">
            </el-input>

            <hr>

            <h6 class="mt-2">Snapchat</h6>
            <el-input :placeholder="'Enter ' + reviewee.name + ' social link here...'" v-model="review.snapchat_url"></el-input>

            <h6 class="mt-2">Facebook</h6>
            <el-input :placeholder="'Enter ' + reviewee.name + ' social link here...'" v-model="review.facebook_url"></el-input>

            <h6 class="mt-2">Instagram</h6>
            <el-input :placeholder="'Enter ' + reviewee.name + ' social link here...'" v-model="review.instagram_url"></el-input>


          </article>
        </section>
      </div>

      <div class="col-12">
        <el-button type="primary" class="bg-dark float-right">Submit</el-button>
      </div>

    </div>
  </div>
</template>

<script>
  import axios from "axios";

  export default {
    name: "NewReviewComponent",
    data(){
      return {
        reviewees: '',
        revieweeSelected: false,
        reviewee: {
          name: 'John Doe',
          description: '',
          rating: Number.parseFloat(0.5),
          image: 'https://images.pexels.com/photos/1485726/pexels-photo-1485726.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=350&w=1260'
        },
        review: {
          pt_score: '',
          q1: 0,
          q2: 0,
          q3: 0,
          q4: 0,
          q5: 0,
          q6: 0,
          q7: 0,
          q8: 0,
          q9: 0,
          q10: 0,
          pros: '',
          cons: '',
          snapchat_url: '',
          facebook_url: '',
          instagram_url: ''
        },
        typeSelected: 'Personality Type : select for more info.',
        typeSelectedDescription: '',
        typeSelectedDescriptionArr: [
          'People who rank highest in conscientiousness are efficient, well-organized, dependable, and self-sufficient. They prefer to plan things in advance and aim for high achievement. People who rank lower in conscientiousness may view those with this personality trait as stubborn and obsessive.',
          'People who rank high in extroversion gain energy from social activity. They\'re talkative and outgoing and they\'re comfortable in the spotlight. Others may view them as domineering and attention-seeking.',
          'Those who rank high in agreeableness are trustworthy, kind, and affectionate toward others. They\'re known for their pro-social behavior and they\'re often committed to volunteer work and altruistic activities. Other people may view them as naïve and overly passive.',
          'People who rate high in openness are known for their broad range of interests and vivid imaginations. They\'re curious and creative and they usually prefer variety over rigid routines. They\'re known for their pursuits of self-actualization through intense, euphoric experiences like meditative retreats or living abroad. Others may view them as unpredictable and unfocused.',
          'Neurotic people experience a high degree of emotional instability. They\'re more likely to be reactive and excitable and they report higher degrees of unpleasant emotions like anxiety and irritability. Other people may view them as unstable and insecure.'
        ]
      }
    },
    created() {
      axios.get('/api/hyu/reviewees').then( res => {
        this.reviewees = res.data;
      });
    },
    methods: {
      onRevieweeSelected(person) {
        this.revieweeSelected = true;
        this.reviewee = person;
        console.warn(person);
      },
      handleCommand(command) {
        // command
        this.typeSelectedDescription = this.typeSelectedDescriptionArr[command[0]];
        this.typeSelected = command[1];
      }
    }
  }
</script>

<style scoped>
  .el-input__inner:first-child {
    font-size: 2rem !important;
  }

  .circle-img-sm {
    object-fit: cover;
    object-position: center;
    border-radius: 5rem;
    width: 2rem;
    height: 2rem;
  }

  .circle-img {
    object-fit: cover;
    object-position: center;
    border-radius: 5rem;
    width: 10rem;
    height: 10rem;
  }

  .reviewee {
    cursor: pointer;
  }

</style>
