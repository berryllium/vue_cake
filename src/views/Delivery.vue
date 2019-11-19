<template>
  <section class="about">
    <div class="container">
      <h1>О нас</h1>
      <div v-html="contacts.delivery" class="page-text-content"></div>
    </div>
  </section>
</template>
<script>
export default {
  props: ["contacts"]
};
</script>