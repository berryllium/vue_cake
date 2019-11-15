<template>
  <div @click="$emit('closeForm',$emit.target)" @test1="order" class="popup-order">
    <Form />
  </div>
</template>

<script>
import Form from "@/components/Form"
export default {
  methods: {
    order() {
      console.log('order')
    }
  },
  components: {
    Form
  }
};
</script>

<style lang="less" scoped>
.hidden {
  display: none;
}
.popup-order {
  position: fixed;
  z-index: 2;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>