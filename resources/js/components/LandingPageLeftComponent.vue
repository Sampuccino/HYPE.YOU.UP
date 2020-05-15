<template>
  <div>
    <i class="el-icon-star-on el-icon--right display-4 d-inline text-velvet"></i>
    <i class="el-icon-star-on el-icon--right display-4 d-inline text-velvet"></i>
    <i class="el-icon-star-on el-icon--right display-4 d-inline text-velvet"></i>
    <i class="el-icon-star-on el-icon--right display-4 d-inline text-dark"></i>
    <i class="el-icon-star-on el-icon--right display-4 d-inline text-dark"></i>
    <h1 class="font-weight-bolder mt-2">HYPE.YOU.UP</h1>
    <h6>Reputation management for individuals</h6>
    <p class="font-italic">A site where you can find out what kind of person you are dealing with.</p>

    <div class="circular-segment mb-1 mx-auto">
      Reputation monitoring
    </div>

    <div class="circular-segment mb-1 mx-auto">
      Social media activity
    </div>

    <div class="circular-segment mb-1 mx-auto">
      Online presence
    </div>

    <div class="circular-segment mb-1 mx-auto">
      Anonymous reviews
    </div>

    <div class="circular-segment mb-1 mx-auto">
      Analysis insight
    </div>

  </div>
</template>

<script>
  export default {
    name: "LandingPageLeftComponent",
    data() {
      return {}
    }
  }
</script>

<style scoped>
  .circular-segment {
    width: 15rem;
    padding: 1rem;
    background: white;
    border: .05rem solid rgba(0, 0, 0, 0.26);
    box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04)
  }
</style>
