<template>
  <v-menu
    ref="menu"
    v-model="menu"
    :close-on-content-click="false"
    transition="scale-transition"
    offset-y
    min-width="290px"
  >
    <template v-slot:activator="{ on }">
      <v-text-field
        v-model="inputValue"
        label="日付"
        prepend-icon="mdi-calendar"
        readonly
        v-on="on"
      ></v-text-field>
    </template>
    <v-date-picker
      v-model="inputValue"
      no-title
      scrollable
      locale="jp-ja"
      :day-format="date => new Date(date).getDate()"
    ></v-date-picker>
  </v-menu>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

@Component

export default class Datepicekr extends Vue {
  private menu: boolean = false

  @Prop({ default: null })
  public value!: string

  /**
   * 選択された値のGetter
   */
  get inputValue () : string {
    return this.value
  }

  /**
   * 選択した値のSetter
   */
  set inputValue (value: string) {
    this.$emit('input', value)
  }
}
</script>
