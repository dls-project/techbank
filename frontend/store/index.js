import Vuex from "vuex"
import axios from "axios"

const createStore = () => {
  return new Vuex.Store({
    state: () => ({
      employeeList: []
    }),
    mutations: {
      setEmployeeList(state, list) {
        state.employeeList = list
      }
    },
    actions: {
      async getEmployeeList({ commit }) {
        const res = await axios.get("/api/employees")
        commit("setEmployeeList", res)
      }
    }
  })
}

export default createStore
