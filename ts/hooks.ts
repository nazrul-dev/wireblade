export interface WireBladeHooks {
  hook (hook: string, callback: CallableFunction): void,
  dispatchHook (hook: string): void
}

