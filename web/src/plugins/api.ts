import axios from 'axios'
import _ from 'lodash'
// axiosのデフォルトオプション
const DEFAULT_OPTIONS: object = {}

const BASE_URL: string = 'http://localhost/app/api/'

axios.defaults.baseURL = BASE_URL

/**
 * Apiクラス
 */
export default class Api {
  /**
   * GET処理
   * @param url URL
   * @param params パラメータ
   * @param options オプション
   */
  public static async get (url: string, params?: object, addOptions?: object) {
    let options: object = {}
    // オプションの結合
    options = _.assign(options, DEFAULT_OPTIONS, addOptions)

    // パラメータのマージ
    options = _.merge(options, { 'params': params })

    return axios.get(url, options).then((response) => {
      return response.data
    }).catch((error) => {
      throw error
    }).finally()
  }

  /**
   * POST処理
   * @param url URL
   * @param data POSTデータ
   */
  public static async post (url: string, data: object, addOptions?: object) {
    let options: object = {}
    // オプションの結合
    options = _.assign(options, DEFAULT_OPTIONS, addOptions)

    return axios.post(url, data, options).then((response) => {
      return response.data
    }).catch((error) => {
      throw error
    }).finally(() => {})
  }
}
