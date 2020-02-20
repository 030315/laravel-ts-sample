<template>
  <v-dialog v-model="show" width="500">
    <v-card>
      <v-card-text>
        <v-row>
          <v-col>
            <v-text-field
              label="相手先"
              suffix="様"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-autocomplete label="誰に？"></v-autocomplete>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-radio-group>
              <v-radio label="折り返しお電話お願いします"></v-radio>
              <v-radio label="またかけ直します"></v-radio>
              <v-radio label="電話があった事をお伝え下さい"></v-radio>
            </v-radio-group>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6">
            <datepicker v-model="forms.dateat"></datepicker>
          </v-col>
          <v-col>
            <v-select
              label="時"
              :items="hours"
              v-model="forms.hour"
            ></v-select>
          </v-col>
          <v-col>
            <v-select
              label="分"
              :items="minutes"
              v-model="forms.minute"
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-textarea
              label="備考"
            ></v-textarea>
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-actions>
        <v-spacer>
        </v-spacer>
        <v-btn color="primary">送信</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import { Form } from '../../types/receive'
import Datepicker from '../Form/Datepicker.vue'
import _ from 'lodash'
import moment, { Moment } from 'moment'

@Component({
  name: 'ReceiveForm',
  components: {
    Datepicker
  }
})
export default class ReveiveForm extends Vue {
  public show: boolean = false
  public hours?: Number[] = []
  public minutes?: Number[] = []
  public forms: Form = {
    dateat: undefined,
    hour: undefined,
    minute: undefined
  }

  /**
   * モーダルのオープン
   */
  public open () {
    this.show = true
    this.hours = _.range(0, 24)
    this.minutes = _.range(0, 60, 5)
    this.formInitialize()
  }

  /**
   * フォームの初期化
   */
  private formInitialize () : void {
    let now:Moment = moment()
    const dateat:Moment = moment(now.minute(Math.ceil(now.minute() / 5) * 5))

    this.forms.dateat = dateat.format('YYYY-MM-DD')
    this.forms.hour = dateat.hour()
    this.forms.minute = dateat.minute()
  }
}
</script>
