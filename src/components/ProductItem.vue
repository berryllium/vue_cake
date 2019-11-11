<template>
  <div :item="item" class="product-item">{{item.id}}</div>
</template>

<script>
export default {
  props: ['item']
}
</script>

<style lang="less" scoped>
@import '../style/variables.less';
.product-item {
  width: 350px;
  height: 350px;
  border: 1px solid black;
  background-image: url('http://placehold.it/350');
  @media (max-width: @phone) {
    margin: 0 auto;
  }
}
  
</style>
