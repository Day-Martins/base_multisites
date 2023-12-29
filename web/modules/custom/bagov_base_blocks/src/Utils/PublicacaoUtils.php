<?php
namespace Drupal\bagov_base_blocks\Utils;

use Drupal\file\FileInterface;

class PublicacaoUtils {
  static function determine_midia_file_type($midia) {
    // Inicializa o tipo de arquivo como desconhecido.
    $fileType = 'unknown';

    // Verifica o bundle (tipo) da mídia e define o tipo de arquivo com base nele.
    switch ($midia->bundle()) {
        case 'image':
            $fileType = 'image';
            break;

        case 'document':
            if ($midia->hasField('field_media_document') && !$midia->field_media_document->isEmpty()) {
                // Verifica a extensão do arquivo para determinar um tipo mais específico.
                $fileUri = $midia->field_media_document->entity->getFileUri();
                $fileExtension = pathinfo($fileUri, PATHINFO_EXTENSION);

                switch ($fileExtension) {
                    case 'pdf':
                        $fileType = 'pdf';
                        break;
                    case 'doc':
                    case 'docx':
                        $fileType = 'document';
                        break;
                    case 'xls':
                    case 'xlsx':
                        $fileType = 'spreadsheet';
                        break;
                    case 'ppt':
                    case 'pptx':
                        $fileType = 'presentation';
                        break;
                    case 'zip':
                    case 'rar':
                        $fileType = 'archive';
                        break;
                    case 'mp3':
                    case 'wav':
                    case 'ogg':
                        $fileType = 'audio';
                        break;
                    // Adicione mais casos conforme necessário.
                }
            }
            break;

        // Adicione mais casos para outros tipos de mídia conforme necessário.

        default:
            break;
    }

    // Retorna o tipo de arquivo determinado.
    return $fileType;
  }

  static function determine_cor_do_arquivo($ext) {
    $color = '#000';

    switch ($ext) {
      case 'pdf':
        $color = '#D32F2F'; // Vermelho escuro opaco
        break;
      case 'document':
      case 'doc':
      case 'docx':
        $color = '#1976D2'; // Azul escuro opaco
        break;
      case 'spreadsheet':
      case 'xls':
      case 'xlsx':
        $color = '#388E3C'; // Verde escuro opaco
        break;
      case 'presentation':
      case 'ppt':
      case 'pptx':
        $color = '#F57C00'; // Laranja escuro opaco
        break;
      case 'archive':
      case 'zip':
      case 'rar':
        $color = '#FBC02D'; // Amarelo mostarda opaco
        break;
      case 'audio':
      case 'mp3':
      case 'wav':
      case 'ogg':
        $color = '#C2185B'; // Rosa escuro opaco
        break;

      // Adicione mais casos conforme necessário.
  }


    return $color;
  }

  static function determine_icon_do_arquivo($ext) {
    $icon = 'fa-file';

    switch ($ext) {
      case 'pdf':
        $icon = 'fa-file-pdf';
        break;
      case 'doc':
      case 'docx':
        $icon = 'fa-file-word';
        break;
      case 'xls':
      case 'xlsx':
        $icon = 'fa-file-excel';
        break;
      case 'ppt':
      case 'pptx':
        $icon = 'fa-file-powerpoint';
        break;
      case 'zip':
      case 'rar':
        $icon = 'fa-file-archive';
        break;
      case 'mp3':
      case 'wav':
      case 'ogg':
        $icon = 'fa-file-audio';
        break;

      // Adicione mais casos conforme necessário.
    }

    return $icon;
  }

  static function determine_url_do_arquivo(FileInterface $file) {
    // Obtendo o serviço file_url_generator
    $file_url_generator = \Drupal::service('file_url_generator');

    $uri = $file->getFileUri();
    return  $file_url_generator->generateAbsoluteString($uri);
  }

}
