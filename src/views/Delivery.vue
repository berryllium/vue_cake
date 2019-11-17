<template>
  <section class="delivery">
    <div class="container">
      <h1>Доставка</h1>
      <p>{{contacts.delivery}}</p>
    </div>
  </section>
</template>
<script>
export default {
  props: ["contacts"]
};
</script>
