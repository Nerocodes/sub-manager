<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Logo from '@/components/Logo.vue'
import './assets/tailwind.css'
</script>

<template>
  <div>
    <header>
      <div class="wrapper">
        <Logo msg="Sub Manager" />

        <nav>
          <RouterLink to="/">Subscriptions</RouterLink>
          <RouterLink to="/fields">Fields</RouterLink>
        </nav>
      </div>
    </header>

    <RouterView />
  </div> 
</template>

<style>
@import '@/assets/base.css';

#app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 2rem;

  font-weight: normal;
}

header {
  line-height: 1.5;
  max-height: 100vh;
  margin-bottom: 2rem;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

a,
.green {
  text-decoration: none;
  color: hsla(160, 100%, 37%, 1);
  transition: 0.4s;
}

.form-group {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}

input[type=text], input[type=email], select {
  background-color: hsla(160, 100%, 37%, 0.2);
  color: white;
  border: 1px solid white;
  padding: 0.5rem;
  margin: 0.5rem;
}

button, input[type=submit] {
  border: 1px solid hsla(160, 100%, 37%, 1);
  border-radius: 5px;
  padding: 0.5rem;
  margin: 1rem 0rem;
  color: hsla(160, 100%, 37%, 1);
  cursor: pointer;
}

button:hover, input[type=submit]:hover {
  background-color: hsla(160, 100%, 37%, 1);
  color: white;
}

table {
  margin: 1rem 0rem;
}

td, th {
  border: 2px solid var(--color-border);
  padding: 0.5rem;
}

label, th {
  text-transform: capitalize;
}

@media (hover: hover) {
  a:hover {
    background-color: hsla(160, 100%, 37%, 0.2);
  }
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  body {
    display: flex;
    place-items: center;
  }

  #app {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 0 2rem;
  }

  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
