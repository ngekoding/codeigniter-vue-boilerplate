<template>
  <div class="basic-layout container">
    <div class="nav-wrap">
      <div class="nav-header">
        <h2 class="title">Basic Layout</h2>
      </div>
      <ul class="nav-left">
        <li>
          <router-link :to="{ name: 'Home' }">Home</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'About' }">About</router-link>
        </li>
      </ul>
    </div>
    <!-- Here the page content -->
    <div class="content-wrap">
      <div class="content-header"></div>
      <div class="content">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
