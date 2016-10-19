window._ = require('lodash');

/**
 * Carrega o jQuery para ser utilizando com o Bootstrap em
 * alguns componentes como aba, menu e animações.
 */
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

/**
 * Carrega e inicializa o turbolinks para cuidar da paginação
 * da aplicação.
 */
window.Turbolinks = require('turbolinks');
Turbolinks.start();

/**
 * Carrega o componente Chart.js que é responsável por todos
 * os gráficos da aplicação.
 */
require('chart.js');
