<template>
    <section class="container">
      <h1>Наш ассортимент</h1>
      <products />
    </section>
</template>

<script>
import Products from "@/components/Products";
export default {
  components: {
    products: Products
  }
};
</script>