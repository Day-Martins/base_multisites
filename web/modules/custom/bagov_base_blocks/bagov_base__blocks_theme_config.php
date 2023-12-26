<?php

function theme_template_map(){
    return [
        'contrast_block' => [
            'render element' => 'content',
        ],
        'acesso_informacao_block' => [
            'render element' => 'content',
        ],
        'logo_estado_block' => [
            'render element' => 'content',
            'variables' => [
                'img' => '/sites/default/files/images/logo-governo-rodape.png',
            ],
        ],
        'select_secretaria_block' => [
            'render element' => 'content',
            'variables' => [
                'options' => json_decode($secretarias),
            ],
        ],
        'creative_commons_block' => [
            'render element' => 'content',
            'variables' => [
                'img' => '/sites/default/files/images/creative-commons-nd.png',
            ],
        ],
        'views_noticias' => [
            'preprocess functions' => ['template_preprocess_views_noticias'],
            'file' => 'bagov_base_blocks.theme.inc',
        ],
        'views_noticias_home' => [
            'preprocess functions' => ['template_preprocess_views_noticias_home'],
            'file' => 'bagov_base_blocks.theme.inc',
        ],
        'views_view__teste__block_1' => [
            'base hook' => 'view',
            'template' => 'template-teste',            
        ],
        
    ];
}