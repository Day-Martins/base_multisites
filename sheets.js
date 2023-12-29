//THEME BASE PATH
const theme_bagov_base_src = './web/themes/custom/bagov_base/assets/scss/';
const theme_bagov_base_dest = './web/themes/custom/bagov_base/assets/css/';

//MODULE BAGOV BASE BLOCKS BASE PATH
const module_bagov_base_blocks_src = './web/modules/custom/bagov_base_blocks/assets/scss/';
const module_bagov_base_blocks_dest = './web/modules/custom/bagov_base_blocks/assets/css/';

const sheets = [
    // THEME BAGOV.BASE
    // NOTICIAS
    {
        scss_src: theme_bagov_base_src + 'noticias/noticia.scss',
        css_name: 'noticia',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    {
        scss_src: theme_bagov_base_src + 'noticias/noticia-paginacao.scss',
        css_name: 'noticia-paginacao',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    {
        scss_src: theme_bagov_base_src + 'noticias/noticia-anexos.scss',
        css_name: 'noticia-anexos',
        css_dest: theme_bagov_base_dest + 'noticias/'
    },
    // MODULE BAGOV.BASE BLOCKS
    // CONTRASTE
    {
        scss_src: module_bagov_base_blocks_src + 'contraste/contraste.scss',
        css_name: 'contraste',
        css_dest: module_bagov_base_blocks_dest + 'contraste/'
    },
    // EVENTOS
    {
        scss_src: module_bagov_base_blocks_src + 'eventos/eventos.scss',
        css_name: 'eventos',
        css_dest: module_bagov_base_blocks_dest + 'eventos/'
    },
    // LOGO ESTADO
    {
        scss_src: module_bagov_base_blocks_src + 'logo_estado/logo-estado.scss',
        css_name: 'logo-estado',
        css_dest: module_bagov_base_blocks_dest + 'logo_estado/'
    },
    // NOTICIAS
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/noticias.scss',
        css_name: 'noticias',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/noticias-home.scss',
        css_name: 'noticias-home',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    {
        scss_src: module_bagov_base_blocks_src + 'noticias/noticias-relacionadas.scss',
        css_name: 'noticias-relacionadas',
        css_dest: module_bagov_base_blocks_dest + 'noticias/'
    },
    // REDES SOCIAIS
    {
        scss_src: module_bagov_base_blocks_src + 'redes_sociais/redes-sociais.scss',
        css_name: 'redes-sociais',
        css_dest: module_bagov_base_blocks_dest + 'redes_sociais/'
    },
]
module.exports = sheets;