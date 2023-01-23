<template>
  <div class="search__modal">
    <div class="inner">
      <div class="form__row">
        <label>年齢</label>
        <div class="value">
          <vue-range-slider ref="slider" v-model="age" :min="18" :max="80"></vue-range-slider>
        </div>
      </div>
      <div class="form__row">
        <label>セクシャリティ</label>
        <div class="value group">
          <a v-for="(item, index) in SEXALITY" @click="toggleSexality(index)" :class="{ selected: selectedSexalities.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>住んでいる地域</label>
        <div class="value group">
          <a v-for="(item, index) in PREFECTURES" @click="toggleArea(index)" :class="{ selected: selectedAreas.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>身長</label>
        <div class="value">
          <vue-range-slider ref="slider" v-model="height" :min="140" :max="200"></vue-range-slider>
        </div>
      </div>
      <div class="form__row">
        <label>体型</label>
        <div class="value group">
          <a v-for="(item, index) in BODY_TYPE" @click="toggleBodyType(index)" :class="{ selected: selectedBodyTypes.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>職業</label>
        <div class="value group">
          <a v-for="(item, index) in JOB" @click="toggleJob(index)" :class="{ selected: selectedJobs.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>休日</label>
        <div class="value group">
          <a v-for="(item, index) in HOLIDAY" @click="toggleHoliday(index)" :class="{ selected: selectedHolidays.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>年収</label>
        <div class="value group">
          <a v-for="(item, index) in SALARY" @click="toggleSalary(index)" :class="{ selected: selectedSalaries.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>最終学歴</label>
        <div class="value group">
          <a v-for="(item, index) in STUDY" @click="toggleStudy(index)" :class="{ selected: selectedStudies.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>お酒</label>
        <div class="value group">
          <a v-for="(item, index) in LIQUOR" @click="toggleLiquor(index)" :class="{ selected: selectedLiquors.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>たばこ</label>
        <div class="value group">
          <a v-for="(item, index) in TOBACCO" @click="toggleTobacco(index)" :class="{ selected: selectedTobaccos.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>パートナー</label>
        <div class="value group">
          <a v-for="(item, index) in PARTNER" @click="togglePartner(index)" :class="{ selected: selectedPartners.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>結婚歴</label>
        <div class="value group">
          <a v-for="(item, index) in HISTORY" @click="toggleHistory(index)" :class="{ selected: selectedHistories.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>結婚後の希望スタイル</label>
        <div class="value group">
          <a v-for="(item, index) in STYLE" @click="toggleStyle(index)" :class="{ selected: selectedStyles.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>
      <div class="form__row">
        <label>子供の希望有無</label>
        <div class="value group">
          <a v-for="(item, index) in CHILD" @click="toggleChild(index)" :class="{ selected: selectedChilds.includes(String(index)) }" :key="index" class="tag">{{ item }}</a>
        </div>
      </div>

      <div class="form__action">
        <button @click="searchThisCondition">この条件で検索</button>
        <button @click="clear">クリア</button>
        <button @click="closeModal">閉じる</button>
      </div>
    </div>
  </div>
