<template>
  <div>
  <b-container fluid>
    <b-row class="my-3">
      <b-col>
        <b-input-group :prepend="totalRows+'件'">
          <b-input-group-append>
          </b-input-group-append>
          <b-form-input v-model="filter" placeholder="検索" />
          <b-input-group-append>
            <b-btn class="float-right" variant="primary" :disabled="!filter" @click="filter = ''">クリア</b-btn>
          </b-input-group-append>
        </b-input-group>
      </b-col>
      <b-col>
        <b-button class="float-right" variant="primary" v-b-modal.addForm><font-awesome-icon icon="plus" class="mr-2"/>新規作成</b-button>
      </b-col>
    </b-row>
    <b-table striped bordered small hover
      class="custom-table"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :show-empty="showEmpty"
      empty-text="表示するデータがありません"
      empty-filtered-text="該当するデータがありません"
      :filter="filter"
      tbody-class="custom-tbody"
      tbody-tr-class="custom-tr"
      tbody-td-class="custom-td"
      @filtered="onFiltered"
      >
      <template slot="action" slot-scope="data">
        <div class="action">
          <b-button-group size="sm">
            <b-button variant="outline-success"><font-awesome-icon icon="file" class="mr-1"/>詳細</b-button>
            <b-button variant="outline-success"><font-awesome-icon icon="edit" class="mr-1"/>編集</b-button>
            <b-button v-b-modal.delete variant="outline-success"><font-awesome-icon icon="trash" class="mr-1"/>削除</b-button>
          </b-button-group>
        </div>
      </template>
    </b-table>
    <b-row>
      <b-col>
        <b-pagination 
          align="center" 
          :limit="limit"
          :total-rows="totalRows"
          :per-page="perPage"
          v-model="currentPage"
        />
      </b-col>
    </b-row>
    </b-container>
    <b-modal id="addForm" title="新規作成" centered >
      <b-form-group horizontal label="社員番号" >
        <b-form-input type="text"/>
      </b-form-group>
      <b-form-group horizontal label="社員氏名">
        <b-form-input type="text"/>
      </b-form-group>
      <b-form-group horizontal label="性別">
        <b-form-radio-group
          v-model="radioSelected"
          :options="sex"
          buttons
          button-variant="outline-primary"
          name="sex" />
      </b-form-group>
      <b-form-group horizontal label="サービス">
        <b-form-select v-model="serviceCode" :options="options"/>
      </b-form-group>
    </b-modal>
        <b-modal id="delete" title="削除" centered >
        データを削除してよろしいですか
    </b-modal>
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
      perPage: 20,
      showEmpty: true,
      filter: null,
      totalRows: 0,
      limit: 10,

      //新規作成フォーム
      radioSelected: null,
      sex: ['男', '女'],
      serviceCode: null,
      options: [
        { value: null, text: '-' },
        { value: '1', text: '開発' },
        { value: '2', text: 'マーケティング' }
      ]
    }
  },
  computed: {
    // totalRows() {
    //   return this.items.length
    // }
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

.custom-table {

}

.custom-table .custom-tbody {

}
.custom-table .custom-tbody {

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

