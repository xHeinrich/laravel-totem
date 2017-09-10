import './bootstrap'
import Vue from 'vue'
import moment from 'moment'
import Toolbar from './components/Toolbar.vue'
import TemporaryDrawer from './components/TemporaryDrawer.vue'
import PersistentDrawer from './components/PersistentDrawer.vue'
// import UIKitAlert from './components/UiKitAlert.vue'
// import TaskType from './tasks/components/TaskType.vue'
// import TaskOutput from './tasks/components/TaskOutput.vue'
// import StatusButton from './tasks/components/StatusButton.vue'
// import ExecuteButton from './tasks/components/ExecuteButton.vue'

Promise.delay = function (time) {
    return new Promise((resolve, reject) => {
        setTimeout(resolve, time)
    })
}

Promise.prototype.takeAtLeast = function (time) {
    return new Promise((resolve, reject) => {
        Promise.all([this, Promise.delay(time)]).then(([result]) => {
            resolve(result)
        }, reject)
    })
}

Vue.mixin({
    methods: {
        /**
         * Format the given date with respect to timezone.
         */
        formatDate(unixTime){
            return moment(unixTime * 1000).add(new Date().getTimezoneOffset() / 60)
        },

        /**
         * Convert to human readable timestamp.
         */
        readableTimestamp(timestamp){
            return this.formatDate(timestamp).format('HH:mm:ss')
        }
    }
})

new Vue({
    el: '#app',
    components: {
        'toolbar' : Toolbar,
        'temporary-drawer' : TemporaryDrawer,
        'persistent-drawer' : PersistentDrawer
        // 'uikit-alert'  : UIKitAlert,
        // 'status-button': StatusButton,
        // 'execute-button': ExecuteButton,
        // 'task-type' : TaskType,
        // 'task-output' : TaskOutput
    }
})
