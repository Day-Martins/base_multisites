//THEME BASE PATH
const theme_bagov_base_src = './web/themes/custom/bagov_base/assets/scss/';
const theme_bagov_base_dest = './web/themes/custom/bagov_base/assets/css/';

//MODULE BAGOV BASE BLOCKS BASE PATH
const module_bagov_base_blocks_src = './web/modules/custom/bagov_base_blocks/assets/scss/';
const module_bagov_base_blocks_dest = './web/modules/custom/bagov_base_blocks/assets/css/';

//MODULE TEXT RESIZE
const module_text_resize_src = './web/modules/custom/text_resize/assets/scss/';
const module_text_resize_dest = './web/modules/custom/text_resize/assets/css/';

const bs_theme_src = "web/themes/custom/bagov_base/scss"
const bs_theme_dest = "web/themes/custom/bagov_base/css"

const sheets = [
    // THEME BAGOV.BASE
    {
      scss_src: bs_theme_src + '/style.scss',
      css_name: 'style',
      css_dest: bs_theme_dest
    },
    // NOTICIAS
    {
        scss_src: theme_bagov_base_src + 'noticias/*.scss',
        css_name: 'noticia',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    {
        scss_src: theme_bagov_base_src + 'noticias/*.scss',
        css_name: 'noticia-paginacao',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    {
        scss_src: theme_bagov_base_src + 'noticias/*.scss',
        css_name: 'noticia-anexos',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    // MODULE BAGOV.BASE BLOCKS
    // CONTRASTE
    {
        scss_src: module_bagov_base_blocks_src + 'contraste/*.scss',
        css_name: 'contraste',
        css_dest: module_bagov_base_blocks_dest + 'contraste/'
    },
    // EVENTOS
    {
        scss_src: module_bagov_base_blocks_src + 'eventos/*.scss',
        css_name: 'eventos',
        css_dest: module_bagov_base_blocks_dest + 'eventos/'
    },
    // LOGO ESTADO
    {
        scss_src: module_bagov_base_blocks_src + 'logo_estado/*.scss',
        css_name: 'logo-estado',
        css_dest: module_bagov_base_blocks_dest + 'logo_estado/'
    },
    // NOTICIAS
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/*.scss',
        css_name: 'noticias',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/*.scss',
        css_name: 'noticias-home',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/*.scss',
        css_name: 'noticias-home-secundarias',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/*.scss',
        css_name: 'noticias-relacionadas',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    // REDES SOCIAIS
    {
        scss_src: module_bagov_base_blocks_src + 'redes_sociais/*.scss',
        css_name: 'redes-sociais',
        css_dest: module_bagov_base_blocks_dest + 'redes_sociais/'
    },
    // Text resize
    {
      scss_src: module_text_resize_src + 'text_resize/*.scss',
      css_name: 'text-resize',
      css_dest: module_text_resize_dest + 'text_resize/'
    },
     // Utilitários
     {
      scss_src: module_bagov_base_blocks_src + 'utils/*.scss',
      css_name: 'utils',
      css_dest: module_bagov_base_blocks_dest + 'utils/'
    },
     // Links Rápidos
     {
      scss_src: module_bagov_base_blocks_src + 'links_rapidos/*.scss',
      css_name: 'links_rapidos',
      css_dest: module_bagov_base_blocks_dest + 'links_rapidos/'
    },
    // Publicação, Editais, Licitações e Legislação
    {
      scss_src: module_bagov_base_blocks_src + 'publicacao/*.scss',
      css_name: 'publicacao',
      css_dest: module_bagov_base_blocks_dest + 'publicacao/'
    },
     // Youtube
     {
        scss_src: module_bagov_base_blocks_src + 'youtube/*.scss',
        css_name: 'youtube-carousel',
        css_dest: module_bagov_base_blocks_dest + 'youtube/'
      },
]
module.exports = sheets;
