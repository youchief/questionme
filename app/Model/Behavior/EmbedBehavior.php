<?php

class EmbedBehavior extends ModelBehavior {

    public $settings = array();

    public function setup(Model $model, $config = array()) {

        $this->settings[$model->alias] = $config;

        // check for a datafield field (there is no default)
        if (!isset($this->settings[$model->alias]['embed_field']) || '' === $this->settings[$model->alias]['embed_field']) {
            throw new Exception('Must specify a field for EmbedBehavior');
        }
    }

    public function beforeValidate(Model $model, $options = array() ) {
        $field = $this->settings[$model->alias]['embed_field'];

        if (isset($model->data[$model->alias][$field])) {
            if ($model->data[$model->alias][$field] != '' && !empty($model->data[$model->alias][$field])) {
                $type = 'embed';
                $subType = 'other';

                preg_match('~soundcloud~i', $model->data[$model->alias][$field], $matches);
                if (!empty($matches))
                    $subType = 'soundcloud';

                preg_match('~vimeo~i', $model->data[$model->alias][$field], $matches);
                if (!empty($matches))
                    $subType = 'vimeo';

                preg_match('~youtu~i', $model->data[$model->alias][$field], $matches);
                if (!empty($matches))
                    $subType = 'youtube';

                $model->data[$model->alias]['type'] = $type; 
                 $model->data[$model->alias]['subtype'] = $subType;
                $model->data[$model->alias]['size'] = 0;
                $model->data[$model->alias]['date'] = date('Y-m-d H:i:s');

                
                if( isset($this->settings[$model->alias]['file_field']) ){
                    
                    if ($subType == 'youtube') {
                        preg_match('~/embed/([0-9a-z_-]+)~i', $model->data[$model->alias][$field], $matches);
                        if (!empty($matches)) {
                            $model->data[$model->alias][ $this->settings[$model->alias]['file_field'] ] = 'http://img.youtube.com/vi/' . $matches[1] . '/0.jpg'; //$matches[1];
                        }
                    }

                    if ($subType == 'vimeo') {
                        preg_match('~/video/([0-9a-z_-]+)~i', $model->data[$model->alias][$field], $matches);
                        if (!empty($matches)) {
                            $imgid = $matches[1];
                            App::uses('HttpSocket', 'Network/Http');
                            $HttpSocket = new HttpSocket();
                            $hash = unserialize( $HttpSocket->get('http://vimeo.com/api/v2/video/' . $imgid . '.php') );
                            $model->data[$model->alias][ $this->settings[$model->alias]['file_field'] ] = $hash[0]['thumbnail_medium'];
                        }
                    }
                }
                
                
            }
        }

        return true;
    }

}