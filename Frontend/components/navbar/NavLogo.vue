<template>
  <transition name="fade">
    <Logo class="nav-logo" v-show="show" nav />
  </transition>
</template>

<script>
import Logo from "../Logo";

export default {
  components: { Logo },
  props: {
    show: { type: Boolean }
  },
  name: "NavLogo",

  watch: {
    show(newValue, oldValue) {
      console.log(newValue);
    }
  }
};
</script>

<style lang="scss" scoped></style>
