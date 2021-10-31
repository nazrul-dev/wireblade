import { notify, confirmNotification, Notify, Confirm } from './notifications'
import { confirmAction, ConfirmAction } from './confirmAction'
import { showDialog, showConfirmDialog, ShowConfirmDialog, ShowDialog } from './dialog'
import { dataGet, DataGet } from './utils/dataGet'
import { Alpine } from './components/alpine'
import { WireBladeHooks } from './hooks'
import './directives/confirm'
import './browserSupport'
import './components'
import './global'

export interface WireBlade {
  notify: Notify
  confirmNotification: Confirm
  confirmAction: ConfirmAction
  dialog: ShowDialog
  confirmDialog: ShowConfirmDialog
  dataGet: DataGet
}

declare global {
  interface Window {
    $wireblade: WireBlade
    wireblade: WireBladeHooks
    Livewire: any
    Alpine: Alpine
    $openModal: CallableFunction
  }
}

const wireblade = {
  notify,
  confirmNotification,
  confirmAction,
  dialog: showDialog,
  confirmDialog: showConfirmDialog,
  dataGet
}

window.$wireblade = wireblade
document.addEventListener('DOMContentLoaded', () => window.wireblade.dispatchHook('load'))

export default wireblade
