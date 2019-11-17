<template>
  <section class="about">
    <div class="container">
      <h1>О нас</h1>
      <p>{{contacts.about}}</p>
    </div>
  </section>
</template>
<script>
export default {
  props: ['contacts']
}
</script>