<template>
  <div>
  <b-container fluid>
    <b-row class="my-3" align-h="between">
      <b-col>
        <b-input-group>
          <b-form-input v-model="filter" placeholder="検索" />
          <b-input-group-append>
            <b-btn class="float-right" variant="primary" :disabled="!filter" @click="filter = ''">クリア</b-btn>
          </b-input-group-append>
        </b-input-group>
      </b-col>
      <b-col>
        <b-button variant="primary" @click="create"><font-awesome-icon icon="plus" class="mr-2"/>新規作成</b-button>
      </b-col>
    </b-row>
 
    <b-table striped bordered small hover
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :show-empty="showEmpty"
      empty-text="表示するデータがありません"
      empty-filtered-text="該当するデータがありません"
      :filter="filter"
      tbody-tr-class="custom-tr"
      tbody-td-class="custom-td"
      @filtered="onFiltered"
      >
      <template slot="action" slot-scope="data">
        <div class="action">
          <b-button-group size="sm">
            <b-button variant="info"><font-awesome-icon icon="file" class="mr-1"/>詳細</b-button>
            <b-button variant="success"><font-awesome-icon icon="edit" class="mr-1"/>編集</b-button>
            <b-button variant="danger"><font-awesome-icon icon="trash" class="mr-1"/>削除</b-button>
          </b-button-group>
        </div>
      </template>
    </b-table>
    <b-row>
      <b-col>
        <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
      </b-col>
    </b-row>
    </b-container>
  </div>
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
          label: 'アクション',
          tdClass: 'td-action'
        }
      },
      items:[],
      currentPage: 1,
      perPage: 10,
      showEmpty: true,
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
    },
    create() {
      alert('新規作成')
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
.action{
  /* background: gray; */
  visibility: hidden;
}
.table {
  font-size: 0.9rem;
}
.custom-tr:hover .action{
  visibility:visible;
}
.td-action {
  width: 100px;
  padding: 0 !important;
}
.td-action button {
 border: none;
 border-radius: 0px !important;
}

</style>