</template>
<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'
import { SEXALITY, PREFECTURES, BODY_TYPE, JOB, HOLIDAY, SALARY, STUDY, LIQUOR, TOBACCO, PARTNER, HISTORY, STYLE, CHILD } from "../const"
export default {
  components: {
    VueRangeSlider
  },
  data() {
    return {
      age: [18, 80],
      SEXALITY: SEXALITY,
      PREFECTURES: PREFECTURES,
      height: [140, 200],
      BODY_TYPE: BODY_TYPE,
      JOB: JOB,
      HOLIDAY: HOLIDAY,
      SALARY: SALARY,
      STUDY: STUDY,
      LIQUOR: LIQUOR,
      TOBACCO: TOBACCO,
      PARTNER: PARTNER,
      HISTORY: HISTORY,
      STYLE: STYLE,
      CHILD: CHILD,
      selectedSexalities: [],
      selectedAreas: [],
      selectedBodyTypes: [],
      selectedJobs: [],
      selectedHolidays: [],
      selectedSalaries: [],
      selectedStudies: [],
      selectedLiquors: [],
      selectedTobaccos: [],
      selectedPartners: [],
      selectedHistories: [],
      selectedStyles: [],
      selectedChilds: []
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_condition')
        this.age = [data.condition.age_min, data.condition.age_max]
        this.height = [data.condition.height_min, data.condition.height_max]
        this.selectedSexalities = !!data.condition.sexality ? data.condition.sexality.split('  ') : []
        this.selectedAreas = !!data.condition.area ? data.condition.area.split('  ') : []
        this.selectedBodyTypes = !!data.condition.body_type ? data.condition.body_type.split('  ') : []
        this.selectedJobs = !!data.condition.job ? data.condition.job.split('  ') : []
        this.selectedHolidays = !!data.condition.holiday ? data.condition.holiday.split('  ') : []
        this.selectedSalaries = !!data.condition.salary ? data.condition.salary.split('  ') : []
        this.selectedStudies = !!data.condition.study ? data.condition.study.split('  ') : []
        this.selectedLiquors = !!data.condition.liquor ? data.condition.liquor.split('  ') : []
        this.selectedTobaccos = !!data.condition.tobacco ? data.condition.tobacco.split('  ') : []
        this.selectedPartners = !!data.condition.partner ? data.condition.partner.split('  ') : []
        this.selectedHistories = !!data.condition.history ? data.condition.history.split('  ') : []
        this.selectedStyles = !!data.condition.style ? data.condition.style.split('  ') : []
        this.selectedChilds = !!data.condition.child ? data.condition.child.split('  ') : []
      } catch (error) {
      }
    },
    async searchThisCondition() {
      try {
        let selectedSexalities = ""
        let selectedAreas = ""
        let selectedBodyTypes = ""
        let selectedJobs = ""
        let selectedHolidays = ""
        let selectedSalaries = ""
        let selectedStudies = ""
        let selectedLiquors = ""
        let selectedTobaccos = ""
        let selectedPartners = ""
        let selectedHistories = ""
        let selectedStyles = ""
        let selectedChilds = ""
        this.selectedSexalities.forEach(item => {
          selectedSexalities += ' ' + item + ' '
        })
        this.selectedAreas.forEach(item => {
          selectedAreas += ' ' + item + ' '
        })
        this.selectedBodyTypes.forEach(item => {
          selectedBodyTypes += ' ' + item + ' '
        })
        this.selectedJobs.forEach(item => {
          selectedJobs += ' ' + item + ' '
        })
        this.selectedHolidays.forEach(item => {
          selectedHolidays += ' ' + item + ' '
        })
        this.selectedSalaries.forEach(item => {
          selectedSalaries += ' ' + item + ' '
        })
        this.selectedStudies.forEach(item => {
          selectedStudies += ' ' + item + ' '
        })
        this.selectedLiquors.forEach(item => {
          selectedLiquors += ' ' + item + ' '
        })
        this.selectedTobaccos.forEach(item => {
          selectedTobaccos += ' ' + item + ' '
        })
        this.selectedPartners.forEach(item => {
          selectedPartners += ' ' + item + ' '
        })
        this.selectedHistories.forEach(item => {
          selectedHistories += ' ' + item + ' '
        })
        this.selectedStyles.forEach(item => {
          selectedStyles += ' ' + item + ' '
        })
        this.selectedChilds.forEach(item => {
          selectedChilds += ' ' + item + ' '
        })
        const { data } = await axios.post('/api/save_search_condition', {
          selectedSexalities: selectedSexalities.trim(),
          selectedAreas: selectedAreas.trim(),
          selectedBodyTypes: selectedBodyTypes.trim(),
          selectedJobs: selectedJobs.trim(),
          selectedHolidays: selectedHolidays.trim(),
          selectedSalaries: selectedSalaries.trim(),
          selectedStudies: selectedStudies.trim(),
          selectedLiquors: selectedLiquors.trim(),
          selectedTobaccos: selectedTobaccos.trim(),
          selectedPartners: selectedPartners.trim(),
          selectedHistories: selectedHistories.trim(),
          selectedStyles: selectedStyles.trim(),
          selectedChilds: selectedChilds.trim(),
          age_min: this.age[0],
          age_max: this.age[1],
          height_min: this.height[0],
          height_max: this.height[1]
        })
        this.$emit('search_condition_change')
      } catch (error) {
      }
    },
    toggleSexality(index) {
      if (this.selectedSexalities.includes(String(index))) {
        var temp = this.selectedSexalities
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedSexalities = temp
      } else {
        this.selectedSexalities.push(String(index))
      }
    },
    toggleArea(index) {
      if (this.selectedAreas.includes(String(index))) {
        var temp = this.selectedAreas
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedAreas = temp
      } else {
        this.selectedAreas.push(String(index))
      }
    },
    toggleBodyType(index) {
      if (this.selectedBodyTypes.includes(String(index))) {
        var temp = this.selectedBodyTypes
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedBodyTypes = temp
      } else {
        this.selectedBodyTypes.push(String(index))
      }
    },
    toggleJob(index) {
      if (this.selectedJobs.includes(String(index))) {
        var temp = this.selectedJobs
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedJobs = temp
      } else {
        this.selectedJobs.push(String(index))
      }
    },
    toggleHoliday(index) {
      if (this.selectedHolidays.includes(String(index))) {
        var temp = this.selectedHolidays
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedHolidays = temp
      } else {
        this.selectedHolidays.push(String(index))
      }
    },
    toggleSalary(index) {
      console.log(index, "______toggleSalary")
      if (this.selectedSalaries.includes(String(index))) {
        var temp = this.selectedSalaries
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedSalaries = temp
      } else {
        this.selectedSalaries.push(String(index))
      }
    },
    toggleStudy(index) {
      if (this.selectedStudies.includes(String(index))) {
        var temp = this.selectedStudies
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedStudies = temp
      } else {
        this.selectedStudies.push(String(index))
      }
    },
    toggleStudy(index) {
      if (this.selectedStudies.includes(String(index))) {
        var temp = this.selectedStudies
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedStudies = temp
      } else {
        this.selectedStudies.push(String(index))
      }
    },
    toggleLiquor(index) {
      if (this.selectedLiquors.includes(String(index))) {
        var temp = this.selectedLiquors
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedLiquors = temp
      } else {
        this.selectedLiquors.push(String(index))
      }
    },
    toggleTobacco(index) {
      if (this.selectedTobaccos.includes(String(index))) {
        var temp = this.selectedTobaccos
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedTobaccos = temp
      } else {
        this.selectedTobaccos.push(String(index))
      }
    },
    togglePartner(index) {
      if (this.selectedPartners.includes(String(index))) {
        var temp = this.selectedPartners
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedPartners = temp
      } else {
        this.selectedPartners.push(String(index))
      }
    },
    toggleHistory(index) {
      if (this.selectedHistories.includes(String(index))) {
        var temp = this.selectedHistories
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedHistories = temp
      } else {
        this.selectedHistories.push(String(index))
      }
    },
    toggleStyle(index) {
      if (this.selectedStyles.includes(String(index))) {
        var temp = this.selectedStyles
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedStyles = temp
      } else {
        this.selectedStyles.push(String(index))
      }
    },
    toggleChild(index) {
      if (this.selectedChilds.includes(String(index))) {
        var temp = this.selectedChilds
        const ind = temp.indexOf(String(index))
        temp.splice(ind, 1)
        this.selectedChilds = temp
      } else {
        this.selectedChilds.push(String(index))
      }
    },
    closeModal() {
      this.$emit('closeModal')
    },
    clear() {
      this.age = [18, 80]
      this.height = [140, 200]
      this.selectedSexalities = []
      this.selectedAreas = []
      this.selectedBodyTypes = []
      this.selectedJobs = []
      this.selectedHolidays = []
      this.selectedSalaries = []
      this.selectedStudies = []
      this.selectedLiquors = []
      this.selectedTobaccos = []
      this.selectedPartners = []
      this.selectedHistories = []
      this.selectedStyles = []
      this.selectedChilds = []
    }
  }
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
.search__modal {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba($color: #D8BFD8, $alpha: 0.6);
  z-index: 200;

  .inner {
    position: fixed;
    width: 800px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    z-index: 300;
    padding: 30px 20px;
    border-radius: 10px;
    height: 80vh;
    overflow: auto;

    @include sp {
      width: 90vw;
      padding: 5vw;
      border-radius: 2vw;
    }
  }
}

.form__row {
  display: flex;
  margin-bottom: 10px;

  @include sp {
    margin-bottom: 3vw;
    display: block;
  }

  label {
    width: 150px;

    @include sp {
      width: 100%;
      margin-bottom: 2vw;
    }
  }

  .value {
    flex: 1;
  }
}

.form__action {
  display: flex;
  align-items: center;
  justify-content: center;

  @include sp {
    flex-wrap: wrap;
  }

  button {
    padding-left: 30px;
    padding-right: 30px;
    height: 40px;
    border-radius: 20px;
    background-color: var(--main-color);
    color: #fff;
    font-size: 16px;
    border: 0;
    display: flex;
    align-items: center;
    justify-content: center;

    @include sp {
      margin-bottom: 10px;
    }

    &:nth-of-type(2) {
      margin-left: 10px;
      background-color: #fff;
      color: #333;
      border: 2px solid var(--main-color);
    }

    &:last-of-type {
      background-color: #777;
      color: #fff;
      margin-left: 10px;
    }
  }
}

.group {
  display: flex;
  flex-wrap: wrap;

  .tag {
    padding-left: 10px;
    padding-right: 10px;
    height: 24px;
    font-size: 12px;
    border: 1px solid var(--main-color);
    color: #333;
    margin-right: 5px;
    margin-bottom: 5px;
    border-radius: 4px;

    @include sp {
      padding-left: 2vw;
      padding-right: 2vw;
      height: 6vw;
      font-size: 3vw;
      margin-right: 1vw;
      margin-bottom: 1vw;
      border-radius: 1vw;
    }

    &.selected {
      background-color: var(--main-color);
      color: #fff;
    }
  }
}
</style>