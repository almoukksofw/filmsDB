<template>
<div id="app">

</div>
</template>

<script>
export default {
    name : 'app',
    componentes:{

    }
}
</script>

<style scoped>

html {
  font: 62.5% / 1.15 sans-serif;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

#app {
  background: rgb(140, 31, 31);
  margin: 2rem 0 4rem 0;
  padding: 2rem;
  padding-top: 0;
  position: relative;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 2.5rem 5rem 0 rgba(0, 0, 0, 0.1);
}

body{
  width: 100%;
  max-width: 68rem;
  margin: 0 auto;
  font: 1.6rem/1.25 "Helvetica Neue", Helvetica, Arial, sans-serif;
  background-color: #f5f5f5;
  vertical-align: middle;
  color: #a22f2f;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
}

.label-wrapper {
  margin: 0;
  flex: 0 0 100%;
  text-align: center;
}
[class*="__lg"] {
  display: inline-block;
  width: 100%;
  font-size :1.9rem;
}
[class*="__lg"]:not(:last-child) {
  margin-bottom: 1rem;
}
@media screen and (min-width: 620px) {
  [class*="__lg"] {
    font-size: 2.4rem;
  }
}

@media screen and (min-width: 550px) {
  #apps {
    padding: 4rem;
  }
}
#apps > * {
  max-width: 50rem;
  margin-left: auto;
  margin-right: auto;
}
#apps > form {
  max-width: 100%;
}
#apps h1 {
  display: block;
  min-width: 100%;
  width: 100%;
  text-align: center;
  margin: 0;
  margin-bottom: 1rem;
}
</style>