<template>
  <div class="home">
    <h1 class="title">Home</h1>
    <h4>Already implemented!</h4>
    <ul>
      <li>Vue Router v3.x</li>
      <li>Vuex v3.x</li>
    </ul>
    <p>Here is the counter example with Vuex.</p>
    <h1 class="counter">{{ $store.state.counter.counter }}</h1>
    <p>
      {{ $store.state.counter.counter }}
      <sup>2</sup> = 
      {{ $store.getters['counter/powerCounter'] }}
    </p>
    <div class="counter-buttons">
      <button @click="$store.dispatch('counter/decreaseCounter')">-</button>
      <button @click="$store.dispatch('counter/increaseCounter')">+</button>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="sass" scoped>
.counter
  font-size: 80px
  margin: 0
</style>