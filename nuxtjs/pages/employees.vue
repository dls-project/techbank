<template>
  <section class="container">
    <h2 class="title">社員マスタ</h2>
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group>
          <b-input-group>
            <b-form-input v-model="filter" placeholder="検索" />
            <b-input-group-append>
              <b-btn variant="primary" :disabled="!filter" @click="filter = ''">クリア</b-btn>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>
    </b-row>
    <b-table striped bordered small hover 
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      @filtered="onFiltered"
      >
      <template slot="action" slot-scope="data">
        <b-button-group size="sm">
          <b-button variant="success">詳細</b-button>
          <b-button variant="success">編集</b-button>
          <b-button variant="success">削除</b-button>
        </b-button-group>
      </template>
    </b-table>
    <b-row>
      <b-col md="6" class="my-1">
        <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
      </b-col>
    </b-row>
  </section>
</template>

<script>

export default {
  components: { },
  data() {
    return {
      fields: {
        emp_id: {
          label: '社員番号',
          sortable: true
        },
        emp_name: {
          label: '社員氏名',
          sortable: true
        },
        sex: {
          label: '性別',
          sortable: true
        },
        service_code: {
          label: 'サービスコード',
          sortable: true
        },
        action: {
          label: 'アクション'
        }
      },
      items:[],
      currentPage: 1,
      perPage: 10,
      filter: null,
    }
  },
  computed: {
    totalRows() {
      return this.items.length 
    }
  },
  methods: {
    onFiltered (filteredItems) {
      this.totalRows = filteredItems.length
      this.currentPage = 1
    }
  },
  mounted() {
    this.$store.dispatch('getEmployeeList').then(() => {
      // console.log(this.$store.state.employeeList.data)
      this.items = this.$store.state.employeeList.data
    })
  }
}
</script>

<style>

</style>

