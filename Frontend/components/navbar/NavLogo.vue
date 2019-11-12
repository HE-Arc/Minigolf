<template>
  <transition name="fade">
    <Logo class="nav-logo" v-show="show" nav />
  </transition>
</template>

<script>
import Logo from "../Logo";

export default {
  name: "NavLogo",
  components: { Logo },
  props: {
    show: { type: Boolean }
  },
};
</script>

<style lang="scss" scoped></style>
