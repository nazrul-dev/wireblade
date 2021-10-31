const mix = require('laravel-mix')

mix.ts('ts/index.ts', 'dist/wireblade.js')
  .setPublicPath('dist')
  .postCss('resources/css/wireblade.css', 'dist', [require('tailwindcss')])

if (mix.inProduction()) {
  mix.version()
}
