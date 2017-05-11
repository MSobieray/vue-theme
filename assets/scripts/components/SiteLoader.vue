<template>
  <div class="site-loader" v-show="!loaded">
    <v-progress-circular indeterminate class="primary--text" />
  </div>

</template>

<script>
export default {
  name: 'site-loader',
  data () {
    return {
      loaded: false,
    }
  },
  mounted() {
    this.loaded = true;
  },
  methods: {
    load() {
      window.addEventListener('load', this.loaded = true, false )
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.site-loader {
  position: absolute;
  top: 50%;
  left: 50%;
}
</style>