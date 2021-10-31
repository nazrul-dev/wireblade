import dropdown from './dropdown'
import modal from './modal'
import dialog from './dialog'
import notifications from './notifications'
import maskable from './inputs/maskable'
import currency from './inputs/currency'
import select from './select'
import timePicker from './timePicker'
import dateTimePicker from './dateTimePicker'

document.addEventListener('alpine:init', () => {
  window.Alpine.data('wireblade_dropdown', dropdown)
  window.Alpine.data('wireblade_modal', modal)
  window.Alpine.data('wireblade_dialog', dialog)
  window.Alpine.data('wireblade_notifications', notifications)
  window.Alpine.data('wireblade_inputs_maskable', maskable)
  window.Alpine.data('wireblade_inputs_currency', currency)
  window.Alpine.data('wireblade_select', select)
  window.Alpine.data('wireblade_timepicker', timePicker)
  window.Alpine.data('wireblade_datetime_picker', dateTimePicker)
})
